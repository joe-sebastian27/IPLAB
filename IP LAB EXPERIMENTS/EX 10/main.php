<!DOCTYPE html>
<html>
<head>
    <title>GSLV Trajectories</title>
</head>

<body>
    <?php
    session_start();
    // Database connection
    $con = mysqli_connect("localhost:3306","root","","movies");
    $stmt = "select * from ticket_booking"; 
    $res = mysqli_query($con,$stmt); 
    echo '<center><h1>Trajectory Details</h1></center>';
    if($res){
        while($row = mysqli_fetch_array($res))
        {
            echo'<center><div>'.
            '<h5>Path ID : '.$row["id"].'</h5>'.        
            '<h5>From : '.$row["from_addr"].'</h5>'.
            '<h5>Orbit : '.$row["to_addr"].'</h5>'.
            '<h5>Launch Sites Free : '.$row["ticket"].'</h5>'.
            '</div></center>';
        }

        mysqli_free_result($res);
        mysqli_close($con);
    }
    else{
        echo("<SCRIPT>window.alert('No Routes available');</SCRIPT>");
    }   
?>
<center><div>
    <form action="book.php" method="POST">
          <label for="from">Select the from location: </label>
            <select name="from" required>
                <option value="">Choose an option</option>
                <option value="Sriharikota">Sriharikota</option>
                <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                <option value="Bhadrak">Bhadrak</option>
            </select><br>

            <label for="to">Select the orbit range:</label>
            <select name="to" required>
                <option value="">Choose an option</option>
                <option value="GEO">GEO</option>
                <option value="LEO">LEO</option>
                <option value="MEO">MEO</option>
            </select><br>
        <label for="ticket">Enter the number of lauch sites: </label>
        <input type="number" name="ticket" min="1" max="30" required><br>
        <input type="submit">
    </form>
</div></center>
</body>
</html>