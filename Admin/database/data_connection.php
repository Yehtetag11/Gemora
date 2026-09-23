<?php

$host="localhost";
$dbname= "gemora";
$user="root";
$password="";

try
{
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    // Stop execution here instead of letting $pdo stay undefined,
    // which used to cause a confusing "Call to a member function
    // query() on null" error much later in the page.
    die("Database connection failed: " . $e->getMessage() .
        "<br>Check that MySQL is running in XAMPP and that the '$dbname' database exists.");
}

?>