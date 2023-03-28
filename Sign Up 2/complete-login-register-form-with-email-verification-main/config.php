<?php

$conn = mysqli_connect("localhost:3307", "root", "", "login");

if (!$conn) {
    echo "Connection Failed";
}