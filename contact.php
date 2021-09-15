<section id="contact">
    <div class="container">
    <h1>Contact Us</h1>
    <div class="row">
    <form id="contact-form" method="post">
        <label for="name" class="visually-hidden">Name</label>
        <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" required><br>
        <label for="email" class="visually-hidden">Email</label>
        <input type="email" class="form-control" placeholder="Enter Email Address" name="email" id="email" required><br>
        <label for="subject" class="visually-hidden">Subject</label>
        <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject" required><br>
        <label for="message" class="visually-hidden">Message</label>
        <textarea name="message" class="form-control" placeholder="Message..." id="message" style="resize: none;" required></textarea><br>
        <span id="server-message"></span><br><br>
        <button onclick="event.preventDefault(); sendMessage()" type="submit" id="submit" class="btn btn-dark">Send Message</button>
    </form>
    </div>
    </div>
</section>