<?php


include('security.php');


include ("database.php");


$student_id = 0;
$student_avatar ='profile-user.svg';
$update_tutor = false;
$student_name = "";
$fsubject = "";
$ssubject = "";
$tsubject = "";
$fball = "";
$sball = "";
$tball = "";
$student_telegram = "";
$student_phone = "";
$update_student = false;


if(isset($_POST['save_student'])){
    $student_name = $_POST['student_name'];
    $student_telegram = $_POST['student_telegram'];
    $student_phone = $_POST['student_phone'];
    $fsubject = $_POST['fsubject'];
    $ssubject = $_POST['ssubject'];
    $tsubject = $_POST['tsubject'];
    $fball = $_POST['fball'];
    $sball = $_POST['sball'];
    $tball = $_POST['tball'];
    $_SESSION['message_student'] = "Record has been saved!";
    $_SESSION['msg_type_student'] = "success";
    $file = "student_img";

    function resizeImage($resourceType, $image_width,$image_height)
    {
        $resizeWidth = 200;
        $resizeHeight = 200;
        $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
        imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeHeight, $resizeWidth, $image_width, $image_height);
        return $imageLayer;
    }
    if(is_array($_FILES)) {
        $fileName = $_FILES[$file]['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $_FILES[$file]['name'];
        $uploadPath = "./uploads/";
        $fileExt = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $resizeFileName);
                break;
        }
        $file = $resizeFileName;
    }
    $student_avatar = $file;

    $mysqli->query("insert into students (student_name,fsubject,ssubject,tsubject,fball,sball,tball,student_telegram,student_phone,student_avatar) 
    values ('$student_name','$fsubject', '$ssubject','$tsubject','$fball','$sball','$tball','$student_telegram','$student_phone', '$student_avatar')") or
    die($mysqli->error);
    header('location: dashboard.php#students');
}


if (isset($_GET['edit_student']))
{
    $student_id = $_GET['edit_student'];

    $result = $mysqli->query("select * from students where student_id=$student_id") or die($mysqli->error);
    $update_university = true;
    $row = $result->fetch_assoc();
    $student_name = $row['student_name'];
    $student_telegram = $row['student_telegram'];
    $student_phone = $row['student_phone'];
    $student_avatar = $row['student_avatar'];
    $fsubject = $row['fsubject'];
    $ssubject = $row['ssubject'];
    $tsubject = $row['tsubject'];
    $fball = $row['fball'];
    $sball = $row['sball'];
    $tball = $row['tball'];
    $update_student = true;

}

if (isset($_POST['update_student']))
{
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_telegram = $_POST['student_telegram'];
    $student_phone = $_POST['student_phone'];
    $fsubject = $_POST['fsubject'];
    $ssubject = $_POST['ssubject'];
    $tsubject = $_POST['tsubject'];
    $fball = $_POST['fball'];
    $sball = $_POST['sball'];
    $tball = $_POST['tball'];
    $_SESSION['message_student'] = "record has been updated!";
    $_SESSION['msg_type_student'] = "warning";

    $file = "student_img";

    function resizeImage($resourceType, $image_width,$image_height)
    {
        $resizeWidth = 200;
        $resizeHeight = 200;
        $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
        imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeHeight, $resizeWidth, $image_width, $image_height);
        return $imageLayer;
    }
    if(is_array($_FILES)) {
        $fileName = $_FILES[$file]['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $_FILES[$file]['name'];
        $uploadPath = "./uploads/";
        $fileExt = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $resizeFileName);
                break;
        }
        $file = $resizeFileName;
    }
    $student_avatar = $file;
    $mysqli->query("update students set student_name='$student_name',  fsubject='$fsubject',  ssubject='$ssubject',  tsubject='$tsubject', 
 fball='$fball',  sball='$sball', tball='$tball', student_phone='student_phone', student_telegram = '$student_telegram',  student_avatar='$student_avatar' where student_id=$student_id") or
    die($mysqli->error);
    header('location: dashboard.php#students');
}


if (isset($_GET['delete_student']))   {
    $student_id = $_GET['delete_student'];

    $query = $mysqli->query("SELECT * FROM students where student_id=$student_id") or die($mysqli->error);
    $after = mysqli_fetch_assoc($query);
    unlink("./uploads/".$after['student_avatar']);
    $mysqli->query("delete from students where student_id=$student_id") or die($mysqli->error);
    $_SESSION['message_student'] = "Record has been deleted!";
    $_SESSION['msg_type_student'] = "danger";

    header('location: dashboard.php#students');
}




?>