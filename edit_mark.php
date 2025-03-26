<?php
// Ustawienie nagłówków odpowiedzi HTTP
header("Content-Type: application/json; charset=UTF-8"); // Typ odpowiedzi jako JSON
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT'); // Ustawienie dozwolonej metody na PUT
header('Access-Control-Allow-Headers: Content-Type');

// Plik z połączeniem bazy danych
require_once 'db_connection.php';

// Sprawdzenie czy żądanie jest metodą PUT
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Odczytanie danych wejściowych w formacie JSON
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Sprawdzenie czy wszystkie wymagane pola są obecne
    if (
        empty($data['id']) || empty($data['mark']) || empty($data['date']) ||
        empty($data['semester']) || empty($data['type']) ||
        empty($data['description']) || empty($data['weight']) ||
        empty($data['subjectId']) || empty($data['studentId']) ||
        empty($data['teacherId']) || empty($data['classId'])
    ) {
        echo json_encode(['status' => 'error', 'message' => 'Brak wymaganych danych.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $id = intval($data['id']); // Konwersja na typ liczbowy
    $mark = floatval($data['mark']); // Konwersja na typ zmiennoprzecinkowy
    $date = $data['date'];
    $semester = $data['semester'];
    $type = $data['type'];
    $description = $data['description'];
    $weight = $data['weight'];
    $subjectId = $data['subjectId'];
    $studentId = intval($data['studentId']); // Konwersja na typ liczbowy
    $teacherId = intval($data['teacherId']); // Konwersja na typ liczbowy
    $classId = intval($data['classId']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        UPDATE marks 
        SET 
            mark = $mark, 
            date = '$date', 
            semester = $semester, 
            type = '$type', 
            description = '$description', 
            weight = $weight, 
            subject_id = $subjectId, 
            student_id = $studentId, 
            teacher_id = $teacherId, 
            class_id = $classId 
        WHERE id = $id
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie czy operacja się powiodła
    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Zaktualizowano dane oceny.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono oceny o podanym ID.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie udało się zaktualizować danych oceny.', 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>
