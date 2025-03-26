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
        SELECT student_messages.id, student_id, CONCAT( students.first_name, ' ',students.surname) AS sent_by, teacher_id, CONCAT(teachers.first_name, ' ', teachers.surname) AS sent_to, date, subject, content FROM `student_messages` JOIN students ON student_messages.student_id = students.id JOIN teachers ON student_messages.teacher_id = teachers.id WHERE student_id=$student_id ORDER by date DESC;
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode([]);
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
            'sentBy' => $row['sent_by'],
            'teacherId' => $row['teacher_id'],
            'sentTo' => $row['sent_to'],
            'date' => $row['date'],
            'subject' => $row['subject'],
            'content' => $row['content'],
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