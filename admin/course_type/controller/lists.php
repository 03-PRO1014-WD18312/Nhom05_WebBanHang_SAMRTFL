<?php

$data = [
    'titlePage' => 'Category Course'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('board', 'admin', 'course_type');

?>


<?php

layout('footer', 'admin');


?>