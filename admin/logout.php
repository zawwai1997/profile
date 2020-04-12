<?php
session_start();
session_destroy();
header("location: ../covid19/index.php");
exit();
