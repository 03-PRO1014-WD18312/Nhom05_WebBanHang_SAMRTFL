<?php

$data = [
    'titlePage' => 'Add Exam'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('add', 'admin', 'exam');

?>


<?php

layout('footer', 'admin');


?>