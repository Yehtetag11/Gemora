<?php
require_once("data_connection.php");

function doesUserExist($pdo, $email) 
{
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email=:email");
    $stmt->execute(['email' => $email]);
    $count = $stmt->fetchColumn();
    return $count > 0;
}
?>
