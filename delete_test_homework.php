<?php
// Ustawienie nagłówków odpowiedzi HTTP
header("Content-Type: application/json; charset=UTF-8"); // Typ odpowiedzi jako JSON
header('Access-Control-Allow-Origin: *');

// Plik z połączeniem bazy danych
require_once 'db_connection.php';

// Sprawdzenie czy żądanie jest metodą GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Sprawdzenie czy wszystkie wymagane pola są obecne
    if (!isset($_GET['event_id']) || empty($_GET['event_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID wydarzenia.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $event_id = intval($_GET['event_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
       DELETE FROM tests_homeworks WHERE tests_homeworks.id = $event_id
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie czy operacja się powiodła
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Usunięto wydarzenie.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie udało się usunąć wydarzenia.', 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>
