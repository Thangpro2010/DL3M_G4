<?php
session_start();
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
        padding: 16px;
        background-size: cover;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.5)), url("images/background-profile.jpg");
    }

    .container {
        max-width: 700px;
        width: 100%;
        background: #fff;
        padding: 25px 30px;
        border-radius: 7px;
    }

    .container .title {
        font-size: 25px;
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
<body>
    <div class="container">
        <div class="title">Your Profile</div>
        <form action="" method="POST">
            <?php
            $db = mysqli_connect('localhost', 'root', '') or
                die('Unable to connect. Check your connection parameters.');
            mysqli_select_db($db, 'db2008a0') or die(mysqli_error($db));
            $user = $_SESSION['user'];
            $userid = $user["customer_id"];
            $query = mysqli_query($db, "SELECT * FROM tbcustomer where customer_id='$userid'") or die(mysqli_error($db));
            $row = mysqli_fetch_array($query);
            ?>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Họ Tên
                        <input type="text" name="name" id="" value="<?php echo $row['name']; ?>" placeholder="enter your name" required>
                    </span>
                </div>
                <div class="input-box">
                    <span class="details">Email
                        <input type="email" name="email" id="" class="form-control" value="<?php echo $row['email']; ?>" placeholder="enter your email" required>
                    </span>
                </div>
                <div class="input-box">
                    <span class="details">Số Điện Thoại
                        <input type="text" name="phone" id="" value="<?php echo $row['phone']; ?>" placeholder="enter your phone" required>
                    </span>
                </div>
                <div class="input-box">
                    <span class="details">Ngày Sinh
                        <input type="date" name="dob" id="" value="<?php echo $row['dob']; ?>" required>
                    </span>
                </div>
                <div class="gender-details">
                    <span class="gender-title">Giới Tính</span>
                    <div class="category">
                        <label for="dot-1">
                            <input type="radio" name="gender" id="dot-1" value="1" <?php echo ($row["gender"] ? "checked" : '') ?>>
                            <span class="gender">Nam</span>
                        </label>
                        <label for="dot-2">
                            <input type="radio" name="gender" id="dot-2" value="0" <?php echo ($row["gender"] == 0 ? "checked" : '') ?>>
                            <span class="gender">Nữ</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="button">
                <button type="submit" name="update" class="btn btn-danger">Update Profile</button>
                <a class="btn btn-info" href="change-password.php">Change Password </a>
            </div>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['update'])) {
    $user = $_SESSION["user"];
    $userid = $user["customer_id"];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $sql = "UPDATE `tbcustomer` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `dob` = '$dob',
        `gender` = '$gender'
    WHERE `tbcustomer`.`customer_id` = '$userid'";
    $result = mysqli_query($db, $sql);

?>
    <script type="text/javascript">
        alert("Đã Cập Nhật Thông Tin Thành Công.");
        window.location = "login.php";
    </script>
<?php
}
?>