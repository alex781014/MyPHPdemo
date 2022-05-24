<?php
session_start();

unset($_SESSION['user']); //移除'user'對應的值

header('Location: a20220523-04-login.php');//轉向