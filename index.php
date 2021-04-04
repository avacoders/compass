<?php

include('process.php');
include('database.php');
include('tutors.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compass Learning Centre</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link rel="shortcut icon" href="image/website.png" />
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@300;400;500;600;700&family=Suranna&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
</head>
<body class="position-relative">


<main>

    <nav id="mainNavbar" class="navbar  navbar-expand-lg  navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand mx-5" href="#"><img src="image/website%20logo.png" width="150px" alt=""></a>
            <button class="navbar-toggler"  id="menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse  navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Biz haqimizda<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tutors">Tayyorlovchilar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#course">Kurslarimiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#results">Natijalar</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link reg" href="CONTACT.html">Ro'yxatdan o'tish</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <section class="w-100">
        <div id="demo" class="carousel slide shadow " data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="dot active"></li>
                <li data-target="#demo" data-slide-to="1" class="dot "></li>
                <li data-target="#demo" data-slide-to="2" class="dot"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <div class="img-main  position-relative">
                        <img src="image/1.jpg"  class="position-absolute img-motion"  alt="Los Angeles">
                        <div class="container-carousel container-fluid  position-absolute ">
                            <div class="row">
                                <div class="col-lg-6 p-0">
                                    <br>
                                    <br>
                                    <br>

                                    <div class="header-text mx-sm-auto">
                                        Biz bilan yuqori cho'qqilarni <br> zabt eting
                                    </div>

                                    <div class="offset">
                                        <div class="header-text">
                                            Compass o'quv markazi <br>
                                            orzularingiz amalga <br> oshishiga yordam beradi!
                                        </div>
                                    </div>


                                </div>


                                <div class="col-lg-4">
                                    <img src="image/girl.png" alt="" class="girl">
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img-main position-relative">
                        <img src="image/2.jpg"  class="position-absolute img-motion"  alt="Los Angeles">
                        <div class="container-carousel  position-absolute ">
                            <div class="row">
                                <div class="col-lg-6 p-0">
                                    <br>
                                    <br>
                                    <br>

                                    <div class="header-text ">
                                        Bizda endi Robototexnika kurslari <br> mavjud!
                                    </div>

                                    <div class="offset-1 mt-lg-5">
                                        <div class="header-text mt-sm-0">
                                            Farzandingizning yaratuvchanlik <br>
                                            ko'nikamalarini <br> rivojlantiring!
                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-4">
                                    <img src="image/man.png" class="girl ml-5" alt="">
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img-main position-relative">
                        <img src="image/3.jpg"  class="position-absolute img-motion"  alt="Los Angeles">
                        <div class="container-carousel  position-absolute ">
                            <div class="row">
                                <div class="col-lg-6 p-0">
                                    <br>
                                    <br>
                                    <br>
                                    <br>

                                    <div class="header-text mx-sm-auto">
                                        web dasturlash endi <br> bekobodda
                                    </div>

                                    <div class="offset">
                                        <div class="header-text">
                                            HTML5, CSS, BOOTSTRAP, SASS, <br>
                                            JAVASCRIPT, NODEJS, SQL <br> VA BOSHQALARNI O'RGANIB <br> yaxshigina pul toping!
                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-4">
                                    <img src="image/girl-2.png" class="girl" alt="">
                                </div>



                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

    </section>

    <section id="course">
        <div class="header-text py-5">Bizning kurslarimiz</div>
        <div class="container">
            <div class="row m-0 justify-content-center  courses">
                <?php require_once 'process.php' ?>


                <?php


                $result = $mysqli->query("select * from fanlar") or die($mysqli->error);

                ?>

                <?php
                while ($row = $result->fetch_assoc()):
                    ?>

                    <div class="col-lg-4 anim">
                        <div class="card ">
                            <div class="card-header"> <?php echo $row['sub_name'];  ?> </div>
                            <div class="card-body">
                                <p>
                                    <?php echo $row['izoh'];  ?>
                                </p>
                                <div class="row">
                                    <div class="col-3 main-text">
                                        Haftalik <br>
                                        Dars
                                    </div>
                                    <div class="col-3 main-text">
                                        | <?php echo $row['weekly'];  ?>
                                        ta <br>
                                        | <?php echo $row['hours'];  ?>  soat
                                    </div>
                                    <div class="col-5">
                                        <div class="header-text-md"><?php echo $row['fee'];  ?>
                                        </div>
                                        <div class="main-text">so'm/oy</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-around">
                                <a href="CONTACT.html"class="regmain">Ro'yxatdan o'tish <img class="next" src="image/fast-forward.svg" width="13px"  alt=""></a>
                            </div>
                        </div>
                    </div>

                <?php
                endwhile;
                ?>

            </div>

        </div>

        <div class="py-5"></div>
        </div>
    </section>

    <section class="gradient3" id="tutors">
        <div class="header-text-md mt-5 pt-5">tayyorlovchilarimiz</div>
        <div class="container">
            <div class="row p-0 justify-content-center" >
                <?php require_once 'tutors.php' ?>


                <?php

                $mysqli = new mysqli('localhost','root','','compass') or die(mysqli_error($mysqli));

                $result = $mysqli->query("select * from tutors") or die($mysqli->error);

                ?>

                <?php
                while ($row = $result->fetch_assoc()):
                ?>

                <div class="col-lg-4  my-5">
                    <div class="tutor card container-fluid">
                        <div class="row">
                            <div class="tutor-avatar mt-3 mx-auto p-2 border rounded-circle ">
                                <div class="tutor-img overflow-hidden">
                                    <img src="image/<?php echo $row['tutor_avatar'];  ?> " class="mx-auto" width="100px" height="100px" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="tutor-name text-center">
                            <?php echo $row['tutor_name'];  ?>
                        </div>
                        <div class="tutor-subject text-center">
                            <?php echo $row['tutor_subject'];  ?>
                        </div>
                        <div class="row tutor-contact  justify-content-center">
                            <div class="tutor-icon border rounded-circle ">
                                <a href="https://www.t.me/<?php echo $row['tutor_telegram'];  ?> " class="h-100" id="telegram-tutor-math">
                                    <img src="image/telegram-plane.svg" class="mx-auto" width="25px" alt="">
                                </a>
                            </div>
                            <div class="tutor-icon border rounded-circle ">
                                <a href="tel:  <?php echo $row['tutor_phone'];  ?> ">
                                    <img src="image/phone.svg" class="mx-auto" width="25px" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <?php
                endwhile;
                ?>

            </div>

        </div>
    </section>

    <section class="position-relative mb-5" id="results">
        <div class="new-mg"></div>
        <div class="header-text py-5 position-relative">Natijalar</div>
        <div class="container mb-5">
            <div class="row m-0 justify-content-center  results">
                <div class="col-lg-8 mt-lg-4 anim-2">
                    <div class="header-text mt-5 mb-3 ">Talaba bo'lgan <br> abituryentlarimiz</div>
                    <div class="d-flex ">
                        <div class="indicator-border shadow mb-5">
                            <div class="indicator admitted"></div>
                        </div>
                        <div class="percent percent1 header-text mt-2 ml-3">80%</div>
                    </div>
                    <div class="header-text mt-5 mb-3 ">chet elga <br>chiqqan abituryentlarimiz</div>
                    <div class="d-flex ">
                        <div class="indicator-border shadow mb-5">
                            <div class="indicator abroad"></div>
                        </div>
                        <div class="percent header-text percent2 mt-2 ml-3">53%</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="student rounded">
                        <div class="card bg-transparent">
                            <img class="card-img" src="image/avazbek.jpg" alt="">
                            <div class="card-img-overlay p-0">
                                <div class="student-name card-header">Ne'matov Avazbek</div>
                                <div class="card-body student-body">

                                </div>

                                <div class="card-footer student-info container-fluid text-left">
                                    <div class="text-center text-result"><img src="image/dropdown.png" width="20px" class="dropdown-anim" alt="">    Natijalar
                                        <img src="image/dropdown.png" width="20px" class="dropdown-anim" alt="">
                                    </div>
                                    <div class="row mt-3">

                                        <div class="col-7">
                                            <div class="student-subject-1">Matematika</div>
                                            <div class="student-subject-2">Fizika</div>
                                            <div class="student-subject-3">Ingliz tili</div>
                                        </div>
                                        <div class="col-5">
                                            <div class="student-subject-1">68.2</div>
                                            <div class="student-subject-2">25.2</div>
                                            <div class="student-subject-3">IELTS 6.0</div>
                                        </div>
                                    </div>
                                    <div class="row student-contact mb-3  justify-content-center">
                                        <div class="student-icon border rounded-circle ">
                                            <a href="https://www.t.me/ava_coder01" id="">
                                                <img src="image/telegram.svg" class="mx-auto" height="20px" width="21px" alt="">
                                            </a>
                                        </div>
                                        <div class="student-icon border rounded-circle ">
                                            <a href="tel: +9989093911755">
                                                <img src="image/phone-call.svg" class="mx-auto" height="20px" width="21px" alt="">
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5 container position-relative">

            <div class="owl-carousel  owl-theme p-0 m-0"  id="owl-demo">
                <?php require_once 'students.php' ?>


                <?php

                $mysqli = new mysqli('localhost','root','','compass') or die(mysqli_error($mysqli));

                $result = $mysqli->query("select * from students") or die($mysqli->error);

                ?>

                <?php
                while ($row = $result->fetch_assoc()):
                ?>
                    <div class="item">
                        <div class="student2 rounded">
                            <div class="card bg-transparent">
                                <img class="card-img" src="uploads/<?php echo $row['student_avatar']  ?>" height="320px" alt="">
                                <div class="card-img-overlay p-0">
                                    <div class="student-name card-header"><?php echo $row['student_name']  ?></div>
                                    <div class="card-body student-body">

                                    </div>

                                    <div class="card-footer student-info container-fluid text-left">
                                        <div class="text-center text-result"><img src="image/dropdown.png" width="20px" class="dropdown-anim" alt="">    Natijalar
                                            <img src="image/dropdown.png" width="20px" class="dropdown-anim" alt="">
                                        </div>
                                        <div class="row mt-3">

                                            <div class="col-6">
                                                <div class="student-subject-1"><?php echo $row['fsubject']  ?></div>
                                                <div class="student-subject-2"><?php echo $row['ssubject']  ?></div>
                                                <div class="student-subject-3"><?php echo $row['tsubject']  ?></div>
                                            </div>
                                            <div class="col-6">
                                                <div class="student-subject-1"><?php echo $row['fball'] ?></div>
                                                <div class="student-subject-2"><?php echo $row['sball'] ?></div>
                                                <div class="student-subject-3"><?php echo $row['tball'] ?></div>
                                            </div>
                                        </div>
                                        <div class="row student-contact mb-3  justify-content-center">
                                            <div class="student-icon border rounded-circle ">
                                                <a href="https://www.t.me/<?php echo $row['student_telegram']  ?>" class="h-100">
                                                    <img src="image/telegram.svg" class="mx-auto" height="20px" width="21px" alt="">
                                                </a>
                                            </div>
                                            <div class="student-icon border rounded-circle ">
                                                <a href="tel: <?php echo $row['student_phone']  ?>">
                                                    <img src="image/phone-call.svg" class="mx-auto" height="20px" width="21px" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>

    </section>

    <div class="loader-block">
        <div class="loader d-flex">
            <div class="loader-inner"></div>
        </div>
    </div>

    <section>
        <div class="container my-5">

            <div class="header-text mb-5">bizning manzil</div>

            <div id="map-container-google-1" class="justify-content-center d-lg-flex">
                <div class="col-lg-4 mx-lg-3 mx-sm-1"> <div class="header-text mb-3">3-daha</div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d761.6334066838293!2d69.23932982920118!3d40.219436022748674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDEzJzEwLjAiTiA2OcKwMTQnMjMuNiJF!5e0!3m2!1sen!2sus!4v1600342911860!5m2!1sen!2sus" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-lg-4 mx-lg-3 mx-sm-1"><div class="header-text mb-3">14-daha</div>
                    <iframe class="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d761.492581256293!2d69.2657008292012!3d40.23196202255926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDEzJzU1LjEiTiA2OcKwMTUnNTguNSJF!5e0!3m2!1sen!2s!4v1600342813631!5m2!1sen!2s" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>

    </section>

    <footer class="py-5 " style="background-color: rgba(0,0,0,0.76)">

        <div class="container">

            <div class="justify-content-around d-lg-flex">

                <div class="py-2">
                    <a href="tel: +998903911755" class="header-text-md my-auto">+998 99 396 30 20</a>
                </div>
                <div class="py-2">
                    <a href="tel: +998903911755" class="header-text-md my-auto">+998 99 395 30 20</a>
                </div>
                <div class="py-2">
                    <a href="https://t.me/compas_uz"><img src="image/telegram.svg" width="30px" alt=""></a>
                </div>
                <div class="py-2">
                    <a href="https://www.instagram.com/thecompass_lc/"><img src="image/telegram.svg" width="30px" alt=""></a>
                </div>
            </div>
        </div>
    </footer>




</main>

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>-->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--<script src="js/owl.carousel.js"></script>-->
<script src="js/main.js"></script>

</body>
</html>