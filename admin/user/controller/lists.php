<?php

$data = [
    'titlePage' => 'Danh sách người dùng'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('board', 'admin', 'user');

?>


<?php

layout('footer', 'admin');


?>