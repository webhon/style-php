<?
	$id = $_GET["id"];
	$no = $_GET["no"];
	$sname = $_GET["sname"];

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "select * from BOOK where no = '$no'";
	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	$row = mysql_fetch_row($result);
	list($no, $author, $title, $publisher, $price, $pdate, $area, $r_flag) = $row;
	mysql_close($dbconnect);
	
	if ($r_flag == 0) {
	echo "[$sname]님, 다음 도서[$title]의 대여가 가능합니다.<br>\n"; 
	echo "<p>"; 
	echo "<table border=1 cellpadding=3>\n";
	echo "<tr bgcolor=\"#cccccc\"><th>항목</th><th>값</th></tr>\n";
	echo "<tr><td align=\"center\">저자</td>
	<td align=\"center\">$author</td></tr>\n";
	echo "<tr><td align=\"center\">도서명</td>
	<td align=\"center\">$title</td></tr>\n";
	echo "<tr><td align=\"center\">출판사</td>
	<td align=\"center\">$publisher</td></tr>\n";
	echo "<tr><td align=\"center\">가격</td>
	<td align=\"center\">$price</td></tr>\n";
	echo "<tr><td align=\"center\">출판일</td>
	<td align=\"center\">$pdate</td></tr>\n";
	echo "<tr><td align=\"center\">영역</td>
	<td align=\"center\">$area</td></tr>\n";
	echo "</table>\n";
	echo "<form action=\"pgm09-17rentaldb.php\" method=\"POST\">\n";
	echo "* 대여하시겠습니까? &nbsp; &nbsp; ";
	echo "<input type=\"radio\" name=\"choice\" value=1>예"; 
	echo "<input type=\"radio\" name=\"choice\" value=0>아니오"; 
	echo "<input type=\"hidden\" name=\"no\" value=$no>";
	echo "<input type=\"hidden\" name=\"id\" value=$id>";
	echo "<input type=\"hidden\" name=\"sname\" value=$sname>";
	echo "<input type=\"hidden\" name=\"title\" value=$title>";
	echo "&nbsp; &nbsp;<input type=\"submit\" value=\"선택\">";
	echo "</form>\n";
	}
	else {
	echo "[$sname]님, 도서[$title]는 대여중입니다. 다음에 다시 신청해 주세요.<br>"; 
	echo "<a href=\"pgm09-15list.php?id=$id&sname=$sname\">도서 목록 보기</a>";
	}
?>