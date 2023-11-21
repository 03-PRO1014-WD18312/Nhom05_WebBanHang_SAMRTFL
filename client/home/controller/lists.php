<?php


layout('header', 'client');

?>

<div class="container_my padding_X py-3">

<?php

$msg = getFlashData('msg');
$type = getFlashData('type');

getAlert($msg, $type);

view('menu_banner', 'client');

view('course', 'client');

// view('tearch_hot', 'client');

// view('evaluate', 'client');

// view('blog', 'client');

// view('register_tc', 'client');


?>

</div>

<?php

layout('footer', 'client');

?>