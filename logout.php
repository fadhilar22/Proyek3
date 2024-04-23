<?php
error_reporting(1);
session_start();
session_unset();
session_destroy();
echo "<script> alert('Logout Berhasil!'); document.location='index.php';</script>"
?>