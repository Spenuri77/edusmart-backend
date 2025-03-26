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

    // Przpisanie danych z żądania do zmiennych
    $student_id = intval($_GET['student_id']); // Konwersja na typ liczbowy
    $semester = intval($_GET['semester']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT 
            subjects.subject_name, 
            subjects.id,
            GROUP_CONCAT(marks.mark ORDER BY marks.date ASC SEPARATOR ', ') AS marks,
            GROUP_CONCAT(marks.id ORDER BY marks.date ASC SEPARATOR ', ') AS ids,
            CONCAT(teachers.first_name, ' ', teachers.surname) AS teacher_name,
            marks.teacher_id,
            expected_final_marks.mark AS expected_mark,
            final_marks.mark AS final_mark
        FROM marks
        JOIN subjects ON marks.subject_id = subjects.id 
        JOIN teachers ON marks.teacher_id = teachers.id
        LEFT JOIN expected_final_marks 
            ON marks.student_id = expected_final_marks.student_id 
            AND marks.subject_id = expected_final_marks.subject_id
        LEFT JOIN final_marks 
            ON marks.student_id = final_marks.student_id 
            AND marks.subject_id = final_marks.subject_id
        WHERE marks.student_id = $student_id
        AND marks.semester = $semester
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

        // Inicjalizacja pustej tablicy na wyniki
        $marksCombined = [];
        for ($i = 0; $i < count($marks); $i++) {
            // Przetworzenie danych i dodanie ich do tablicy wynikowej
            $marksCombined[] = [
                'id' => $ids[$i],
                'mark' => $marks[$i],
            ];
        }

        // Przetworzenie danych i dodanie ich do tablicy wynikowej
        $data[] = [
            'subject_name' => $row['subject_name'],
            'id' => $row['id'],
            'marks' => $marksCombined,
            'teacher_name' => $row['teacher_name'],
            'teacher_id' => $row['teacher_id'],
            'expected_mark' => $row['expected_mark'],
            'final_mark' => $row['final_mark'],
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