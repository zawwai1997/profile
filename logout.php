<?php
session_start();
session_destroy();
header("location: ../covid19/login.php");
exit();
