<?php
$servername = "localhost";
$username = "root";
$password = "";

$data = [];
try {
    $conn = new PDO("mysql:host=$servername;dbname=police_diary_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO messages (name, email, subject,message) VALUES (:name, :email, :subject,:message)';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':name', $_POST['name']);
    $statement->bindParam(':email', $_POST['email']);
    $statement->bindParam(':subject', $_POST['subject']);
    $statement->bindParam(':message', $_POST['message']);
    $statement->execute();
    $data['success'] = "Thanks for your message " . $_POST['name'] . " We'll get back to you soon.";
} catch(PDOException $e) {
    $data['error'] = "Error: " . $e->getMessage() . ". Please try again.";
}

echo json_encode($data);

?>