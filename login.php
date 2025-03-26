<?php
// Ustawienie nagłówków odpowiedzi HTTP
header("Content-Type: application/json; charset=UTF-8"); // Typ odpowiedzi jako JSON
header('Access-Control-Allow-Origin: *');

// Plik z połączeniem bazy danych
require_once 'db_connection.php';

// Sprawdzenie czy żądanie jest metodą POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sprawdzenie czy wszystkie wymagane pola są obecne
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo json_encode(["status" => "error", "message" => "Brak danych"]);
    exit;
}

    // Przpisanie danych z żądania do zmiennych
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Zapytanie SQL
    $query = "
        SELECT * 
        FROM users 
        WHERE email='$email' AND password='$password';
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowe dane logowania.']);
        exit;
    }


    // Inicjalizacja pustej tablicy na wyniki
    $data = [];

    // Pobranie wszystkich rekordów zwróconych przez zapytanie
    while ($row = mysqli_fetch_assoc($result)) {
        // Przetworzenie danych i dodanie ich do tablicy wynikowej
        $data[] = [
            'id' => $row['id'],
            'email' => $row['email'],
            'password' => $row['password'],
            'role' => $row['role'],
            'schoolId' => $row['school_id'],
        ];
    }

    // Zwrócenie wyników w formacie JSON
    echo json_encode(['status' => 'success', 'user' => $data] );
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>