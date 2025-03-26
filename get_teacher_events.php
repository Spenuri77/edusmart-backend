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
        SELECT 
            tests_homeworks.id,
            subjects.subject_name,
            category,
            description,
            date,
            classes.class_name,
            CONCAT(teachers.first_name, ' ', teachers.surname) AS teacher_name
        FROM tests_homeworks
        JOIN subjects ON tests_homeworks.subject_id = subjects.id
        JOIN classes ON tests_homeworks.class_id = classes.id
        JOIN teachers ON tests_homeworks.teacher_id = teachers.id
        WHERE tests_homeworks.teacher_id = $teacher_id AND date >= CURDATE()
        ORDER BY date;
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
            'subjectName' => $row['subject_name'],
            'category' => $row['category'],
            'description' => $row['description'],
            'date' => $row['date'],
            'className' => $row['class_name'],
            'teacherName' => $row['teacher_name'],
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