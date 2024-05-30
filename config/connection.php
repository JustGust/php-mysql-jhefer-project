
<?php

$mysqli = new mysqli("localhost", "root", "root", "project_jhefer");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}