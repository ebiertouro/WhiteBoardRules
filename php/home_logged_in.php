<?php
$title = "Log Out";
include "header.php"; 

$name = isset($_COOKIE['UserName']) ? $_COOKIE['UserName'] : '';
echo "You are currently logged in as $name.";
echo "<br></br>";

echo '<button class="btn" onclick="window.location.href = \'process_log_out.php\'">Log Out</button>';


include 'footer.php';
?>
