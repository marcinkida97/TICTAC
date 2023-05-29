<?php
session_start();
session_destroy();
setcookie("nazwa_ciasteczka", "", time() - 3600, "/");
header("Location: login");
exit;
?>