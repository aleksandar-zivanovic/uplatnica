<?php
include_once 'includes/header.php';

$str = '<a href="https://www.geeksforgeeks.org">GeeksforGeeks</a>';

// It will convert htmlentities and print them 
echo "originalno =>     " . $str . "<br>";
echo "htmlentities =>     " . htmlentities($str) . "<br>";
echo "htmlspecialchars => " . htmlspecialchars($str) . "<br><hr>";
?>


