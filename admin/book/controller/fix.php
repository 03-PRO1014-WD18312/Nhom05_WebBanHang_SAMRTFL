<?php

$data = [
    'titlePage' => 'Sửa Book'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('fix', 'admin', 'book');

?>


<?php

layout('footer', 'admin');


?>