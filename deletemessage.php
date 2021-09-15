<?php
$servername = "localhost";
$username = "root";
$password = "";

$data = [];
try {
    $conn = new PDO("mysql:host=$servername;dbname=police_diary_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'DELETE FROM messages WHERE message_id=:id';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $_POST['id']);
    $statement->execute();
    $data['success'] = "Deleted successfully.";
} catch(PDOException $e) {
    $data['error'] = "Error: " . $e->getMessage() . ". Please try again.";
}

echo json_encode($data);
?>