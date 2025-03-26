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
        echo json_encode(['status' => 'error', 'message' => 'Nie podano ID klasy.']);
        exit;
    }
    if (!isset($_GET['teacher_id']) || empty($_GET['teacher_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Brak ID nauczyciela.']);
        exit;
    }
    if (!isset($_GET['semester']) || empty($_GET['semester'])) {
        echo json_encode(['status' => 'error', 'message' => 'Nie podano semestru.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $teacher_id = intval($_GET['teacher_id']); // Konwersja na typ liczbowy
    $class_id = intval($_GET['class_id']); // Konwersja na typ liczbowy
    $semester = intval($_GET['semester']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT 
            GROUP_CONCAT(marks.id) AS ids,
            GROUP_CONCAT(mark) AS marks, 
            subject_id,
            student_id,
            teacher_id,
            semester,
            marks.class_id,
            CONCAT(students.first_name, ' ', students.surname) as student_name
        FROM `marks`
        JOIN students ON marks.student_id = students.id
        WHERE marks.class_id = $class_id AND teacher_id = $teacher_id AND semester = $semester
        GROUP BY students.surname
        ORDER BY students.surname;
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
        $marks = explode(',', $row['marks']);
        $ids = explode(',', $row['ids']); 

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
            'marks' => $marksCombined,
            'subjectId' => $row['subject_id'],
            'studentId' => $row['student_id'],
            'teacherId' => $row['teacher_id'],
            'semester' => $row['semester'],
            'classId' => $row['class_id'],
            'studentName' => $row['student_name'],
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