<?php
// Ustawienie nagłówków odpowiedzi HTTP
header("Content-Type: application/json; charset=UTF-8");  // Typ odpowiedzi jako JSON
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
    if (empty($data['subjectId']) || empty($data['category']) || empty($data['description']) || empty($data['date']) ||
        empty($data['classId']) || empty($data['teacherId'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brakuje wymaganych danych.', 'data'=>$data]);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $subjectId = $data['subjectId'];
    $category = $data['category'];
    $description = $data['description'];
    $date = $data['date'];
    $classId = intval($data['classId']); // Konwersja na typ liczbowy
    $teacherId = intval($data['teacherId']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
    INSERT INTO `tests_homeworks` (`id`, `subject_id`, `category`, `description`, `date`, `class_id`, `teacher_id`) VALUES (NULL, '$subjectId', '$category', '$description', '$date', '$classId', '$teacherId');
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie czy operacja się powiodła
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Wydarzenie zostało pomyślnie dodane.', 'data'=>$data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie udało się dodać wydarzenia.', 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania. Użyj POST.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
