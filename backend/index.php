<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $message = htmlspecialchars(trim($_POST['message']));
    $terms = isset($_POST['terms']) ? true : false;

    $errors = [];

    if (empty($first_name)) $errors['first_name'] = 'First name is required.';
    if (empty($last_name)) $errors['last_name'] = 'Last name is required.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Invalid email address.';
    if (empty($message)) $errors['message'] = 'Message is required.';
    if ($terms != '1') $errors['terms'] = 'You must agree to the terms and conditions.';

    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'errors' => $errors]);
        exit;
    }

    $to_user = $email;
    $subject_user = "Thank you for contacting us";
    $message_user = "Hi $first_name,\n\nThank you for reaching out. We have received your message and will get back to you shortly.\n\nBest regards,\nTeam";

    // Admin emails
    $admin1_email = "dumidu.kodithuwakku@ebeyonds.com";
    $admin1_email = "prabhath.senadheera@ebeyonds.com";
    $subject_admin = "New Contact Form Submission";
    $message_admin = "New form submission:\n\nName: $first_name $last_name\nEmail: $email\nPhone: $telephone\nMessage: $message";

    // Sending user email
    mail($to_user, $subject_user, $message_user);
    mail($admin1_email, $subject_admin, $message_admin);
    mail($admin1_email, $subject_admin, $message_admin);

    $data = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'telephone' => $telephone,
        'message' => $message,
        'terms' => $terms,
    ];

    $jsonFile = 'submissions.json';
    if (!file_exists($jsonFile)) {
        file_put_contents($jsonFile, json_encode([]));
    }
    $currentData = file_get_contents($jsonFile);
    $arrayData = json_decode($currentData, true);
    $arrayData[] = $data;
    file_put_contents($jsonFile, json_encode($arrayData));

    echo json_encode(['success' => true, 'message' => 'Form submitted successfully']);
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method.']);
}
