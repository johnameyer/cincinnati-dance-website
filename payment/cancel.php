<?php
$my_file = 'file.log';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);

fwrite($handle, "Cancel:" . json_encode($_REQUEST) . "\n");