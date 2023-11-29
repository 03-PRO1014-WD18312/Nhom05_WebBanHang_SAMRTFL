<?php

$data = [
    'titlePage' => 'Sửa người dùng'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('fix', 'admin', 'user');

?>


<?php

layout('footer', 'admin');


?>