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

    // Przpisanie danych z żądania do zmiennych
    $student_id = intval($_GET['student_id']); // Konwersja na typ liczbowy

    // Zapytanie SQL
    $query = "
        SELECT 
            students.id, 
            first_name, 
            middle_name, 
            surname, 
            email, 
            gender, 
            date_of_birth, 
            date_joined,
            class_id,
            classes.class_name AS class_name, 
            schools.name,
            schools.address,
            schools.identifier,
            user_id 
        FROM `students` 
        JOIN classes ON students.class_id = classes.id 
        JOIN schools ON students.school_id = schools.id
        WHERE students.id = $student_id;
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
        // Przetworzenie danych i dodanie ich do tablicy wynikowej
        $data[] = [
            'id' => $row['id'],
            'firstName' => $row['first_name'],
            'middleName' => $row['middle_name'],
            'surname' => $row['surname'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'dateOfBirth' => $row['date_of_birth'],
            'dateJoined' => $row['date_joined'],
            'classId' => $row['class_id'],
            'className' => $row['class_name'],
            'schoolName' => $row['name'],
            'address' => $row['address'],
            'identifier' => $row['identifier'],
            'userId' => $row['user_id'],
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