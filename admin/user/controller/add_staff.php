<?php

$data = [
    'titlePage' => 'Thêm người nhân viên'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('add_staff', 'admin', 'user');

?>


<?php

layout('footer', 'admin');


?>