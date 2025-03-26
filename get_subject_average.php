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
    if (!isset($_GET['student_id']) || empty($_GET['student_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID ucznia.']);
        exit;
    }
    if (!isset($_GET['semester']) || empty($_GET['semester'])) {
        echo json_encode(['status' => 'error', 'message' => 'Nie podano semestru.']);
        exit;
    }
    if (!isset($_GET['subject_id']) || empty($_GET['subject_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Nie podano semestru.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $student_id = intval($_GET['student_id']); // Konwersja na typ liczbowy
    $semester = intval($_GET['semester']); // Konwersja na typ liczbowy
    $subject_id = intval($_GET['subject_id']);  // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT 
            subjects.subject_name, 
            subjects.id,
            GROUP_CONCAT(marks.mark ORDER BY marks.date ASC SEPARATOR ', ') AS marks,
            GROUP_CONCAT(marks.id ORDER BY marks.date ASC SEPARATOR ', ') AS ids,
            GROUP_CONCAT(marks.date ORDER BY marks.date ASC SEPARATOR ', ') AS dates,
            CONCAT(teachers.first_name, ' ', teachers.surname) AS teacher_name,
            marks.teacher_id
        FROM marks
        JOIN subjects ON marks.subject_id = subjects.id 
        JOIN teachers ON marks.teacher_id = teachers.id
        WHERE marks.student_id = $student_id
        AND marks.semester = $semester
        AND subjects.id = $subject_id
        GROUP BY marks.subject_id;
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono ucznia.']);
        exit;
    }

    // Inicjalizacja pustej tablicy na wyniki
    $data = [];
    
    // Pobranie wszystkich rekordów zwróconych przez zapytanie
    while ($row = mysqli_fetch_assoc($result)) {
        // Rozdzielenie ciągu znaków na tablicę
        $marks = explode(', ', $row['marks']);
        $ids = explode(', ', $row['ids']);
        $dates = explode(', ', $row['dates']);

        // Inicjalizacja pustej tablicy na wyniki
        $marksCombined = [];
        for ($i = 0; $i < count($marks); $i++) {
            // Przetworzenie danych i dodanie ich do tablicy wynikowej
            $marksCombined[] = [
                'id' => $ids[$i],
                'ocena' => $marks[$i],
                'date' => $dates[$i]
            ];
        }

        // Przetworzenie danych i dodanie ich do tablicy wynikowej
        $data[] = [
            'subject_name' => $row['subject_name'],
            'id' => $row['id'],
            'marks' => $marksCombined,
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