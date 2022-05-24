<?php

// $account = isset($_POST['account']) ? $_POST['account'] : '';
// $password = isset($_POST['password']) ? $_POST['password'] : '';


$account = isset($_POST['account']) ? $_POST['account'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$number = isset($_POST['number']) ? $_POST['number'] : "";
printf("account: %s <br>password: %s <br>number: %s", $account, $password, $number);
