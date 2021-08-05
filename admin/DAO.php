<?php
include_once "myLib.php";

// ---------------------------------------------- ADMIN ----------------------------------------------
class admin
{
    public $admin_id, $username, $password, $fullname;
    //ham dung
    public function __construct($admin_id, $username, $password, $fullname)
    {
        $this->admin_id = $admin_id;
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
    }
    // xem danh sach admin
    public static function getListAdmin()
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        //doc het du lieu trong bang [tbbook] -> $result
        $sql = "select * from tbadmin";
        $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
        if ($result == false) {
            die("<h3>Data Not Found !<h3>");
        }
        //khai bao mang a[] chua cac dong du lieu trong result 
        $a = array();
        while ($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
        // while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //     $a[] = $sv;
        // }
        $cn->close();   // disconnectDB($cn);
        return $a;
    }

    //ham them 1 admin moi vo bang [tbadmin]
    public static function createAdmin(admin $createAdmin)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "INSERT INTO `tbadmin` (`admin_id`, `username`, `password`, `fullname`) 
         VALUES ('$createAdmin->admin_id', '$createAdmin->username', '$createAdmin->password', '$createAdmin->fullname')";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }

    //ham xoa admin theo ma so id
    public static function deleteAdmin($deleteAdmin)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        //xoa sach trong bang [tbbook] theo ma so 
        $sql = "DELETE FROM `tbadmin` WHERE `tbadmin`.`admin_id` = '$deleteAdmin'";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }

    //ham thay doi thong tin admin sach theo ma so
    public static function editAdmin($id, admin $editAdmin)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "UPDATE `tbadmin` SET `admin_id` = '$editAdmin->admin_id', `username` = '$editAdmin->username', `password` = '$editAdmin->password', `fullname` = '$editAdmin->fullname' WHERE `tbadmin`.`admin_id` = '$id' ";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }

    // ham tim ten admin 
    public static function getListAdminName($name)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        //doc het du lieu trong bang [tbbook] -> $result
        $sql = "SELECT * FROM `tbadmin` WHERE `fullname` Like '%$name%'";
        $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
        if ($result == false) {
            die("<h3>Data Not Found !<h3>");
        }
        //khai bao mang a[] chua cac dong du lieu trong result 
        $a = array();
        while ($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
        // while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //     $a[] = $sv;
        // }
        $cn->close();   // disconnectDB($cn);
        return $a;
    }
}

// lay danh sach theo idAdmin
function getListAdminById($idAdmin)
{
    $cn = connectDB(); // ket noi bang db2008a0
    $sql = "SELECT * FROM `tbadmin` WHERE `admin_id` Like '$idAdmin'";
    $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>invalid account !<h3>");
    }
    //khai bao mang a[] chua cac dong du lieu trong result 
    $a = array();
    while ($row = $result->fetch_assoc()) {
        $a = $row;
    }
    $cn->close();   // disconnectDB($cn);
    return $a;
}

// ---------------------------------------------- TOUR ----------------------------------------------

class tour
{
    public $tour_id, $name, $price, $days, $content, $image, $nos, $region;
    public function __construct($tour_id, $name, $price, $days, $content, $image, $nos, $region)
    {
        $this->tour_id = $tour_id;
        $this->name = $name;
        $this->price = $price;
        $this->days = $days;
        $this->content = $content;
        $this->image = $image;
        $this->nos = $nos;
        $this->region = $region;
    }

    // xem danh sach tour view admin
    public static function getListTourAdmin()
    {
        $cn = connectDB();
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
        } else {
            $pages = 1;
        }
        $row = 4;  // so bang ghi tren trang 
        $from = ($pages - 1) * $row; // vi tri bat dau lay ra tu bang ghi

        $sql = "SELECT * FROM tbtour ORDER BY tour_id DESC LIMIT $from,$row";
        $result = $cn->query($sql);
        if ($result == false) {
            die("<h3>Data Not Found !<h3>");
        }
        $a = array();
        while ($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
        $cn->close();   // disconnectDB($cn);
        return $a;
    }

    // xem danh sach tour view user
    // public static function getListTour_User($region='%')
    public static function getListTourUser()
    {

        $cn = connectDB();
        /*
        if(isset($_GET['pages'])){
           $pages = $_GET['pages'];
        } else {
           $pages = 1;
        }
        $row = 4;  // so bang ghi tren trang 
        $from = ($pages - 1) * $row; // vi tri bat dau lay ra tu bang ghi
        */
        // $sql = "SELECT * FROM tbtour WHERE region like '$region' ORDER BY tour_id DESC LIMIT $from,$row";
        // $sql = "SELECT * FROM tbtour ORDER BY tour_id DESC LIMIT $from,$row";
        $sql = "SELECT * FROM tbtour ORDER BY tour_id";
        $result = $cn->query($sql);
        if ($result == false) {
            die("<h3>Data Not Found !<h3>");
        }
        $a = array();
        while ($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
        $cn->close();   // disconnectDB($cn);
        return $a;
    }

    // public static function getRegion()
    // {
    //     $cn = connectDB();
    //     $sql = "SELECT DISTINCT region FROM tbtour";
    //     $result = $cn->query($sql);
    //     $a = array();
    //     while ($row = $result->fetch_assoc()) {
    //         $a[] = $row;
    //     }
    //     $cn->close();   // disconnectDB($cn);
    //     return $a;
    // }

    //ham them 1 tour moi vo bang [tbadmin]
    public static function createTour(tour $createTour)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "INSERT INTO `tbtour` (`tour_id`, `name`, `price`, `days`, `content`, `image`, `nos`, `region`) 
         VALUES ('$createTour->tour_id', '$createTour->name', '$createTour->price', '$createTour->days', '$createTour->content', '$createTour->image', '$createTour->nos', '$createTour->region')";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }

    //ham xoa tour theo ma so id
    public static function deleteTour($deleteTour)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        //xoa sach trong bang [tbbook] theo ma so 
        $sql = "DELETE FROM `tbtour` WHERE `tbtour`.`tour_id` = '$deleteTour'";
        $result = $cn->query($sql);

        $cn->close();
        return $result;
    }
}

// ham thay doi tour
function editTour($tour_id, $name, $price, $days, $content, $image, $nos, $region)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    $sql = "UPDATE `tbtour` SET `tour_id` = '$tour_id', `name` = '$name', `price` = '$price', `days` = '$days', `content` = '$content', `image` = '$image', `nos` = '$nos', `region` = '$region' WHERE `tbtour`.`tour_id` = '$tour_id'";
    $result = $cn->query($sql);
    $cn->close();
    return $result;
}

// ham thay doi nos
// function editTourNOS($tour_id, $nos)
// {
//     $cn = connectDB();  //ket noi voi DB [db2008A0]
//     $sql = "UPDATE `tbtour` SET `nos` = '$nos' WHERE `tbtour`.`tour_id` = '$tour_id'";
//     $result = $cn->query($sql);
//     $cn->close();
//     return $result;
// }

// lay danh sach theo idTour
function getListTourById($id)
{
    $cn = connectDB(); // ket noi bang db2008a0
    $sql = "SELECT * FROM `tbtour` WHERE `tour_id` Like '$id'";
    $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>invalid account !<h3>");
    }
    //khai bao mang a[] chua cac dong du lieu trong result 
    $a = array();
    while ($row = $result->fetch_assoc()) {
        $a = $row;
    }
    $cn->close();   // disconnectDB($cn);
    return $a;
}

// ham dem tour
function countTour()
{
    $cn = connectDB();
    $sql = "SELECT * FROM tbtour";
    $query = mysqli_query($cn, $sql);
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    $count = count($result);
    return $count;
}

// ---------------------------------------------- EVENT ----------------------------------------------

class event
{
    public $event_id, $topic, $image,  $content, $details, $date;
    public function __construct($event_id, $topic, $image, $content, $details,  $date)
    {
        $this->event_id = $event_id;
        $this->topic = $topic;
        $this->image = $image;
        $this->content = $content;
        $this->details = $details;
        $this->date = $date;
    }
    public static function getListEvent()
    {
        $cn = connectDB();
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
        } else {
            $pages = 1;
        }
        $row = 4;  // so bang ghi tren trang 
        $from = ($pages - 1) * $row; // vi tri bat dau lay ra tu bang ghi
        $sql = "SELECT * FROM events ORDER BY event_id DESC LIMIT $from, $row";
        $result = mysqli_query($cn, $sql);

        if ($result == false) {
            die("<h3>Not Found !<h3>");
        }
        //khai bao mang a[] chua cac dong du lieu trong result 
        $a = array();
        while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $a[] = $sv;
        }
        disconnectDB($cn);
        return $a;
    }

    // ham tao su kien
    public static function createEvent(event $createEvent)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "INSERT INTO `events` (`event_id`, `topic`, `image`, `content`, `details`, `date`) 
         VALUES ('$createEvent->event_id', '$createEvent->topic', '$createEvent->image', '$createEvent->content', '$createEvent->details', '$createEvent->date')";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }

    // ham xoa su kien
    public static function deleteEvent($deleteEvent)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]

        //xoa sach trong bang [tbbook] theo ma so 
        $sql = "DELETE FROM `events` WHERE `events`.`event_id` = '$deleteEvent'";
        $result = $cn->query($sql);

        $cn->close();
        return $result;
    }
}

// ham thay doi su kien
function editEvent($event_id, $topic, $image, $content, $details, $date)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    $sql = "UPDATE `events` SET `event_id` = '$event_id', `topic` = '$topic', `image` = '$image', `content` = '$content', `details` = '$details', `date` = '$date' WHERE `events`.`event_id` = '$event_id'";
    $result = $cn->query($sql);
    $cn->close();
    return $result;
}

// lay danh sach theo idTour
function getListEventByID($id)
{
    $cn = connectDB(); // ket noi bang db2008a0
    $sql = "SELECT * FROM `events` WHERE `event_id` Like '$id'";
    $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>invalid account !<h3>");
    }
    //khai bao mang a[] chua cac dong du lieu trong result 
    $a = array();
    while ($row = $result->fetch_assoc()) {
        $a = $row;
    }
    $cn->close();   // disconnectDB($cn);
    return $a;
}

// ham dem su kien
function countEvent()
{
    $cn = connectDB();
    $sql = "SELECT * FROM events";
    $query = mysqli_query($cn, $sql);
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    $count = count($result);
    return $count;
}


// ---------------------------------------------- USER ----------------------------------------------

class user
{
    public $customer_id, $name, $gender, $email, $dob, $phone, $password;
    //ham dung
    public function __construct($customer_id, $name, $gender, $email, $dob, $phone, $password)
    {
        $this->customer_id = $customer_id;
        $this->name = $name;
        $this->gender = $gender;
        $this->email = $email;
        $this->dob = $dob;
        $this->phone = $phone;
        $this->password = $password;
    }
    //ham lay thong tin trong bang [tbcustomer]
    public static function getListUser()
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        //doc het du lieu trong bang [tbbook] -> $result
        $sql = "SELECT * FROM tbcustomer";
        $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
        if ($result == false) {
            die("<h3>Data Not Found !<h3>");
        }
        //khai bao mang a[] chua cac dong du lieu trong result 
        $a = array();
        while ($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
        // while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //     $a[] = $sv;
        // }
        $cn->close();   // disconnectDB($cn);
        return $a;
    }

    //ham them 1 user moi vo bang [tbuser]
    public static function createUser(user $createUser)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "INSERT INTO `tbcustomer` (`customer_id`, `name`, `gender`, `email` , `dob` , `phone` , `password`) 
         VALUES ('$createUser->customer_id', '$createUser->name', '$createUser->gender', '$createUser->email' , '$createUser->dob' , '$createUser->phone' , '$createUser->password')";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }

    public static function deleteUser($id)
    {

        $cn = connectDB();  //ket noi voi DB [db2008A0]

        //xoa sinh vien trong bang [tbStudent] theo ma so 
        $sql = "DELETE FROM `tbcustomer` WHERE `tbcustomer`.`customer_id` = '$id'";
        $result = mysqli_query($cn, $sql);

        disconnectDB($cn);
        return $result;
    }
}


//ham lay thong tin user trong bang [tbcustomer] dua vao tk dang nhap
function getUserId($uid)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    //lay du lieu trong bang [tbuser] co ma so id -> $result
    $sql = "SELECT * FROM tbcustomer WHERE `customer_id` LIKE '$uid'";
    $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>Not Found !<h3>");
    }
    //khai bao bien a chua 1 dong du lieu trong result 
    $a = array();

    while ($user = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $a = $user;
    }
    disconnectDB($cn);
    return $a;
}




// ---------------------------------------------- BOOKING ----------------------------------------------

class booking
{
    public $booking_id, $persons, $children, $date, $amount, $payment_term, $status, $note, $schedule_id, $customer_id;
    //ham dung
    public function __construct($booking_id, $persons, $children, $date, $amount, $payment_term, $status, $note, $schedule_id, $customer_id)
    {
        $this->booking_id = $booking_id;
        $this->persons = $persons;
        $this->children = $children;
        $this->date = $date;
        $this->amount = $amount;
        $this->payment_term = $payment_term;
        $this->status = $status;
        $this->note = $note;
        $this->schedule_id = $schedule_id;
        $this->customer_id = $customer_id;
    }

    // ham lay danh sach booking
    public static function getListBooking()
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        //doc het du lieu trong bang [tbbook] -> $result
        $sql = "SELECT * FROM tbbooking";
        $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
        if ($result == false) {
            die("<h3>Data Not Found !<h3>");
        }
        //khai bao mang a[] chua cac dong du lieu trong result 
        $a = array();
        while ($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
        // while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //     $a[] = $sv;
        // }
        $cn->close();   // disconnectDB($cn);
        return $a;
    }

    // ham tao booking
    public static function createBooking(booking $createBooking)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "INSERT INTO `tbbooking`(`booking_id`, `persons`, `children`, `date`, `amount`, `payment_term`, `status`, `note`, `schedule_id`, `customer_id`) VALUES 
        ('$createBooking->booking_id','$createBooking->persons','$createBooking->children',
        
        STR_TO_DATE('$createBooking->date','%d-%m-%y') ,
        
        '$createBooking->amount','$createBooking->payment_term','$createBooking->status','$createBooking->note','$createBooking->schedule_id','$createBooking->customer_id')";
        // var_dump($sql);
        // exit();
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }
    // ham lay booking 
    public static function getBookingId()
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "SELECT booking_id FROM `tbbooking` ORDER BY id DESC LIMIT 1";
        $result = $cn->query($sql);
        $bk = "BK";
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                $n = substr($row['booking_id'], 2);
                $n1 = intval($n) + 1;
                $bk = $bk . $n1;
            } else {
                $bk = $bk . "1";
            }
        }
        $cn->close();
        // var_dump($bk);
        // exit();
        return $bk;
    }
    public static function deleteBooking($deleteBooking)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]

        //xoa sach trong bang [tbbook] theo ma so 
        $sql = "DELETE FROM `tbbooking` WHERE `tbbooking`.`booking_id` = '$deleteBooking'";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }
}



// update booking on status
function editBookingStatus($id, $status)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    $sql = "UPDATE `tbbooking` SET `status` = '$status' WHERE `tbbooking`.`booking_id` = '$id'";
    $result = $cn->query($sql);
    $cn->close();
    return $result;
}

// ham lay danh sach theo id 
function getListBookingId($id)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    //lay du lieu trong bang [tbuser] co ma so id -> $result
    $sql = "SELECT * FROM tbbooking WHERE `booking_id` LIKE '$id'";
    $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>Not Found !<h3>");
    }
    //khai bao bien a chua 1 dong du lieu trong result 
    $a = array();

    while ($user = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $a = $user;
    }
    disconnectDB($cn);
    return $a;
}

function SumPayMent()
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    //doc het du lieu trong bang [tbbook] -> $result
    $sql = "SELECT * FROM `tbbooking` WHERE status='Đã Duyệt'";
    $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>Data Not Found !<h3>");
    }
    //khai bao mang a[] chua cac dong du lieu trong result 
    $a = array();
    while ($row = $result->fetch_assoc()) {
        $a[] = $row;
    }
    // while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    //     $a[] = $sv;
    // }
    // var_dump($a);
    // exit();
    $cn->close();
    return $a;
}

// ---------------------------------------------- SCHEDULE ----------------------------------------------

class schedule
{
    public $schedule_id, $start_date, $remanders, $notes, $tour_id, $feedback_id;
    //ham dung
    public function __construct($schedule_id, $start_date, $remanders, $notes, $tour_id, $feedback_id)
    {
        $this->schedule_id = $schedule_id;
        $this->start_date = $start_date;
        $this->remanders = $remanders;
        $this->notes = $notes;
        $this->tour_id = $tour_id;
        $this->feedback_id = $feedback_id;
    }

    // ham lay thong tin schedule
    public static function getListSchedule()
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        //doc het du lieu trong bang [tbbook] -> $result
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
        } else {
            $pages = 1;
        }
        $row = 6;  // so bang ghi tren trang 
        $from = ($pages - 1) * $row; // vi tri bat dau lay ra tu bang ghi
        $sql = "SELECT * FROM tbschedule ORDER BY schedule_id DESC LIMIT $from, $row";
        $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
        if ($result == false) {
            die("<h3>Data Not Found !<h3>");
        }
        //khai bao mang a[] chua cac dong du lieu trong result 
        $a = array();
        while ($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
        // while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //     $a[] = $sv;
        // }
        $cn->close();   // disconnectDB($cn);
        return $a;
    }

    //ham them 1 schedule
    public static function createSchedule(schedule $createSchedule)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "INSERT INTO `tbschedule` (`schedule_id`, `start_date`, `remanders`, `notes` , `tour_id` , `feedback_id`) 
         VALUES ('$createSchedule->schedule_id', '$createSchedule->start_date','$createSchedule->remanders', '$createSchedule->notes', '$createSchedule->tour_id', '$createSchedule->feedback_id')";
        // var_dump($sql);
        // die();
        $result = $cn->query($sql);

        $cn->close();
        return $result;
    }

    // // ham lay schedule id  
    // public static function getScheduleId()
    // {
    //     $cn = connectDB();  //ket noi voi DB [db2008A0]
    //     $sql = "SELECT schedule_id FROM `tbschedule` ORDER BY schedule_id DESC LIMIT 1";
    //     $result = mysqli_query($cn, $sql);
    //     $row = mysqli_fetch_array($result);
    //     $lastid = $row['schedule_id'];

    //     if(empty($lastid)){
    //         $n = "SD0001";
    //     }else {
    //         $idd = str_replace("SD","",$lastid);
    //         $id = str_pad($idd + 1, 4,0, STR_PAD_LEFT);
    //         $n = "SD" . $id;
    //     }

    //     $cn->close();
    //     return $n;
    // }

    public static function deleteSchedule($deleteSchedule)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]

        //xoa sach trong bang [tbbook] theo ma so 
        $sql = "DELETE FROM `tbschedule` WHERE `tbschedule`.`schedule_id` = '$deleteSchedule'";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }
}

function editSchedule($id, $start_date, $notes)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    $sql = "UPDATE `tbschedule` SET `start_date`='$start_date',`notes`='$notes' WHERE `tbschedule`.`schedule_id` = '$id'";
    $result = $cn->query($sql);
    $cn->close();
    return $result;
}

// ham dem lich trinh
function countSchedule()
{
    $cn = connectDB();
    $sql = "SELECT * FROM tbschedule";
    $query = mysqli_query($cn, $sql);
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    $count = count($result);
    return $count;
}

// ham lay schedule theo id
function getListScheduleId($id)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    //lay du lieu trong bang [tbuser] co ma so id -> $result
    $sql = "SELECT * FROM tbschedule WHERE `schedule_id` LIKE '$id'";
    $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>Not Found !<h3>");
    }
    //khai bao bien a chua 1 dong du lieu trong result 
    $a = array();

    while ($user = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $a = $user;
    }
    disconnectDB($cn);
    return $a;
}

function editScheduleRemanders($schedule_id, $remanders)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    $sql = "UPDATE `tbschedule` SET `remanders` = '$remanders' WHERE `tbschedule`.`schedule_id` = '$schedule_id'";
    $result = $cn->query($sql);
    $cn->close();
    return $result;
}


// lay danh sach tour theo ngay
function getTourDate($id)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    $sql = "SELECT * FROM tbschedule WHERE `tour_id` LIKE '$id'";
    $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>Not Found !<h3>");
    }
    //khai bao bien a chua 1 dong du lieu trong result 
    $a = array();

    while ($user = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $a[] = $user;
    }
    disconnectDB($cn);
    // var_dump($a);
    // exit();
    return $a;
}

// lay danh sach schedule theo booking
// function getScheduleIdOnTour($uid)
// {
//     $cn = connectDB();  //ket noi voi DB [db2008A0]
//     $sql = "SELECT tour_id FROM tbschedule WHERE `tour_id` LIKE '$uid'";
//     $result = mysqli_query($cn, $sql);
//     if ($result == false) {
//         die("<h3>Not Found !<h3>");
//     }
//     //khai bao bien a chua 1 dong du lieu trong result 
//     $a = array();

//     while ($user = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//         $a = $user;
//     }
//     disconnectDB($cn);
//     return $a;
// }

// ---------------------------------------------- FEEDBACK ----------------------------------------------
class feedback
{

    public $feedback_id, $fullname, $age, $address, $phone, $email, $promotion, $quality, $comments, $customer_id, $admin_id, $booking_id;
    public function __construct($feedback_id, $fullname, $age, $address, $phone, $email, $promotion, $quality, $comments, $customer_id, $admin_id, $booking_id)
    {
        $this->feedback_id = $feedback_id;
        $this->fullname = $fullname;
        $this->age = $age;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->promotion = $promotion;
        $this->quality = $quality;
        $this->comments = $comments;
        $this->customer_id = $customer_id;
        $this->admin_id = $admin_id;
        $this->booking_id = $booking_id;
    }
    public static function getListFeedback()
    {
        $cn = connectDB();
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
        } else {
            $pages = 1;
        }
        $row = 6;  // so bang ghi tren trang 
        $from = ($pages - 1) * $row; // vi tri bat dau lay ra tu bang ghi
        $sql = "SELECT * FROM tbfeedback ORDER BY feedback_id DESC LIMIT $from, $row";
        $result = mysqli_query($cn, $sql);

        if ($result == false) {
            die("<h3>Not Found !<h3>");
        }
        //khai bao mang a[] chua cac dong du lieu trong result 
        $a = array();
        while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $a[] = $sv;
        }
        disconnectDB($cn);
        return $a;
    }

    public static function createFeedback(feedback $createFeedback)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "INSERT INTO `tbfeedback`(`feedback_id`, `fullname`, `age`, `address`, `phone`, `email`, `promotion`, `quality`, `comments`, `customer_id`, `admin_id`, `booking_id`)
         VALUES ('$createFeedback->feedback_id', '$createFeedback->fullname', '$createFeedback->age', '$createFeedback->address', '$createFeedback->phone','$createFeedback->email', '$createFeedback->promotion', '$createFeedback->aquality', '$createFeedback->comments', '$createFeedback->customer_id', '$createFeedback->admin_id', '$createFeedback->booking_id')";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }

    public static function deleteFeedback($deleteFeedback)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]

        //xoa sach trong bang [tbbook] theo ma so 
        $sql = "DELETE FROM `tbfeedback` WHERE `tbfeedback`.`feedback_id` = '$deleteFeedback'";
        $result = $cn->query($sql);

        $cn->close();
        return $result;
    }

    public static function getFeedbackId()
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "SELECT feedback_id FROM `tbfeedback` ORDER BY id DESC LIMIT 1";
        $result = $cn->query($sql);
        $bk = "FB";
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                $n = substr($row['feedback_id'], 2);
                $n1 = intval($n) + 1;
                $bk = $bk . $n1;
            } else {
                $bk = $bk . "1";
            }
        }
        $cn->close();
        // var_dump($bk);
        // exit();
        return $bk;
    }
}

function getListFeedbackByID($id)
{
    $cn = connectDB(); // ket noi bang db2008a0
    $sql = "SELECT * FROM `tbfeedback` WHERE `feedback_id` Like '$id'";
    $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>invalid account !<h3>");
    }
    //khai bao mang a[] chua cac dong du lieu trong result 
    $a = array();
    while ($row = $result->fetch_assoc()) {
        $a = $row;
    }
    $cn->close();   // disconnectDB($cn);
    return $a;
}


function countFeedback()
{
    $cn = connectDB();
    $sql = "SELECT * FROM tbfeedback";
    $query = mysqli_query($cn, $sql);
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    $count = count($result);
    return $count;
}

// ---------------------------------------------- SERVICE ----------------------------------------------

class service
{
    public $service_id, $topic, $path, $address;
    public function __construct($service_id, $topic, $path, $address)
    {
        $this->service_id = $service_id;
        $this->topic = $topic;
        $this->path = $path;
        $this->address = $address;
    }


    public static function getListService()
    {
        $cn = connectDB();
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
        } else {
            $pages = 1;
        }
        $row = 4;  // so bang ghi tren trang 
        $from = ($pages - 1) * $row; // vi tri bat dau lay ra tu bang ghi
        $sql = "SELECT * FROM tbservice ORDER BY service_id DESC LIMIT $from, $row";
        $result = mysqli_query($cn, $sql);

        if ($result == false) {
            die("<h3>Not Found !<h3>");
        }
        //khai bao mang a[] chua cac dong du lieu trong result 
        $a = array();
        while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $a[] = $sv;
        }
        disconnectDB($cn);
        return $a;
    }

    public static function getListServiceUser()
    {
        $cn = connectDB();
        $sql = "SELECT * FROM tbservice";
        $result = mysqli_query($cn, $sql);

        if ($result == false) {
            die("<h3>Not Found !<h3>");
        }
        //khai bao mang a[] chua cac dong du lieu trong result 
        $a = array();
        while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $a[] = $sv;
        }
        disconnectDB($cn);
        return $a;
    }

    public static function createService(service $createService)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]
        $sql = "INSERT INTO `tbservice` (`service_id`, `topic`, `path`, `address`) 
         VALUES ('$createService->service_id', '$createService->topic', '$createService->path', '$createService->address')";
        $result = $cn->query($sql);
        $cn->close();
        return $result;
    }
    public static function deleteService($delete)
    {
        $cn = connectDB();  //ket noi voi DB [db2008A0]

        //xoa sach trong bang [tbbook] theo ma so 
        $sql = "DELETE FROM tbservice WHERE tbservice.`service_id` = '$delete'";
        $result = $cn->query($sql);

        $cn->close();
        return $result;
    }
}
function editService($service_id, $topic, $path, $address)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]
    $sql = "UPDATE tbservice SET `service_id` = '$service_id', `topic` = '$topic', `path` = '$path', `address` = '$address' WHERE tbservice.`service_id` = '$service_id'";
    $result = $cn->query($sql);
    $cn->close();
    return $result;
}
// lay danh sach theo idTour
function getListServiceByID($id)
{
    $cn = connectDB(); // ket noi bang db2008a0
    $sql = "SELECT * FROM tbservice WHERE service_id Like '$id'";
    $result = $cn->query($sql);     // $result = mysqli_query($cn, $sql);
    if ($result == false) {
        die("<h3>invalid account !<h3>");
    }
    //khai bao mang a[] chua cac dong du lieu trong result 
    $a = array();
    while ($row = $result->fetch_assoc()) {
        $a = $row;
    }
    $cn->close();   // disconnectDB($cn);
    return $a;
}

function countService()
{
    $cn = connectDB();
    $sql = "SELECT * FROM tbservice";
    $query = mysqli_query($cn, $sql);
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    $count = count($result);
    return $count;
}
