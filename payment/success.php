<?php
$my_file = 'file.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);

fwrite($handle, "Success:");
fwrite($handle, json_encode($_REQUEST));