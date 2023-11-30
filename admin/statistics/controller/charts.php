<?php

$data = [

    'titlePage' => 'Biểu đồ số lượng sản phẩm theo danh mục'
];
layout('header', 'admin', $data);
?>
<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('charts', 'admin', 'statistics');
?>
<?php

layout('footer', 'admin');
?>