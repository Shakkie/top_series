<?php
session_start();
session_unset();
session_destroy();
header('Location: ../login.php');
exit(); // no me funciona triste soy/ahora si funciona yey
?>