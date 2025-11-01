<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_POST;
    $errors = [];

    if (empty($_POST['trip'])) {
        $errors[] = 'Trip type is required.';
    }

    if (empty($_POST['leaving_from'])) {
        $errors[] = 'Leaving from is required.';
    }

    if (empty($_POST['going_to'])) {
        $errors[] = 'Going to is required.';
    }

    if (empty($_POST['departure_date'])) {
        $errors[] = 'Departure date is required.';
    }

    if ($_POST['trip'] == 'Round_trip' && empty($_POST['return_date'])) {
        $errors[] = 'Return date is required for round_trip.';
    }

    if (empty($_POST['adults']) || $_POST['adults'] < 1) {

        $errors[] = 'At least one adult is required.';
    }
    print_r($errors);
    if (empty($errors)) {
        $_SESSION['trip'] = $_POST['trip'];
        $_SESSION['leaving_from'] = $_POST['leaving_from'];
        $_SESSION['going_to'] = $_POST['going_to'];
        $_SESSION['departure_date'] = $_POST['departure_date'];
        $_SESSION['return_date'] = $_POST['return_date'];
        $_SESSION['adults'] = $_POST['adults'];

        header("Location: ../views/book-flight.php");
    }
}
