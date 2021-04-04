<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Compass Center</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/contact.css">

</head>
<body>

<main>
    <section class="container">
        <div class="row p-0 justify-content-center">
            <div class="col-lg-6 w-75 contact-form">

                <form id="contact-form" method="post" action="contact.php">

                    <div class="header-text-sm mb-5 text-center">Ro'yxatdan o'tish</div>

                    <input type="text" name="name" class="form-control" placeholder="Ismingiz va Familiyangiz" required>
                    <input type="email" name="email" class="form-control" placeholder="Gmail pochtangiz: example@gmail.com " required>
                    <input type="text" name="tel" class="form-control" placeholder="Telefon raqamingiz: +998901234567" required>
                    <textarea name="message" id="" cols="10" rows="5" class="form-control mt-4" placeholder="O'zingiz haqida qisqacha ma'lumot" required></textarea><br>

                    <input type="submit" class="submit" value="Yuborish">
                </form>

            </div>

        </div>
    </section>
</main>


</body>
</html>