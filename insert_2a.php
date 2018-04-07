<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "vani", "PBRS");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$usn = mysqli_real_escape_string($link, $_REQUEST['usn']);
$seat_num = mysqli_real_escape_string($link, $_REQUEST['seat_num']);
//$email = mysqli_real_escape_string($link, $_REQUEST['email']);
//$Bus_no =  'KA00034';
// attempt insert query execution
$sql = "INSERT INTO Reserve(USN,Bus_no, Seat_no, Route_no, Reserved_status ) VALUES ('$usn','KA65640','$seat_num','1','Y' )";
$sql1 = "INSERT INTO Filled(Username, Route_no, Bus_no, Seat_no) VALUES ('$usn','1','KA65640','$seat_num')";
mysqli_query($link,$sql1);
if(mysqli_query($link,$sql)) {
	echo "seats reserved";
	 header("location:report_2.php");
}
else {
	echo "<center><font color='red'><h2>";
	echo /*mysqli_errno($link) . ": " .*/ mysqli_error($link);
	echo "</h2></font></center>";
}
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    header("location:report_2.php");
} else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    //echo "<center>Seat not booked...!<br>Enter valid credentials to Book your seat</center>";
    //echo "<script type="text/javascript">alert("Seat not booked...!<br>Enter valid credentials to Book your seat")</script>";
    
}
 
// close connection


mysqli_close($link);
?>

<html>
    <head>
        <style>
            .Button {
                /*background-color: #ff661a; 
                border:none;
                color: white;*/
                padding: 5px 5px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <br>
        <center>
        <!--<div class='Button'>-->
            <a href="insert_2.php"><input type="button" class="Button" value="Back"/></a>
        <!--</div>-->
        </center>
    </body>
</html>
