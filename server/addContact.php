<?php
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['name']) && isset($data['phone'])) {
    $name = $data['name'];
    $phone = $data['phone'];

    $sql = "INSERT INTO contacts (name, phone) VALUES ('$name', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid input"]);
}

$conn->close();