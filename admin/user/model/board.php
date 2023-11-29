<?php

//$numberCourse = getCountRows("SELECT c.id FROM course AS c INNER JOIN course_type AS t ON c.course_type_id=t.id INNER JOIN user AS u ON c.author_id=u.id $filter");

// $totalPage = ceil($numberCourse/_PAGE);
$allGroups = getRaw("SELECT id, name FROM groups WHERE id<>'1'");

$allUser = getRaw("SELECT u.*, g.name AS 'g_name' from user AS u INNER JOIN groups AS g ON u.id_group=g.id WHERE id_group<>'1' $filter");

// $allCourseType = getRaw("SELECT * FROM course_type");

?>