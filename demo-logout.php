<?php
session_start();

unset($_SESSION['user']); //移除'user'對應的值

header('Location: demo-login02.php');//轉向