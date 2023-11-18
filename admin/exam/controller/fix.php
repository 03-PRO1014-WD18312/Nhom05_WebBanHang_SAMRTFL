<?php

$data = [
    'titlePage' => 'Fix Exam'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('fix', 'admin', 'exam');

?>


<?php

layout('footer', 'admin');


?>