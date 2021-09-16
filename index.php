<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css"/>
    <title>Tamunokorite - SPA</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#" onclick="getPage('home.php')">SPA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class='nav-item'><a href="#" class="nav-link" onclick="getPage('home.php')">Home</a></li>
                        <li class='nav-item'><a href="#" class="nav-link" onclick="getPage('about.php')">About</a></li>
                        <li class='nav-item'><a href="#" class="nav-link" onclick="getPage('contact.php')">Contact Us</a></li>
                        <li class='nav-item'><a href="#" class="nav-link" onclick="getPage('messages.php')">Messages</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
        <section>
            <h1>This is the home page.</h1>
        </section>
    </main>

    <footer class="footer row mt-auto py-3">
        <div class="container">
            <p>Tamunokorite Briggs</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.0/b-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="index.js"></script>

</body>
</html>