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
    if (!isset($_GET['date1']) || empty($_GET['date1'])) {
        echo json_encode(['status' => 'error', 'message' => 'Nie podano daty pierwszej.']);
        exit;
    }
    if (!isset($_GET['date2']) || empty($_GET['date2'])) {
        echo json_encode(['status' => 'error', 'message' => 'Nie podano daty drugiej.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $student_id = intval($_GET['student_id']); // Konwersja na typ liczbowy
    $date1 = strval($_GET['date1']); // Konwersja na typ tekstowy
    $date2 = strval($_GET['date2']); // Konwersja na typ tekstowy

    // Zapytanie SQL
    $query = "
        SELECT 
            attendance.id, 
            attendance.student_id, 
            attendance.class_id, 
            attendance.lesson_id, 
            attendance.status,
            attendance.date, 
            schedule.teacher_id, 
            CONCAT(teachers.first_name, ' ', teachers.surname) AS teacher_name, 
            schedule.subject, 
            schedule.weekday, 
            schedule.hour, 
            schedule.classroom 
        FROM `attendance` 
        JOIN schedule ON attendance.lesson_id = schedule.id 
        JOIN teachers ON schedule.teacher_id = teachers.id
        WHERE 
            student_id = $student_id
            AND date BETWEEN '$date1' AND '$date2';
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono danych.']);
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
            'classId' => $row['class_id'],
            'lessonId' => $row['lesson_id'],
            'status' => $row['status'],
            'date' => $row['date'],
            'teacherId' => $row['teacher_id'],
            'teacherName' => $row['teacher_name'],
            'subject' => $row['subject'],
            'weekday' => $row['weekday'],
            'hour' => $row['hour'],
            'classroom' => $row['classroom'],
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