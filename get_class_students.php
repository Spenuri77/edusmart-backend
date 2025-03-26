<?php
sleep(1);

// Ustawienie nagłówków odpowiedzi HTTP
header("Content-Type: application/json; charset=UTF-8"); // Typ odpowiedzi jako JSON
header('Access-Control-Allow-Origin: *');


// Plik z połączeniem bazy danych
require_once 'db_connection.php';

// Sprawdzenie czy żądanie jest metodą GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Sprawdzenie czy wszystkie wymagane pola są obecne
    if (!isset($_GET['class_id']) || empty($_GET['class_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID klasy.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $class_id = intval($_GET['class_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT 
            * 
        FROM `students` 
        WHERE class_id = $class_id 
        ORDER BY surname;
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono uczniów.']);
        exit;
    }

    // Inicjalizacja pustej tablicy na wyniki
    $data = [];
    
    // Pobranie wszystkich rekordów zwróconych przez zapytanie
    while ($row = mysqli_fetch_assoc($result)) {
        // Przetworzenie danych i dodanie ich do tablicy wynikowej
        $data[] = [
            'id' => $row['id'],
            'firstName' => $row['first_name'],
            'middleName' => $row['middle_name'],
            'surname' => $row['surname'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'dateOfBirth' => $row['date_of_birth'],
            'dateJoined' => $row['date_joined'],
            'userId' => $row['user_id'],
        ];
    }

    // Zwrócenie wyników w formacie JSON
    echo json_encode($data);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>