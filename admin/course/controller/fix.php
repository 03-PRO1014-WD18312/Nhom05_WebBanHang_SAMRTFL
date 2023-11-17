<?php

$data = [
    'titlePage' => 'Sửa Course'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('fix', 'admin', 'course');

?>


<?php

layout('footer', 'admin');


?>