<?php
session_start();
session_unset();
session_destroy();

// Delete the cookie by setting its expiration time to past
setcookie("login_username", "", time() - 3600, "/");

header("Location: index.php");
exit();
?>
