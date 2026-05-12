<?php


$connection = mysqli_connect("localhost","root","","cw");

if(!$connection){
    die("Database Connection Failed!");
}

//  remove appointment 
if(isset($_POST['remove'])){
    $phoneRemove = $_POST['phone'];

    $deleteQuery = "DELETE FROM details WHERE phone='$phoneRemove'";

    if(mysqli_query($connection,$deleteQuery)){
        $status = "removed";
    } else {
        $status = "remove_failed";
    }
}


if(isset($_POST['service'])){

    $service = $_POST['service'];
    $date    = $_POST['date'];
    $time    = $_POST['time'];
    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $email   = $_POST['email'];

    //insert data

    $sql = "INSERT INTO details(service,date,time,name,phone,email) 
    VALUES('$service','$date','$time','$name','$phone','$email')";
    
    if(mysqli_query($connection,$sql)){
        $status = "success";
    }else{
        $status = "failed";
    }

    mysqli_close($connection);
}

?>

<!-- appoinment details-->

<!DOCTYPE html>
<html>
<head>
     <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="book.css">
</head>
<body>

<div class="container">

<?php if(isset($status) && $status=="success"){ ?>

    <h2>Booking Confirmed!</h2>

    <div class="details">
        <p><b>Service:</b> <?php echo $service; ?></p>
        <p><b>Date:</b> <?php echo $date; ?></p>
        <p><b>Time:</b> <?php echo $time; ?></p>
        <p><b>Name:</b> <?php echo $name; ?></p>
        <p><b>Phone:</b> <?php echo $phone; ?></p>
        <p><b>Email:</b> <?php echo $email; ?></p>
    </div>

<?php } ?>

<div class="btn-container">
    <a class="btn change-btn" href="bookHair.html">Change Booking Details</a>

     <!-- remove appointment -->
        <form method="POST" style="display:inline;">
            <input type="hidden" name="phone" value="<?php echo $phone; ?>">
            <button class="btn remove-btn" type="submit" name="remove">Remove Appointment</button>
        </form>

    <a class="btn done-btn" href="CW.html">Done</a>
</div>



<!-- successfully removed -->
<?php if(isset($status) && $status=="removed"){ ?>
    <h2 class="aaa" style="color:green; text-align:center;">Appointment Removed Successfully!</h2>
    <br>
    <a class="btn change-btn1" href="bookHair.html">Book Again</a>
<?php } ?>


<!--failed remove -->
<?php if(isset($status) && $status=="remove_failed"){ ?>
    <h2 style="color:red;">Failed To Remove Appointment!</h2>
<?php } ?>

<!-- failed insert-->
<?php if(isset($status) && $status=="failed"){ ?>
    <h2 style="color:red;">Booking Failed!</h2>
<?php } ?>



</div>


<!--footer-->
    <section class="footer">
        <div class="footer-box">
            <h3>ASN Beauty Salon </h3>
            <p>Naturals brings you a blissful experience for all your grooming needs  from luxurious hair treatments to soothing skin care rituals  all crafted to enhance your natural beauty with expert care and a touch of elegance.</p>
            <div class="social">
                <a href="#"><i class='bx  bxl-facebook-circle' onclick="window.open('https://web.facebook.com/?_rdc=1&_rdr#')"></i> </a>
                <a href="#"><i class='bx  bxl-twitter' onclick="window.open('https://x.com/')"></i> </a>
                <a href="#"><i class='bx  bxl-whatsapp' onclick="window.open('https://web.whatsapp.com/')"></i> </a>
                <a href="#"><i class='bx  bxl-instagram' onclick="window.open('https://www.instagram.com/')"></i> </a>
                <a href="#"><i class='bx  bxl-tiktok' onclick="window.open('https://www.tiktok.com/login?lang=en&redirect_url=https%3A%2F%2Fwww.tiktok.com%2Fmessages')"></i> </a>
            </div>
        </div>

        <div class="footer-box">
            <h3>Support</h3>
            <li><a href="#">Services</a></li>
            <li><a href="#">Help & Support</a></li>
            <li><a href="#">Terms Of Use</a></li>
            <li><a href="#">Services</a></li>
        </div>

        <div class="footer-box">
            <h3>View Guides</h3>
            <li><a href="#">Features</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Blog Post</a></li>
            <li><a href="#">Our Branches</a></li>
        </div>

          <div class="footer-box">
              <h3>Contact</h3>
              <div class="contact">
                  <span><i class='bx  bx-map'></i>862/3, Colombo Road, Hidellana, Ratnapura<br></span>
                  <span><i class='bx  bx-phone'></i>  +94 75 369-2112<br></span>
                  <span><i class='bx  bx-envelope'></i>asnbeautysalon@gmail.com </span>
              </div>
          </div>
    </section>

</body>
</html>
