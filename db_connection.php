<?php

// Zmienne z danymi bazy danych
$host = "localhost";
$username = "root";
$password = "";
$dbname = "edusmart";

// Utworzenie połączenia z bazą danych w stylu proceduralnym
$conn = mysqli_connect($host, $username, $password, $dbname);

// Sprawdzenie czy połączenie jest poprawne
if (!$conn) {
    die(json_encode(["status" => "error", "message" => "Połączenie z baządanych nieudane: " . mysqli_connect_error()]));
}
?>
