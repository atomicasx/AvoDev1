<?php
$file = 'cron_OutPut.txt';
$current = file_get_contents($file);
$current .= "Cron Has been Executed at : ".gmdate('Y-m-d H:i:s')."\n";
file_put_contents($file, $current);

?>