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
    if (empty($data['id']) || empty($data['studentId']) || empty($data['classId']) || empty($data['lessonId']) || empty($data['status'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brakuje wymaganych danych.', 'data'=>$data]);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $id = $data['id'];
    $student_id = $data['studentId'];
    $class_id = $data['classId'];
    $lesson_id = intval($data['lessonId']); // Konwersja na typ liczbowy
    $status = $data['status'];

    // Zapytanie SQL
    $query = "
        UPDATE `attendance` SET `status` = '$status' WHERE `attendance`.`id` = $id;
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie czy operacja się powiodła
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Frekwencja została pomyślnie edytowana.', 'data'=>$data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie udało się edytować frekwencji.', 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania. Użyj POST.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>