<?php
require_once '../../config/row-sql-config.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $flight_id = $_SESSION['flight2_id'];
    $sql = "SELECT * FROM flight WHERE id = '$flight_id'";
    $booked_seats = makeQuery($sql)[0]['booked_seats'];
    $booked_seats_array = explode(',', $booked_seats);
    // print_r(makeQuery($sql)[0]['booked_seats']);
    header('Content-Type: application/json');
    echo json_encode($booked_seats_array);
}
