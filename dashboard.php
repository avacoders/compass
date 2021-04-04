<?php

//include('process.php');
//session_start();
include('security.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="image/website.png" />
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/index2.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@300;400;500;600;700&family=Suranna&display=swap" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>


    <style>

        body{
            background: #2b5876;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #4e4376, #2b5876);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #4e4376, #2b5876); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>

</head>
<body>


<main>





    <button class="btn btn-primary" data-toggle="modal" data-target="#LogoutModal">
        Log Out
    </button>
    <button class="btn btn-primary" data-toggle="modal" data-target="#enteruserModal">
        Edit Users
    </button>
    <div class="modal fade" id="enteruserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <form action="users_enter.php" method="post">
                            <div class="card-header text-center text-secondary">
                                <h1>Login</h1>
                            </div>
                            <div class="card-body">
                                <input type="text" name="username1" class="rounded-pill form-control login w-100" placeholder="username">
                                <input type="password" name="password1" class="rounded-pill mt-3 form-control login w-100" placeholder="password">
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="enter" value="Kirish" class="btn btn-info rounded-pill">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    Modal-->
    <div class="modal fade" id="LogoutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log Out?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
<!--                <div class="modal-body"></div>-->
                <div class="modal-footer">

                    <form action="logout.php" method="post">
                        <button class="btn btn-primary" type="submit" name="logout">Logout</button>
                    </form>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <section id="course">
        <div class="header-text py-5">Bizning kurslarimiz</div>

        <?php
        if (isset($_SESSION['message'])):
            ?>

            <div class="alert    alert-<?=$_SESSION['msg_type']?>">
                <h3 class="text-center">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
                </h3>
            </div>

        <?php
        endif
        ?>

        <div class="row m-0 justify-content-center  courses">.


            <?php require_once 'process.php' ?>


            <?php


            $result = $mysqli->query("select * from fanlar") or die($mysqli->error);

            ?>

            <?php
            while ($row = $result->fetch_assoc()):
            ?>
            <div class="col-lg-3 ">
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
                        <a href="dashboard.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete </a>
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            ?>

            <div class="col-lg-3">
                <div class="card">
<!--                    --><?php //require_once 'process.php' ?>
                    <form action="process.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <div class="card-header">
                            
                            <input type="text" name="name" class="form-control rounded-pill"  value="<?php echo $name;?>" placeholder="Fan nomi"></div>
                        <div class="card-body">
                            <p>
                                <textarea name="description" class="form-control" cols="28" rows="9"><?php echo $description;?></textarea>
                            </p>
                            <div class="container-fluid">
                                <div class="row justify-content-around">
                                    <div class="col-3 main-text">
                                        Haftalik <br> <br>
                                        Dars
                                    </div>
                                    <div class="col-3 main-text">
                                        <input type="number" name="weekly" class="form-control mb-2" width="30px" value="<?php echo $weekly;?>">
                                        <input type="number" name="hours" class="form-control" value="<?php echo $hours;?>">
                                    </div>
                                    <div class="col-5">
                                        <div class="header-text-md"><input type="text" name="fee" class="form-control" value="<?php echo $fee;?>">
                                        </div>
                                        <div class="main-text">so'm/oy</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer pt-0 justify-content-around">
                            <?php
                            if ($update == true):
                            ?>
                            <button name="update_course" type="submit" class="btn btn-primary form-control rounded-pill">Update</button>
                            <button name="clear" type="submit" class="btn btn-danger  form-control rounded-pill mt-2">Clear</button>
                            <?php
                            else:
                            ?>
                            <button name="save" type="submit" class="btn btn-success form-control rounded-pill">Saqlash</button>

                            <?php
                            endif;
                            ?>
                        </div>
                    </form>
                </div>
            </div>



        </div>
        <div class="py-5"></div>
        </div>
    </section>

    <section class="gradient3" id="tutors">
        <div class="header-text-md mt-5 pt-5">tayyorlovchilarimiz</div>
        <div class="container">
            <?php
            if (isset($_SESSION['message_tutor'])):
                ?>

                <div class="alert  mt-3  alert-<?=$_SESSION['msg_type_tutor']?>">
                    <h3 class="text-center">
                        <?php
                        echo $_SESSION['message_tutor'];
                        unset($_SESSION['message_tutor']);
                        ?>
                    </h3>
                </div>

            <?php
            endif
            ?>
            <div class="row p-0 justify-content-center" >
                <?php
                require_once 'tutors.php';

                ?>

                <?php


                $result = $mysqli->query("select * from tutors") or die($mysqli->error);

                ?>

                <?php
                while ($row = $result->fetch_assoc()):
                ?>
                <div class="col-lg-4  my-5">
                    <div class="card">

                            <div class="row justify-content-center">
                                <div class="bg-success tutor-img rounded-circle overflow-hidden mt-4 ">
                                    <img src="uploads/<?php echo $row['tutor_avatar']?>" width="100%"  alt="">
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="text" name="tutor_name" class="form-control rounded-pill mb-2" placeholder="<?php echo $row['tutor_name']?>" disabled>
                                <input type="text" name="tutor_subject" class="form-control rounded-pill mb-2" placeholder="<?php echo $row['tutor_subject'] ?>" disabled>
                                <input type="text" name="tutor_telegram" class="form-control rounded-pill mb-2" placeholder="<?php echo $row['tutor_telegram'] ?>" disabled>
                                <input type="text" name="tutor_phone" class="form-control rounded-pill" placeholder="<?php echo $row['tutor_phone'] ?>" disabled>
                            </div>
                            <div class="card-footer">
                                <a href="tutors.php?delete_tutor=<?php echo $row['tutor_id'];?>" name="delete_tutor" class="btn btn-danger">Delete</a>
                                <a href="dashboard.php?edit_tutor=<?php echo $row['tutor_id'];?>" name="edit_tutor" class="btn btn-info">Edit</a>
                            </div>
                    </div>
                </div>


                <?php
                endwhile;
                ?>
                <div class="col-lg-4  my-5">
                    <div class="card">
                        <form action="tutors.php" method="post"  enctype="multipart/form-data">
                            <input type="hidden" name="tutor_id" value="<?php echo $tutor_id?>">
                            <div class="row justify-content-center">
                                    <div class="tutor-img rounded-circle overflow-hidden mt-4 ">
                                        <img src="uploads/<?php echo $tutor_avatar?>" width="100%" id="replace_tutor_img"  height="100%"  alt="">
                                        <label for="tutor_avatar"  class="tutor-label">
                                            <img src="image/photo-camera.svg" width="40px">
                                        </label>
                                    </div>
                                <input type="file" id="tutor_avatar" name="tutor_avatar" class="d-none" required>
                            </div>
                            <div class="card-body">
                                <input type="text" name="tutor_name" class="form-control rounded-pill mb-2" placeholder="O'qituvchi Nomi" value="<?php echo $tutor_name ?>" required>
                                <input type="text" name="tutor_subject" class="form-control rounded-pill mb-2" placeholder="O'qituvchi Fani" value="<?php echo $tutor_subject ?>" required>
                                <input type="text" name="tutor_telegram" class="form-control rounded-pill mb-2" placeholder="Telegram" value="<?php echo $tutor_telegram ?>" required>
                                <input type="text" name="tutor_phone" class="form-control rounded-pill" placeholder="Telefon raqam" value="<?php echo $tutor_phone ?>" required>
                            </div>
                            <div class="card-footer ">
                                <?php
                                if($update_tutor == true){
                                ?>
                                <button type="submit" class="btn btn-primary mx-auto" name="update_tutor">Update</button>
<!--                                <button type="submit" class="btn btn-danger mx-auto" name="clear_tutor">Clear</button>-->
                                    <a href="dashboard.php#tutors" class="btn btn-danger">Clear</a>
                                <?php  }
                                else{
                                ?>
                                <input type="submit" name="save_tutor" class="form-control rounded-pill btn btn-success" value="Save">
                                <?php
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container my-5 pb-5" id="students">

        <div class="row justify-content-center my-5 header-text">
            Talaba bo'lgan Abituriyentlarimiz
        </div>
        <?php require_once 'students.php' ?>

        <?php
        if (isset($_SESSION['message_student'])):
            ?>

            <div class="alert    alert-<?=$_SESSION['msg_type_student']?>">
                <h3 class="text-center">
                    <?php
                    echo $_SESSION['message_student'];
                    unset($_SESSION['message_student']);
                    ?>
                </h3>
            </div>

        <?php
        endif
        ?>
        <div class="row justify-content-center">



            <?php

            $result = $mysqli->query("select * from students") or die($mysqli->error);

            ?>

            <?php
            while ($row = $result->fetch_assoc()):
            ?>
            <div class="col-4">
                <form action="students.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <input type="text" class="form-control rounded-pill" placeholder="Talaba ismi" disabled value="<?php echo $row['student_name']?>">
                        </div>
                        <div class="row justify-content-center">
                            <div class="student-img overflow-hidden ">
                                <img src="uploads/<?php echo $row['student_avatar']?>" width="100%" height="100%" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control rounded-pill" name="fsubject" placeholder="1-Fan" disabled value="<?php echo $row['fsubject']?>">
                                </div>
                                <div class="col-4 pl-0">
                                    <input type="text" class=" form-control rounded-pill" name="fball" placeholder="Ball" disabled <?php echo $row['fball']?>>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-8">
                                    <input type="text" class="form-control rounded-pill" name="fsubject" placeholder="1-Fan" disabled value="<?php echo $row['ssubject']?>">
                                </div>
                                <div class="col-4 pl-0">
                                    <input type="text" class=" form-control rounded-pill" name="fball" placeholder="Ball" disabled <?php echo $row['sball']?>>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-8">
                                    <input type="text" class="form-control rounded-pill" name="fsubject" placeholder="1-Fan" disabled value="<?php echo $row['tsubject']?>">
                                </div>
                                <div class="col-4 pl-0">
                                    <input type="text" class=" form-control rounded-pill" name="fball" placeholder="Ball" disabled <?php echo $row['tball']?>>
                                </div>
                            </div>
                            <input type="text" class="rounded-pill form-control mt-2" placeholder="Telegram Username" name="student_telegram" disabled value="<?php echo $row['student_telegram']?>">
                            <input type="text" class="rounded-pill form-control mt-2" placeholder="Telefon raqami" name="student_phone" disabled value="<?php echo $row['student_phone']?>">
                        </div>
                        <div class="card-footer justify-content-around">
                            <a href="dashboard.php?edit_student=<?php echo $row['student_id']; ?>" class="btn btn-info">Edit</a>
                            <a href="students.php?delete_student=<?php echo $row['student_id']; ?>" class="btn btn-danger">Delete </a>
                        </div>
                    </div>
                </form>
            </div>

            <?php
            endwhile;
            ?>

            <div class="col-4">
                <form action="students.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <input type="hidden" name="student_id" value="<?php echo $student_id ?>">
                        <div class="card-header">
                            <input type="text" class="form-control rounded-pill" name="student_name" placeholder="Talaba ismi" value="<?php  echo $student_name?>">
                        </div>
                        <div class="row justify-content-center">
                            <div class="student-img overflow-hidden ">
                                <img src="uploads/<?php echo $student_avatar?>" width="100%" height="100%" id="replace_student_img" alt="">
                                <label for="student_img"  class="student-label">
                                    <img src="image/photo-camera.svg" width="50%">
                                </label>
                            </div>
                            <input type="file" id="student_img" name="student_img" class="d-none" required>
                        </div>
                        <div class="text-center">3x4</div>

                        <div class="card-body">
                            <div class="row ">
                                <div class="col-8">
                                    <input type="text" class="form-control rounded-pill" name="fsubject" placeholder="1-Fan" value="<?php  echo $fsubject ?>">
                                </div>
                                <div class="col-4 pl-0">
                                    <input type="text" class=" form-control rounded-pill" name="fball" placeholder="Ball" value="<?php  echo $fball  ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-8">
                                    <input type="text" class="form-control rounded-pill" name="ssubject" placeholder="1-Fan" value="<?php  echo $ssubject ?>">
                                </div>
                                <div class="col-4 pl-0">
                                    <input type="text" class=" form-control rounded-pill" name="sball" placeholder="Ball" value="<?php  echo $sball  ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-8">
                                    <input type="text" class="form-control rounded-pill" name="tsubject" placeholder="1-Fan" value="<?php  echo $tsubject ?>">
                                </div>
                                <div class="col-4 pl-0">
                                    <input type="text" class=" form-control rounded-pill" name="tball" placeholder="Ball" value="<?php  echo $tball  ?>">
                                </div>
                            </div>
                            <input type="text" class="rounded-pill form-control mt-2" placeholder="Telegram Username" name="student_telegram" value="<?php  echo $student_telegram  ?>">
                            <input type="text" class="rounded-pill form-control mt-2" placeholder="Telefon raqami" name="student_phone" value="<?php  echo $student_phone  ?>">
                        </div>
                        <div class="card-footer">
                            <?php
                            if ($update_student == true):
                                ?>
                                <button name="update_student" type="submit" class="btn btn-primary">Update</button>
                                <a href="dashboard.php#students" class="btn btn-danger">Clear</a>
                            <?php
                            else:
                                ?>
                                <button name="save_student" type="submit" class="btn btn-success form-control rounded-pill">Saqlash</button>

                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

</body>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<script>
    $(document).ready(function (){


        var tutor_avatar = $('#tutor_avatar');
        input = tutor_avatar;
        var replace = $('#replace_tutor_img');
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#replace_tutor_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(input).change(function() {
            readURL(this);
        });
    });


    input1 = $('#student_img');
    var replace = $('#replace_student_img');
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#replace_student_img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $(input1).change(function() {
        readURL1(this);
    });

</script>


</html>