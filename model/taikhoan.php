<?php
//dang ky
function insert_taikhoan($email, $user, $pass)
{
    $sql = "INSERT INTO taikhoan( email, user, pass) VALUES ( '$email', '$user','$pass'); ";
    pdo_execute($sql);
}

function dangnhap($user, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE user='$user' and pass='$pass'";
    $taikhoan = pdo_query_one($sql);

    if ($taikhoan != false) {
        $_SESSION['user'] = $taikhoan;
        $thongbao = "Đăng nhập thành công";
        return $thongbao;
    } else {
        $thongbao = "Đăng nhập thật bại, thông tin tài khoản sai";
        return $thongbao;
    }
}
function loadsall_taikhoan()
{
    $sql = "SELECT * FROM taikhoan where 1";
    $listkhachhang = pdo_query($sql);
    return $listkhachhang;
}
function update_taikhoan($iduser, $image,  $pass, $email, $address, $tel)
{
    if ($image != "") {
        $sql = "UPDATE taikhoan SET url_image='$image',pass='$pass',email='$email',address='$address',tel='$tel' where iduser =" . $iduser;
        $taikhoan = pdo_execute($sql);
    } else {
        $sql = "UPDATE taikhoan SET pass='$pass',email='$email',address='$address',tel='$tel' where iduser =" . $iduser;
        $taikhoan = pdo_execute($sql);
    }

    return $taikhoan;
}

function dangxuat()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
      
    }
}

function sendMail($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);

    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);

        return "gui email thanh cong";
    } else {
        return "Email bạn nhập ko có trong hệ thống";
    }
}

function sendMailPass($email, $username, $pass)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dfa634e14255e6';                     //SMTP username
        $mail->Password   = '31a3d9dc19df55';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duanmau@example.com', 'DuAnMau');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body    = 'Mau khau cua ban la' . $pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
