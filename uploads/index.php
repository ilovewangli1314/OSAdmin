<?php

print_r(1111111 . '</br>');

error_reporting (E_ALL & ~E_NOTICE);

print_r(222222 . '</br>');
$page_size = PAGE_SIZE;
$page_size=$page_size<1?1:$page_size;
print_r($page_size . '</br>');

//header("Location:panel/index.php");

?>
