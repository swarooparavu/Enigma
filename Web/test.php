<?php

$path = getcwd();
$part = explode('/', $path,'-1');
$part1=join('/',$part);
echo "$part1/graphs";
?> 
