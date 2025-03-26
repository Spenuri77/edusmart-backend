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
        echo json_encode(['status' => 'error', 'message' => 'Nie podano ID nauczyciela.']);
        exit;
    }
    if (!isset($_GET['weekday']) || empty($_GET['weekday'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak dnia tygodnia.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $teacher_id = intval($_GET['teacher_id']); // Konwersja na typ liczbowy
    $weekday = intval($_GET['weekday']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
    SELECT schedule.id, schedule.class_id, classes.class_name, schedule.teacher_id, subject, weekday, hour, classroom FROM `schedule` JOIN classes ON schedule.class_id = classes.id WHERE teacher_id = $teacher_id AND weekday = $weekday;
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
            'classId' => $row['class_id'],
            'className' => $row['class_name'],
            'teacherId' => $row['teacher_id'],
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