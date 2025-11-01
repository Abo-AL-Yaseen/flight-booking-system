<?php
function isStrongPassword($password)
{
    // Check password length
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long.";
    }

    // Check if password contains at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return "Password must contain at least one uppercase letter.";
    }

    // Check if password contains at least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        return "Password must contain at least one lowercase letter.";
    }

    // Check if password contains at least one digit
    if (!preg_match('/\d/', $password)) {
        return "Password must contain at least one number.";
    }

    // Check if password contains at least one special character
    if (!preg_match('/[@$!%*?&]/', $password)) {
        return "Password must contain at least one special character (@$!%*?&).";
    }

    // If all checks pass, the password is strong
    return true;  // Return true if the password is strong
}
