<?php

//$numberCourse = getCountRows("SELECT c.id FROM course AS c INNER JOIN course_type AS t ON c.course_type_id=t.id INNER JOIN user AS u ON c.author_id=u.id $filter");

// $totalPage = ceil($numberCourse/_PAGE);
//$allComment = getRaw("SELECT  c.*,u.fullname,u.email,u.phone,b.title FROM comment as c INNER JOIN user as u ON c.user_id = u.id INNER JOIN book as b ON c.book_id = b.id $filter");
$allComment = getRaw("SELECT  c.*,u.fullname,u.email,u.phone,b.title,t.name FROM comment as c 
                    INNER JOIN user as u ON c.user_id = u.id 
                    INNER JOIN book as b ON c.book_id = b.id
                    INNER JOIN book_type as t ON b.book_type_id = t.id $filter");


$allBookType = getRaw("SELECT * FROM book_type");


?>