<?php
// Get the base URL
$base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

// Redirect to the desired folder relative to the current location
header("Location: $base_url/main/");
exit; // Ensure that code execution stops after redirection
?>
