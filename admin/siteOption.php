<?php

$now = new DateTime(date("h:i:s",time()));
$exp = new DateTime($row['time_expires']);
$diff = $now->diff($exp);
printf('%d hours, %d minutes, %d seconds', $diff->h, $diff->i, $diff->s);
?>