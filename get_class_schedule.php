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
    if (!isset($_GET['class_id']) || empty($_GET['class_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID klasy.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $class_id = intval($_GET['class_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT 
            schedule.id,
            schedule.weekday,
            schedule.subject,
            schedule.hour,
            classes.class_name,
            schedule.classroom,
            CONCAT(teachers.first_name, ' ', teachers.surname) AS teacher_name
        FROM 
            schedule
        JOIN 
            classes ON class_id = classes.id
        JOIN
            teachers ON teacher_id = teachers.id
        WHERE 
            schedule.class_id = $class_id
        ORDER BY 
            FIELD(schedule.weekday, '1', '2', '3', '4', '5'),
            schedule.hour;
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono planu lekcji.']);
        exit;
    }

    // Inicjalizacja pustej tablicy na wyniki
    $data = [];

    // Pobranie wszystkich rekordów zwróconych przez zapytanie
    while ($row = mysqli_fetch_assoc($result)) {
        // Przetworzenie danych i dodanie ich do tablicy wynikowej
        $data[] = [
            'id' => $row['id'],
            'weekday' => $row['weekday'],
            'subject' => $row['subject'],
            'hour' => $row['hour'],
            'className' => $row['class_name'],
            'classroom' => $row['classroom'],
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