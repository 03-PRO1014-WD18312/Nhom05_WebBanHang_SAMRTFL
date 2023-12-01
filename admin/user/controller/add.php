<?php

$data = [
    'titlePage' => 'Thêm người dùng'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('add', 'admin', 'user');

?>


<?php

layout('footer', 'admin');


?>