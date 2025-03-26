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
    if (!isset($_GET['student_id']) || empty($_GET['student_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID ucznia.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $student_id = intval($_GET['student_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT 
        	warnings.id,
            category,
            description,
            points,
            date,
            CONCAT(students.first_name, ' ', students.surname) AS student_name,
            CONCAT(teachers.first_name, ' ', teachers.surname) AS teacher_name
        FROM warnings
        JOIN students ON warnings.student_id = students.id 
        JOIN teachers ON warnings.teacher_id = teachers.id
        WHERE warnings.student_id = $student_id;  
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono uwag.']);
        exit;
    }

    // Inicjalizacja pustej tablicy na wyniki
    $data = [];

    // Pobranie wszystkich rekordów zwróconych przez zapytanie
    while ($row = mysqli_fetch_assoc($result)) {
        // Przetworzenie danych i dodanie ich do tablicy wynikowej
        $data[] = [
            'id' => $row['id'],
            'category' => $row['category'],
            'description' => $row['description'],
            'points' => $row['points'],
            'date' => $row['date'],
            'studentName' => $row['student_name'],
            'teacherName' => $row['teacher_name'],
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