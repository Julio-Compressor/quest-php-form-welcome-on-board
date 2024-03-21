<?php
$data=array_map('trim', $_POST);
$data=array_map('htmlentities',$data);
// $errors=[];
if (!empty($data)) {
    if (empty($data['name'])) {
        $errors[]='Please enter your name';
    }
    if (empty($data['email'])) {
        $errors[]='Please enter your Email';
    }
    if (empty($data['subject'])) {
        $errors[]='Please make your selection';
    }
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[]='Invalid Email';
    }
}
if (!empty($data) && empty($errors)) {
    header("location: treatment.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome on board</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php include '_navbar.php' ?>
        <div class="container">
            <h1>Welcome on board!</h1>
            <img src="/assets/images/avatar.png" alt="">
        </div>
    </header>
    <main>
        <section class="container">
            <h2 id="articles">Recent articles</h2>
            <div class="articles">
                <article>
                    <img src="/assets/images/responsive.png" alt="Responsive">
                    <h3>Responsive</h3>
                    <a href="#">Read</a>
                </article>
                <article>
                    <img src="/assets/images/scalable.png" alt="Scalable">
                    <h3>Scalable</h3>
                    <a href="#">Read</a>
                </article>
                <article>
                    <img src="/assets/images/inclusive.png" alt="Inclusive">
                    <h3>Inclusive</h3>
                    <a href="#">Read</a>
                </article>
            </div>
        </section>
        <section class="container">
            <h2 id="about">About</h2>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi rerum debitis fugit similique laborum,
                eveniet nam ratione sed, itaque, minus in hic dolores suscipit molestias quis quibusdam error blanditiis
                sapiente.
                Laborum laudantium aut, consequuntur voluptatum animi eaque mollitia? Saepe neque facilis minima
                laborum, provident numquam ipsum laudantium totam porro placeat exercitationem voluptates quia explicabo
                temporibus sapiente non. Quo, repellat corrupti.
            </p>
            <p>
                Excepturi dolore saepe, temporibus est voluptate necessitatibus molestiae sit minima eum quisquam et qui
                quaerat nemo nam, consequuntur nisi alias in praesentium. Fuga amet esse nam doloremque ut nemo nostrum.
            </p>
        </section>
        <section class="container">
            <h2 id="form">Get in touch</h2>
            <?php
            if (!isset($errors)) {
                echo "<p>Leave us a message and we will get back to you as soon as possible.</p>";
                echo '<p>Fields marked with red wildcards * are required</p>';
            } else {
                echo "<h2>Please fix errors below</h2>";
                echo "<ul>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
            }
            ?>
            <form action="" method='post'>
                <label for="name"><h3>Name<span>*</span></h3></label>
                <input type="text" id="name" name="name" value="<?= $data['name'] ?? '' ?>" required></input>

                <label for="email"><h3>Email<span>*</span></h3></label>
                <input type="email" id="email" name="email" value="<?= $data['email'] ?? '' ?>" required></input>

                <label for="subject"><h3>Subjetc<span>*</span></h3></label>
                <select id="subject" name="subject" required>
                    <option value="">--Choose an option--</option>
                    <option value="rdv">Book a meeting</option>
                    <option value="devis">Request a quote</option>
                    <option value="newsletter">Newsletter</option>
                </select>
                <label for="message"><h3>Message</h3></label>
                <textarea name="message" id="message" rows="10"><?= $data['message'] ?? '' ?></textarea><br>
                <input class="btn" type="submit" value="Send">
            </form>
        </section>
        <?php //@todo Add a contact form  ?>
    </main>
    <?php include '_footer.php' ?>
</body>
</html>
