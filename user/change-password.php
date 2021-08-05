<?php
session_start();
$user = $_SESSION['user'];
$userid = $user["customer_id"];
$userpassword = $user["password"];
$conn = mysqli_connect("localhost", "root", "", "db2008a0") or die("Connection Error: " . mysqli_error($conn));
if (count($_POST) > 0) {
    $uppercase = preg_match('@[A-Z]@', $_POST["newPassword"]);
    if (strlen($_POST["newPassword"]) < 5 || !$uppercase) {
        $message = "<h6 style='font-weight: 700; font-size: 1rem;'>Mật khẩu phải có độ dài ít nhất 5 ký tự và phải bao gồm ít nhất một chữ cái viết hoa !!!</h6>";
    } else if ($_POST["currentPassword"] == $userpassword) {
        mysqli_query($conn, "UPDATE tbcustomer set `password`='" . $_POST["newPassword"] . "' WHERE customer_id='" . $userid . "'");
        header("location:login.php");
        exit();
    } else
        $message = "Current Password is not correct";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validatePassword() {
            var currentPassword, newPassword, confirmPassword, output = true;

            currentPassword = document.getElementById("currentPassword").value;
            newPassword = document.getElementById("newPassword").value;
            confirmPassword = document.getElementById("confirmPassword").value;


            if (!currentPassword) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = "required";
                output = false;
            } else if (!newPassword) {
                newPassword.focus();
                document.getElementById("newPassword").innerHTML = "required";
                output = false;
            } else if (!confirmPassword) {
                confirmPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "required";
                output = false;
            }
            if (newPassword != confirmPassword) {
                document.getElementById("newPassword").focus();
                alert("Pass Mới Không Giống Nhau");
                document.getElementById("confirmPassword").innerHTML = "not same";
                output = false;
            }
            return output;
        }
    </script>



</head>

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
        padding: 10px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .container {
        max-width: 350px;
        width: 100%;
        background: #fff;
        padding: 25px 30px;
        border-radius: 5px;

    }

    .container .user-details {
        font-size: 1em;
    }

    .container .title {
        font-size: 25px;
        font-weight: 500;
        position: relative;
    }

    .container .title::before {
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
        width: calc(100% / 2- 20px);
    }

    .user-details .input-box .user-details {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .user-details .input-box input {
        height: 45px;
        width: 100%;
        outline: none;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 16px;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box input:focus .user-details .input-box input:valid {
        border-color: #9b59b6;
    }

    form input[style="radio"] {
        display: none;
    }

    form .button {
        height: 45px;
        margin: 45px 0;
    }

    form .button input {
        height: 100%;
        width: 100%;
        outline: none;
        color: #fff;
        border: none;
        font-size: 18px;
        font-weight: 500;
        border-radius: 5px;
        letter-spacing: 1px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }
</style>

<body>

    <div class="container">
        <div class="title">Change Your Password</div><br>
        <div class="user-details"><?php if (isset($message)) {
                                        echo $message;
                                    } ?> 
            <form action="" method="POST" onSubmit="return validatePassword()">
                <div class="user-details">
                    <div class="input-box"><span class="details">Mật Khẩu Cũ
                            <input type="password" name="currentPassword" id="currentPassword" required>
                        </span> </div>

                </div>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Mật Khẩu Mới
                            <input type="password" name="newPassword" id="newPassword" required>
                        </span>
                    </div>
                </div>

                <div class="user-detalis">
                    <div class="input-box">
                        <span class="details">Nhập Lại Mật Khẩu Mới
                            <input type="password" name="confirmPassword" id="confirmPassword" required>
                        </span>
                    </div>
                </div>


                <div class="button"> <input type="submit" name="submit" id="submit"></div>
        </div>
        </form>
    </div>
</body>

</html>