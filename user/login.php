<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!--css login-->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            overflow: hidden;
            background-size: cover;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.5)), url("images/background-login.jpg");
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: white;
            border-radius: 10px;
        }

        .center h3 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
            font-size: 1.4rem
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        form .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .txt_field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 0.8rem;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 0.8rem;
            pointer-events: none;
            transition: .5s;
        }

        .txt_field span::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }

        .txt_field input:focus~label,
        .txt_field input:valid~label {
            top: -5px;
            color: #2691d9;
        }

        .txt_field input:focus~span::before,
        .txt_field input:valid~span::before {
            width: 100%;
        }

        input[type="submit"] {
            width: 100%;
            height: 48px;
            border: 1px solid;
            border-radius: 25px;
            font-size: 0.8rem;
            background: #2691d9;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        input[type="submit"]:hover {
            background: steelblue;
            transition: .5s;
        }

        .signup_link {
            margin: 30px 0;
            text-align: center;
            font-size: 0.8rem;
            color: #666666;
        }

        .signup_link a {
            color: #2691d9;
            text-decoration: none;
        }

        .signup_link a:hover {
            text-decoration: underline;
        }

        .remember-me {
            font-size: 0.8rem;
            padding: 0.3rem;
        }
    </style>
</head>
<body>
    <div class="center">
        <?php
        include_once "../admin/DAO.php";
        $message = "";
        if (isset($_POST["submit"])) {
            //da click button submit
            $uid = $_POST["user"];
            $pwd = $_POST["pass"];
            $user = getUserId($uid);
            if ($user == null) {
                echo "<h4 class'error-ms' style=' text-align: center; font-weight: 700; color: red;'>Tài Khoản Không Tồn Tại !!!</h4>";
            } else {
                if ($pwd != $user["password"]) {
                    echo "<h4 class'error-ms' style=' text-align: center; font-weight: 700; color: red;'>Mật Khẩu Không Chính Xác !!!</h4>";
                } else {
                    //dang nhap thanh cong
                    //xet dieu kien cua user va admin 
                    session_start();
                    $_SESSION["user"] = $user;
                    if ($user["role"] == 1) {
                        header("location:signup.php");
                    } else {
                        header("location:index-user.php");
                    }
                    exit();
                }
            }
        }
        ?>
        <h3>Đăng Nhập</h3>
        <form name="frmUser" method="POST">
            <div class="message"><?php if ($message != "") {
                                        echo $message;
                                    } ?></div>
            <div class="txt_field">
                <input type="text" name="user" id="user" required value="<?php ?>">
                <span></span>
                <label>Tài Khoản</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pass" id="pass" required>
                <span></span>
                <label>Mật Khẩu</label>
            </div>
            <label class="remember-me">Remember Me ?</label>
            <input type="checkbox" name="remember" id="remember"><br><br>
            <input type="submit" name="submit" value="Đăng Nhập">
            <div class="signup_link">
                Bạn Chưa Có Tài Khoản ? <a href="signup.php">Đăng Ký</a>
            </div>
        </form>
    </div>
</body>
</html>