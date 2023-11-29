<?php



$allUser = getRaw("SELECT u.*, g.name AS 'g_name' from user AS u INNER JOIN groups AS g ON u.id_group=g.id WHERE id_group ='2' $filter");


?>