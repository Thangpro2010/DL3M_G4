<?php
$message = "";
$databaseHost = 'localhost'; //or localhost
$databaseName = 'db2008a0'; // your db_name
$databaseUsername = 'root'; // root by default for localhost 
$databasePassword = '';  // by defualt empty for localhost

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (isset($_POST['btOK'])) {
    $customer_id = $_POST['id'];
    $sql = "select * from tbcustomer where (customer_id='$customer_id');";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        // $row = mysqli_fetch_assoc($res);
        // ($customer_id == isset($row['customer_id'])) {
        $message = "<h4>Tên Tài Khoản Đã Tồn Tại !!!</h4><br>";
    } else {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        // $res = mysqli_query($mysqli, $sql);
        $uppercase = preg_match('@[A-Z]@', $pass);
        if (strlen($pass) < 5 || !$uppercase) {
            $message = "<h4>Mật khẩu phải có độ dài ít nhất 5 ký tự và phải bao gồm ít nhất một chữ cái viết hoa !!!</h4><br>";
        } else {
            $result = mysqli_query($mysqli, "insert into tbcustomer values('$customer_id','$name','$gender','$email','$dob','$phone','$pass')");
            header("location:login.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            padding: 16px;
            background-size: cover;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.5)), url("images/background-signup.jpg");
        }

        .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            border-radius: 7px;
        }

        .container .title {
            font-size: 1.2rem;
            font-weight: 500;
            position: relative;
        }

        .container .title:before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            background: skyblue;
        }

        .container form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        .user-details .input-box .details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            font-size: 0.8rem;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 0.8rem;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .gender-details .gender-title {
            font-size: 0.8rem;
            font-weight: 500px;
        }

        form .gender-details .category {
            width: 80%;
            display: flex;
            margin: 14px 0;
            justify-content: space-between;
        }

        .gender-details .category label {
            display: flex;
            align-items: center;
            margin-right: 1rem;
        }

        form .button {
            height: 45px;
            margin: 45px 0;
        }

        form .button input {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            font-weight: 500;
            letter-spacing: 1px;
            background: #2691d9;
            color: #e9f4fb;
            border-radius: 25px;
            font-size: 1.2rem;
        }

        form .button input:hover {
            transition: .5s;
            background: steelblue;
        }

        @media (max-width: 584) {
            .container {
                max-width: 700px;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .gender-details .category {
                width: 100%;
            }

            .container form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 0;
            }
        }

        .category label span {
            font-size: 0.8rem;
            margin-left: 4px;
        }

        .signup_link {
            margin: 2px 0;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="title"><b>Đăng Ký Tài Khoản</b></div>
        <div class="message"><?php if (isset($message)) {
                                    echo $message;
                                } ?></div>
        <form action="#" method="POST">

            <div class="user-details">
                <div class="input-box">
                    <span class="details">Tài Khoản
                        <input type="text" name="id" id="" required>
                    </span>
                </div>
                <div class="input-box">
                    <span class="details">Họ Tên
                        <input type="text" name="name" id="" required>
                    </span>
                </div>


                <div class="input-box">
                    <span class="details">Email
                        <input type="email" name="email" id="" class="form-control" value="" required="required" title="" placeholder="" required>
                    </span>
                </div>

                <div class="input-box">
                    <span class="details">Ngày Sinh
                        <input type="date" name="dob" id="" required>
                    </span>
                </div>

                <div class="input-box">
                    <span class="details">Số Điện Thoại
                        <input type="text" name="phone" id="" required>
                    </span>
                </div>
                <div class="input-box">
                    <span class="details">Mật Khẩu
                        <input type="password" name="pass" id="" required>
                    </span>
                </div>
                <div class="gender-details">
                    <span class="gender-title">Giới Tính</span>
                    <div class="category">
                        <label for="dot-1">
                            <input type="radio" name="gender" id="gender" value="1" checked require>
                            <span class="gender">Nam</span>
                        </label>
                        <label for="dot-2">
                            <input type="radio" name="gender" id="gender" value="0" require>
                            <span class="gender">Nữ</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Đăng Ký" name="btOK">
            </div>
            <div class="signup_link">
                Bạn Đã Có Tài Khoản ? <a href="login.php">Đăng Nhập</a>
            </div>
        </form>
    </div>
</body>
</html>