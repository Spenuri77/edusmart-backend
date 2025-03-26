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
    if (!isset($_GET['teacher_id']) || empty($_GET['teacher_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID ucznia.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $teacher_id = intval($_GET['teacher_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT teacher_messages.id, teacher_id, CONCAT(teachers.first_name, ' ', teachers.surname) as sent_by, teacher_messages.class_id, classes.class_name AS sent_to, date, subject, content FROM teacher_messages JOIN teachers ON teacher_messages.teacher_id = teachers.id JOIN classes ON teacher_messages.class_id = classes.id WHERE teacher_id = $teacher_id ORDER by date DESC;
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
            'teacherId' => $row['teacher_id'],
            'sentBy' => $row['sent_by'],
            'classId' => $row['class_id'],
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