<?php

$data = [
    'titlePage' => 'Nhóm'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);

view('board', 'admin', 'groups');

layout('footer', 'admin');

?>