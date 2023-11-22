<?php

$allBookType = getRaw("SELECT * FROM book_type");
$allBook = getRaw("SELECT b.*, t.name AS 't_name' from book AS b INNER JOIN book_type AS t ON b.book_type_id=t.id $filter");

?>