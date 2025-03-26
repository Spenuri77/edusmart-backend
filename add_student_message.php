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
    if (empty($data['studentId']) || empty($data['teacherId'])  || empty($data['date']) || empty($data['subject']) || empty($data['content'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brakuje wymaganych danych.', 'data'=>$data]);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $student_id = intval($data['studentId']); // Konwersja na typ liczbowy
    $teacher_id = intval($data['teacherId']); // Konwersja na typ liczbowy
    $date = $data['date'];
    $subject = $data['subject'];
    $content = $data['content'];

    // Zapytanie SQL
    $query = "
        INSERT INTO student_messages (student_id, teacher_id, date, subject, content)
        VALUES ('$student_id', '$teacher_id', '$date', '$subject', '$content')
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie czy operacja się powiodła
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Wiadomość została pomyślnie dodana.', 'data'=>$data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie udało się dodać wiadomości.', 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania. Użyj POST.']);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
