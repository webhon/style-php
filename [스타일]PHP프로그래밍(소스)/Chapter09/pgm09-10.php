<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	 $query = 
	 "insert into BOOK(author, title, publisher, price, pdate, area) values
	('릭마티슨', '모바일브랜딩', '가람', 12000, '2009-04-20', '경영'),
	('발타자르', '지혜의기술', '서교', 9000, '2005-07-20', '에세이'),
	('장상용', '상상력노트', '해냄', 10000, '2007-01-15', '자기계발'),
	('드보노', '창의력사전', '21세기북스', 15000, '2004-02-20', '자기계발'),
	('제프모지', '창의력주식회사', '푸른숲', 15000, '2004-06-15', '자기계발'),
	('캘빈', '생각의탄생', '사이언스북스', 13000, '2006-09-29', '인문'),
	('박경미', '수학비타민', '랜덤하우스', 9000, '2003-10-25', '수학'), 
	('크로플리', '창의성과 학교교육', '원미사', 12000, '2007-02-23', '교육'),
	('하워드가드너', '다중지능', '웅진지식하우스', 14000, '2007-09-03', '인문'),
	('황광우', '철학콘서트', '웅진지식하우스', 12000, '2006-06-28', '인문')";

	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	echo("[테이블 [BOOK]에 튜플 삽입 완료]");
	mysql_close($dbconnect);
?>