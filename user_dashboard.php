<?php
  include('includes/header.php');
  if(isset($_SESSION['email'])){
    include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Dashboard</title>
  </head>
  <body style="background:gray;">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <b>Mess Timings</b>
          </div>
          <div class="card-body">
            <b>Breakfast:</b> 8:00 AM to 10:00 AM <br>
            <b>Lunch:</b> 12:00 PM to 2:00 PM <br>
            <b>Dinner:</b> 7:00 PM to 9:30 PM
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <b>Today's Menu</b>
          </div>
          <div class="card-body">
            <?php
              $today = date("l");
              $query = "select * from menu where day='$today'";
              $query_run = mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($query_run)){
            ?>
              <b>Breakfast: </b> <?php echo $row['meal1']; ?> <br>
              <b>Lunch: </b> <?php echo $row['meal2']; ?> <br>
              <b>Dinner: </b> <?php echo $row['meal3']; ?>
            <?php } ?>
          </div>

        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <b>Tomorrow's Menu</b>
          </div>
          <div class="card-body">
            <?php
              $today = date("l",strtotime('+1 day'));
              $query = "select * from menu where day='$today'";
              $query_run = mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($query_run)){
            ?>
              <b>Breakfast: </b> <?php echo $row['meal1']; ?> <br>
              <b>Lunch: </b> <?php echo $row['meal2']; ?> <br>
              <b>Dinner: </b> <?php echo $row['meal3']; ?>
            <?php } ?>
          </div>
        

        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <b>Important Notice</b>
          </div>
          <div class="card-body">
            <ul>
              <marquee direction="up" scrollamount="2"><li><a>1.Don't waste food.</a></li>
              <li><a>2..</a></li>
              <li><a>3. .</a></li></marquee>
            </ul>
          </div>
        </div>
      </div>
    </div> <br>

    <!-- Buttons -->
    <div class="row">
      <div class="col-md-2 m-auto">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#fee_status_modal">View Bill details</button>
          <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#attendance_modal">Hostel status</button>
      <!--  <a href="feedback.php" type="button" class="btn btn-block btn-danger">Submit feedback</a>-->
      </div>
    </div>

    <!-- Fee Status MODAL -->
    <div class="modal fade" id="fee_status_modal">
      <div class="modal-dialog">
        <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Bill details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->

      <div class="modal-body">
        <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even){background-color: #f2f2f2}
        th {
            background-color: #4CAF50;
            color: white;
        }
      </style>


      <table>
        <tr>
            <th>Month</th>
            <th>No.of Days</th>
            <th>Per_day</th>
            <th>Bill Amount</th>
        </tr>
      <?php    $query = "select * from bill";
        $query_run = mysqli_query($connection,$query);
         while($row = mysqli_fetch_assoc($query_run)){
        ?>
            <tr><?php echo "<td>$row[month]</td>"?>
            <?php   if ('January'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-01-01' AND date <= '2023-01-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php  if ('February'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-02-01' AND date <= '2023-02-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php  if ('March'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-03-01' AND date <= '2023-03-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php if ('April'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-04-01' AND date <= '2023-04-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php if ('May'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-05-01' AND date <= '2023-05-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php  if ('June'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-06-01' AND date <= '2023-06-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php  if ('July'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-07-01' AND date <= '2023-07-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php  if ('August'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-08-01' AND date <= '2023-08-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php   if ('September'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-09-01' AND date <= '2023-09-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php  if ('October'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-10-01' AND date <= '2023-10-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php  if ('November'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-11-01' AND date <= '2023-11-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>
          <?php  if ('December'==$row['month']) {
                $queryy = "SELECT * FROM `attendance` WHERE sno = $_SESSION[uid] AND date >= '2023-12-01' AND date <= '2023-12-30';";
                $queryy_run = mysqli_query($connection,$queryy);
                $rows = mysqli_num_rows($queryy_run); ?>
                <?php echo "<td>$rows</td>"?>
            <?php    }?>

              <?php echo" <td>$row[per_day]</td>"?>
                <td><?php echo " $row[per_day]"*"$rows"  ?></td>
            </tr>
      <?php } ?>
      </table>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

      <!-- attendace MODAL -->
      <div class="modal fade" id="attendance_modal">
        <div class="modal-dialog">
          <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">hostel status</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form action="" method="post">
        <?php
                $query = "select status from student where sno = $_SESSION[uid]";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
              ?><div class="modal-body">
                <?php if($row['status'] == 1){echo "You are in the hostel";?>
                <input type="submit" class="btn btn-danger" name="OUT" value="OUT"><?php  }else{echo "You are out the hostel";?>
                <input type="submit" class="btn btn-success" name="IN" value="IN"><?php  }}?>
                </form>

      </div>


        <?php    if(isset($_POST['IN'])){
            $query = "UPDATE `student` SET status=1 WHERE sno=$_SESSION[uid]";
            $query_run = mysqli_query($connection,$query);

          }
          if(isset($_POST['OUT'])){
            $query = "UPDATE `student` SET status=0 WHERE sno=$_SESSION[uid]";
            $query_run = mysqli_query($connection,$query);

          }?>


        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Week Meal MODAL -->
    <div class="modal fade" id="meal">
      <div class="modal-dialog">
        <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Full Week Menu</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <?php
        $query = "select * from menu";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
      ?>
      <div class="modal-body">
        <h4><?php echo $row['day']; ?></h4>

          <b>Breakfast: </b> <?php echo $row['meal1']; ?> <br>
          <b>Lunch:</b> <?php echo $row['meal2']; ?> <br>
          <b>Dinner:</b> <?php echo $row['meal3']; ?><br>

      <?php } ?>

      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>

</body>
</html>
<?php }
else{
  header('location:index.php');
}

include 'footer.php';
