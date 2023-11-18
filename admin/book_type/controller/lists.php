<?php

$data = [
    'titlePage' => 'Dang mục sách'
];


layout('header', 'admin', $data);


layout('sidebar', 'admin', $data);


layout('breadcrumb', 'admin', $data);


view('board', 'admin', 'book_type');


layout('footer', 'admin');



?>