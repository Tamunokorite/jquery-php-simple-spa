<?php
$servername = "localhost";
$username = "root";
$password = "";

$data = [];
try {
    $conn = new PDO("mysql:host=$servername;dbname=police_diary_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM messages WHERE message_id=:id';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $_GET['id']);
    $statement->execute();
    $data = $statement->fetch();
    // $data['success'] = "Thanks for your message " . $_POST['name'] . " We'll get back to you soon.";
} catch(PDOException $e) {
    $data['error'] = "Error: " . $e->getMessage() . ". Please try again.";
}

?>

<section id="viewmessage" class="h-100">
<a href="#" class="nav-link nav-item" onclick="getPage('messages.php')">Back</a>
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-100 position-relative">
        <div class="col p-4 d-flex flex-column position-static h-100">
            <strong class="d-inline-block mb-2 text-dark">From: <?php echo $data['name'] ?></strong>
            <h3 class="mb-0"><?php echo $data['subject'] ?></h3>
            <div class="mb-1 text-muted"><a href="mailto:<?php echo $data['email'] ?>"><?php echo $data['email'] ?></a></div>
            <p class="card-text mb-auto"><?php echo $data['message'] ?></p>
        </div>
    </div>
</section>

<script>
        $(function() {
            $('#myTable').DataTable();
        })
</script>