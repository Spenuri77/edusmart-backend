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
        echo json_encode(['status' => 'error', 'message' => 'Brak ID nauczyciela.']);
        exit;
    }

    // Przpisanie danych z żądania do zmiennych
    $teacher_id = intval($_GET['teacher_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT
            classes_subjects_teachers.id, 
            classes_subjects_teachers.class_id, 
            classes.class_name, 
            subjects.subject_name,
            teachers.id as teacher_id, 
            CONCAT(teachers.first_name, ' ', teachers.surname) AS teacher_name
        FROM `classes_subjects_teachers` 
        JOIN classes ON classes_subjects_teachers.class_id = classes.id 
        JOIN subjects ON classes_subjects_teachers.subject_id = subjects.id
        JOIN teachers ON classes_subjects_teachers.teacher_id = teachers.id
        WHERE teacher_id = $teacher_id
        ORDER BY classes.class_name;
    ";

    // Wykonanie zapytania
    $result = mysqli_query($conn, $query);

    // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek rekordy
    if (mysqli_num_rows($result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono klas.']);
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
            'subjectName' => $row['subject_name'],
            'teacherId' => $row['teacher_id'],
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