<?php

$detailUser = getRow("SELECT * FROM user WHERE id='$id'");

$allGroups = getRaw("SELECT id, name FROM groups WHERE id<>'1'");


?>