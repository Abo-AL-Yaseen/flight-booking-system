<?php
require_once '../../config\config.php';
require_once '../../src/utils/helpers.php';
require_once '../../config/row-sql-config.php';
session_start();

use Src\Models\User;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = $_GET["email"];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = makeQuery($sql);
    echo "Fsdfsdf";
    echo json_encode(["success" => empty($result), "message" => "User not found"]);
} else {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = makeQuery($sql);
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    if (!empty($result)) {

        $_SESSION['error'] = "User already exists";
    }

    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match";
    }

    try {
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);
        $_SESSION['email'] = $email;
        header("Location: ../views/verificationCode.php");
    } catch (Exception $e) {
        echo $_SESSION['error'];
        header("Location: ../views/signup.php");
    }
}
