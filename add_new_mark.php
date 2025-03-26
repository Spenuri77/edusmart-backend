<?php
// Ustawienie nagłówków odpowiedzi HTTP
header("Content-Type: application/json; charset=UTF-8"); // Typ odpowiedzi jako JSON
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST'); // Ustawienie dozwolonej metody na POST
header('Access-Control-Allow-Headers: Content-Type');

// Plik z połączeniem bazy danych
require_once 'db_connection.php'; 

// Sprawdzenie czy żądanie jest metodą POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Odczytanie danych wejściowych w formacie JSON
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Sprawdzenie czy wszystkie wymagane pola są obecne
    if (empty($data['mark']) || empty($data['date']) || empty($data['semester']) || empty($data['type']) ||
        empty($data['description']) || empty($data['weight']) || empty($data['subjectId']) || 
        empty($data['studentId']) || empty($data['teacherId']) || empty($data['classId'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brakuje wymaganych danych.', 'data'=>$data]);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $mark = $data['mark'];
    $date = $data['date'];
    $semester = intval($data['semester']); // Konwersja na typ liczbowy
    $type = $data['type'];
    $description = $data['description'];
    $weight = intval($data['weight']); // Konwersja na typ liczbowy
    $subjectId = intval($data['subjectId']); // Konwersja na typ liczbowy
    $studentId = intval($data['studentId']); // Konwersja na typ liczbowy
    $teacherId = intval($data['teacherId']); // Konwersja na typ liczbowy
    $classId = intval($data['classId']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        INSERT INTO marks (mark, date, semester, type, description, weight, subject_id, student_id, teacher_id, class_id)
        VALUES ('$mark', '$date', $semester, '$type', '$description', $weight, $subjectId, $studentId, $teacherId, $classId)
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie czy operacja się powiodła
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Ocena została pomyślnie dodana.', 'data'=>$data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie udało się dodać oceny.', 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania. Użyj POST.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
