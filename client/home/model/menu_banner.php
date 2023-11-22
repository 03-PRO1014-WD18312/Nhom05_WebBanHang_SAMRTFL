<?php

// $allCourseType = getRaw("SELECT * FROM course_type $filter ORDER BY id DESC LIMIT $limitS, $limitE");
$allCourseType = getRaw("SELECT * FROM course_type ORDER BY id asc");
