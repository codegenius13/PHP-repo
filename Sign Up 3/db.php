<?php

$conn = new mysqli('localhost:3307', 'root', '', 'info');
if (!$conn) {
    echo "Connection successful". mysqli_connect_error();
}

?>