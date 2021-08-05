<?php 
    function connectDB(){
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "db2008a0";

        // goi ham tao ket noi den csdl [db2008a0] cua mySQL
        $cn = mysqli_connect($host, $user, $password, $dbname) or die("Can not connect to Database Server !!!");
        return $cn;
    }

    function disconnectDB($cn){
        mysqli_close($cn);
        // $cn -> close();
    }
?>