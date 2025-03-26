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
        echo json_encode(['status' => 'error', 'message' => 'Nie podano ID klasy.']);
        exit;
    }
    if (!isset($_GET['lesson_id']) || empty($_GET['lesson_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID lekcji.']);
        exit;
    }
    if (!isset($_GET['date']) || empty($_GET['date'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID lekcji.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $class_id = intval($_GET['class_id']); // Konwersja na typ liczbowy
    $lesson_id = intval($_GET['lesson_id']); // Konwersja na typ liczbowy
    $date = strval($_GET['date']); // Konwersja na typ tekstowy

    // Zapytanie SQL
    $query = "
    SELECT attendance.id, student_id, CONCAT(students.first_name, ' ', students.surname) AS student_name, attendance.class_id, attendance.lesson_id, attendance.status, date
    FROM `attendance` 
    JOIN students ON attendance.student_id = students.id 
    WHERE attendance.class_id = $class_id 
      AND lesson_id = $lesson_id 
      AND date = '$date'
    ORDER BY students.surname;
    ";


    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono frekwencji.']);
        exit;
    }

    // Inicjalizacja pustej tablicy na wyniki
    $data = [];
    
    // Pobranie wszystkich rekordów zwróconych przez zapytanie
    while ($row = mysqli_fetch_assoc($result)) {
        // Przetworzenie danych i dodanie ich do tablicy wynikowej
        $data[] = [
            'id' => $row['id'],
            'studentId' => $row['student_id'],
            'studentName' => $row['student_name'],
            'classId' => $row['class_id'],
            'lessonId' => $row['lesson_id'],
            'status' => $row['status'],
            'date' => $row['date'],
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