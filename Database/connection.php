<?php

$con = new mysqli("localhost:3307", "root", "admin@123", "test");

$con -> connect_error ? die("Connection failed: " . $con -> connect_error) : null;
?>