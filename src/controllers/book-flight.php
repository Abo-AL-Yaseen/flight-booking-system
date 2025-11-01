<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    print_r($_POST);
    $errors = [];

    if (empty($_POST['leaving_from'])) {
        $errors[] = 'Leaving from is required.';
    }

    if (empty($_POST['going_to'])) {
        $errors[] = 'Going to is required.';
    }

    if (empty($_POST['departure_date'])) {
        $errors[] = 'Departure date is required.';
    }


    if (empty($_POST['adults']) || $_POST['adults'] < 1) {

        $errors[] = 'At least one adult is required.';
    }
    print_r($errors);
    if (empty($errors)) {
        $_SESSION['leaving_from'] = $_POST['leaving_from'];
        $_SESSION['going_to'] = $_POST['going_to'];
        $_SESSION['departure_date'] = $_POST['departure_date'];
        $_SESSION['return_date'] = $_POST['return_date'];
        $_SESSION['adults'] = $_POST['adults'];
        header("Location: ../views/book-flight.php");
    }
};
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select_flight'])) {
    $_SESSION['selected_flight'] = $_POST['select_flight'];
    $_SESSION['price'] = $_POST['price'];
    $_SESSION['flight1_id'] = $_POST['flight1_id'];
    $_SESSION['flight2_id'] = $_POST['flight2_id'];
    $_SESSION['departure_time1'] = $_POST['departure_time1'];
    $_SESSION['arrival_time1'] = $_POST['arrival_time1'];
    $_SESSION['departure_time2'] = $_POST['departure_time2'];
    $_SESSION['arrival_time2'] = $_POST['arrival_time2'];
    header("Location: ../views/complete-booking.php");
    return;
}
