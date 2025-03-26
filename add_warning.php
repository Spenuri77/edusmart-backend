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
    if (empty($data['category']) || empty($data['description']) || empty($data['points']) || empty($data['date']) ||
        empty($data['studentId']) || empty($data['teacherId'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brakuje wymaganych danych.', 'data'=>$data]);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $category = $data['category'];
    $description = $data['description'];
    $points = $data['points'];
    $date = $data['date'];
    $studentId = intval($data['studentId']); // Konwersja na typ liczbowy
    $teacherId = intval($data['teacherId']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
    INSERT INTO `warnings` (`id`, `category`, `description`, `points`, `date`, `student_id`, `teacher_id`) 
    VALUES (NULL, '$category', '$description', $points, '$date', $studentId, $teacherId);
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie czy operacja się powiodła
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Uwaga została pomyślnie dodana.', 'data'=>$data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie udało się dodać uwagi.', 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania. Użyj POST.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
