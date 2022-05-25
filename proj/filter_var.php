<?php
$var = '0755';
filter_var($var, FILTER_VALIDATE_INT);
var_dump(filter_var($var, FILTER_VALIDATE_INT));
