<?php
sleep(1);

// Ustawienie nagłówków odpowiedzi HTTP
header("Content-Type: application/json; charset=UTF-8"); // Typ odpowiedzi jako JSON
header('Access-Control-Allow-Origin: *');

// Plik z połączeniem bazy danych
require_once 'db_connection.php';

// Sprawdzenie czy żądanie jest metodą GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['class_id']) || empty($_GET['class_id'])) {
        // Sprawdzenie czy wszystkie wymagane pola są obecne
        echo json_encode(['status' => 'error', 'message' => 'Brak ID klasy.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $class_id = intval($_GET['class_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT 
            class_name, 
            schedules.schedule 
        FROM classes
        JOIN schedules ON schedules.id = classes.schedule_id 
        WHERE classes.id = $class_id;

        SELECT 
            schedule.weekday,
            GROUP_CONCAT(schedule.subject SEPARATOR ', ') AS subjects,
            GROUP_CONCAT(schedule.hour SEPARATOR ', ') AS hours,
            GROUP_CONCAT(CONCAT(teachers.first_name, ' ', teachers.surname) SEPARATOR ', ') AS teachers
        FROM 
            schedule
        JOIN 
            teachers ON teacher_id = teachers.id
        WHERE 
            schedule.class_id = 1
        GROUP BY
            schedule.weekday
        ORDER BY 
            FIELD(schedule.weekday, 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek'),
            schedule.hour;
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono oceny.']);
        exit;
    }

    // Inicjalizacja pustej tablicy na wyniki
    $data = [];

    // Pobranie wszystkich rekordów zwróconych przez zapytanie
    while ($row = mysqli_fetch_assoc($result)) {
        // Przetworzenie danych i dodanie ich do tablicy wynikowej
        $data[] = [
            'class_name' => $row['class_name'],
            'schedule' => json_decode($row['schedule']),
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