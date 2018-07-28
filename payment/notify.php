<?php
$my_file = 'file.log';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);

fwrite($handle, "Notify:" . json_encode($_REQUEST) . '\n');