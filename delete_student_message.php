<?php
// Ustawienie nagłówków odpowiedzi HTTP
header("Content-Type: application/json; charset=UTF-8"); // Typ odpowiedzi jako JSON
header('Access-Control-Allow-Origin: *');

// Plik z połączeniem bazy danych
require_once 'db_connection.php';

// Sprawdzenie czy żądanie jest metodą GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Sprawdzenie czy wszystkie wymagane pola są obecne
    if (!isset($_GET['message_id']) || empty($_GET['message_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID wiadomości.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $message_id = intval($_GET['message_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
       DELETE FROM `student_messages` WHERE `student_messages`.`id` = $message_id

    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie czy operacja się powiodła
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Usunięto wiadomość.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie udało się usunąć wiadomości.', 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>
