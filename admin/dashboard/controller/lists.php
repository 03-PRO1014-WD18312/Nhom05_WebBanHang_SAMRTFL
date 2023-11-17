<?php

$data = [
    'titlePage' => 'Dashboard'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);


?>


<?php

layout('footer', 'admin');


?>