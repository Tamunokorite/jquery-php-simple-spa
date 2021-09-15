<?php
$servername = "localhost";
$username = "root";
$password = "";

$data = [];
try {
    $conn = new PDO("mysql:host=$servername;dbname=police_diary_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = 'SELECT * FROM messages WHERE message_id=:id';
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $_GET['id']);
        $statement->execute();
        $data = $statement->fetch();
    }
    else {
        $sql = 'UPDATE messages SET name=:name, email=:email, subject=:subject, message=:message WHERE message_id=:id';
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $_POST['id']);
        $statement->bindParam(':name', $_POST['name']);
        $statement->bindParam(':email', $_POST['email']);
        $statement->bindParam(':subject', $_POST['subject']);
        $statement->bindParam(':message', $_POST['message']);
        $statement->execute();
        $data['success'] = "Edited Successfully.";
    }
    // $data['success'] = "Thanks for your message " . $_POST['name'] . " We'll get back to you soon.";
} catch(PDOException $e) {
    $data['error'] = "Error: " . $e->getMessage() . ". Please try again.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo json_encode($data);
    return;
}

?>

<section id="edit">
    <div class="container">
    <h1>Edit Message</h1>
    <div class="row">
    <form id="contact-form" method="post">
        <label for="name" class="visually-hidden">Name</label>
        <input type="text" class="form-control" value="<?php echo $data['name'] ?>" placeholder="Enter Name" name="name" id="name" required><br>
        <label for="email" class="visually-hidden">Email</label>
        <input type="email" class="form-control" value="<?php echo $data['email'] ?>" placeholder="Enter Email Address" name="email" id="email" required><br>
        <label for="subject" class="visually-hidden">Subject</label>
        <input type="text" class="form-control" value="<?php echo $data['subject'] ?>" placeholder="Subject" name="subject" id="subject" required><br>
        <label for="message" class="visually-hidden">Message</label>
        <textarea name="message" class="form-control" placeholder="Message..." id="message" style="resize: none;" required><?php echo $data['message'] ?></textarea><br>
        <span id="server-message"></span><br><br>
        <button onclick="event.preventDefault(); editMessage(<?php echo $data['message_id'] ?>)" type="submit" id="submit" class="btn btn-dark">Edit Message</button>
    </form>
    </div>
    </div>
</section>