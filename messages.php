<?php
$servername = "localhost";
$username = "root";
$password = "";

$data = [];
try {
    $conn = new PDO("mysql:host=$servername;dbname=police_diary_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM messages';
    $statement = $conn->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll();
    // $data['success'] = "Thanks for your message " . $_POST['name'] . " We'll get back to you soon.";
} catch(PDOException $e) {
    $data['error'] = "Error: " . $e->getMessage() . ". Please try again.";
}

?>

<section id="messages">
    <h1>Messages</h1>
    <table id="myTable" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th><h3>S/No.</h3></th>
                <th><h3>Name</h3></th>
                <th><h3>Email</h3></th>
                <th><h3>Subject</h3></th>
                <th><h3>Message</h3></th>
                <th><h3>Options</h3></th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $message) : ?>
            <tr>
                <td><?php echo $i; $i++ ?></td>
                <td><?php echo $message['name'] ?></td>
                <td><?php echo $message['email'] ?></td>
                <td><?php echo $message['subject'] ?></td>
                <td><?php echo $message['message'] ?></td>
                <td>
                <a href="mailto:<?php echo $message['email'] ?>" class="btn btn-primary">Reply</a>
                    <button class="btn btn-dark" onclick="getPage('editmessage.php?id=<?php echo $message['message_id'] ?>')">Edit</button>
                    <button class="btn btn-danger" onclick="deleteMessage(<?php echo $message['message_id'] ?>)">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<script>
        $(function() {
            $('#myTable').DataTable();
        })
</script>