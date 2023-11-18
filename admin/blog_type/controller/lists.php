<?php

$data = [
    'titlePage' => 'Category Blog'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('board', 'admin', 'blog_type');

?>


<?php

layout('footer', 'admin');


?>