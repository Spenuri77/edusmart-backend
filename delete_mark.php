<?php
// Ustawienie nagłówków odpowiedzi HTTP
header("Content-Type: application/json; charset=UTF-8"); // Typ odpowiedzi jako JSON
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE'); // Ustawienie dozwolonej metody na DELETE
header('Access-Control-Allow-Headers: Content-Type');

// Plik z połączeniem bazy danych
require_once 'db_connection.php';

// Sprawdzenie czy żądanie jest metodą DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Odczytanie danych wejściowych w formacie JSON
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Sprawdzenie czy wszystkie wymagane pola są obecne
    if (empty($data['mark_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID oceny.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $mark_id = intval($data['mark_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "DELETE FROM marks WHERE id = $mark_id";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie czy operacja się powiodła
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Usunięto ocenę.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie udało się usunąć oceny.', 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>
