<!DOCTYPE html>
<html>
<head>
    <title>Trajectory Selection</title>
</head>

<body>
    <?php
    session_start();

    $from = $_POST['from'];
    $to = $_POST['to'];
    $ticket = intval($_POST['ticket']);

    $con = mysqli_connect("localhost:3306","root","","movies");
    $stmt = "select * from ticket_booking where from_addr = '$from' and to_addr = '$to'"; 
    $res = mysqli_query($con,$stmt);
    $row = mysqli_fetch_array($res); 

    echo '<center><h1>Trajectory Details</h1></center>';
    if($row){
        $count = intval($row['ticket']);
        $id = $row['id'];
        if($ticket > $count)
        {
            echo("<SCRIPT>window.alert('Exceeded more than available sites for this route');</SCRIPT>");
        }
        else{
            $count = $count - $ticket;
            $stmt2 = "update ticket_booking set ticket = '$count' where id = '$id'"; 
            $res2 = mysqli_query($con,$stmt2);
            if($res2){
                echo("<SCRIPT>window.alert('Sites booked successfully');
                window.location.href='main.php';</SCRIPT>");
            }
        }
        mysqli_free_result($res);
        mysqli_close($con);
    }
    else{
        echo("<SCRIPT>window.alert('No Such Route Available');</SCRIPT>");
    }   
?>
</body>
</html>