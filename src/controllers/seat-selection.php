<?php
require_once '../../config/row-sql-config.php';
session_start();
$flight_id = $_SESSION['flight1_id'];
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM flight WHERE id = '$flight_id'";
    $booked_seats = makeQuery($sql)[0]['booked_seats'];
    $booked_seats_array = explode(',', $booked_seats);
    // print_r(makeQuery($sql)[0]['booked_seats']);
    header('Content-Type: application/json');
    echo json_encode($booked_seats_array);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    if (!isset($_SESSION['flight1_seat'])) {
        $_SESSION['flight1_seat'] = [];
    }
    array_push($_SESSION['flight1_seat'], $data['seat']);
    $seat = $data['seat'];
    $update_sql = "UPDATE flight SET booked_seats = array_append(booked_seats, '$seat') WHERE id = '$flight_id'";
    makeQuery($update_sql);
}
