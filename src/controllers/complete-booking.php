<?php
session_start();

$numberOfPassengers = $_SESSION['adults'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    for ($i = 1; $i <= $numberOfPassengers; $i++) {
        $_SESSION['passenger_' . $i] = [
            'first_name' => $_POST['first_name_' . $i],
            'last_name' => $_POST['last_name_' . $i],
            'gender' => $_POST['gender_' . $i],
            'dob' => $_POST['dob_' . $i],
            'country' => $_POST['country_' . $i],
            'id_number' => $_POST['id_number_' . $i]
        ];
    }

    header("Location: ../views/seat-selection.php");
}
