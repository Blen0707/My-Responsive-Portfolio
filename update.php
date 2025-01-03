<?php
session_start();

include ("db.php");
error_reporting(0);

$id = $_GET['id'];

$userprofile = $_SESSION['email'];

if($userprofile == true) {
    
}else {
    header('location:login.php');
}

$query = "SELECT * FROM form WHERE id= '$id'";
$data = mysqli_query($conn, $query);

$show_data = mysqli_num_rows($data);

$result = mysqli_fetch_assoc($data);

$language = $result['language'];
$language1 = explode(",", $language);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="title">
        <h1>Update Data Page</h1>
    </div>

    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">

        <div class="form">

        <div class="input_field" style="width: 75%;">
            <label for="IMG">Upload Image</label>
            <input type="file" name="img_file" required>
        </div>
        
        <div class="input_field">
            <label for="fname">First Name</label>
            <input type="text" class="input" name="fname" required value=<?php echo $result['fname']; ?> >
        </div>

        <div class="input_field">
            <label for="lname">Last Name</label>
            <input type="text" class="input" name="lname" required value=<?php echo $result['lname']; ?>>
        </div>

        <div class="input_field">
            <label for="password">Password</label>
            <input type="password"  class="input" name="password" required value=<?php echo $result['password']; ?>>
        </div>

        <div class="input_field">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="input" name="con_password" required value=<?php echo $result['con_password']; ?>>
        </div>

        <div class="input_field">
            <label for="gender">Gender</label>
            <div class="custom_select">
            
            <select name="gender" required>
                <option value = "">Select</option>
                <option value = "male"
                    <?php
                        if($result['gender'] == 'male') {
                            echo "selected";
                        }
                    ?>
                    >Male
                </option>
                
                <option value = "female"
                    <?php
                        if($result['gender'] == 'female') {
                            echo "selected";
                        }
                    ?>
                    >Female
                </option>
            </select>
            
            </div>
        </div>

        <div class="input_field">
            <label for="email">Email Address</label>
            <input type="text" class="input" name="email" required value=<?php echo $result['email']; ?>>
        </div>

        <div class="input_field">
            <label for="phone">Phone Number</label>
            <input type="text" class="input" name="phone" required value=<?php echo $result['phone']; ?>>
        </div>

        <div class="input_field">
            <label for="radio" style="margin-right: 100px;">Degree</label>
            
            <input type="radio" name="deg" value="BSCS" required
            <?php
                if($result['degree'] == 'BSCS') {
                    echo "checked";
                }
            ?>
            ><label style="margin-left: 5px;">BSCS</label>

            <input type="radio" name="deg" value="BSIT" required
                <?php
                    if($result['degree'] == 'BSIT') {
                        echo "checked";
                    }
                ?>
            ><label style="margin-left: 5px;">BSIT</label>

            <input type="radio" name="deg" value="BSSE" required
                <?php
                    if($result['degree'] == 'BSSE') {
                        echo "checked";
                    }
                ?>
            ><label style="margin-left: 5px;">BSSE</label>

            <input type="radio" name="deg" value="Other" required
                <?php
                    if($result['degree'] == 'Other') {
                        echo "checked";
                    }
                ?>
            ><label style="margin-left: 5px;">Other</label>
        </div>

        <div class="input_field">
            <label for="checkbox" style="margin-right:75px;">Language</label>
            
            <input type="checkbox" name="lang[]" value="English"
                <?php
                    if(in_array('English', $language1)) {
                        echo "checked";
                    }
                ?>
            >
            <label style="margin-left: 5px;">English</label>
            
            <input type="checkbox" name="lang[]" value="Urdu"
                <?php
                    if(in_array('Urdu', $language1)) {
                        echo "checked";
                    }
                ?>
            >
            <label style="margin-left: 5px;">Urdu</label>
            
            <input type="checkbox" name="lang[]" value="Other"
                <?php
                    if(in_array('Other', $language1)) {
                        echo "checked";
                    }
                ?>
            >
            <label style="margin-left: 5px;">Other</label>
        </div>

        <div class="input_field">
            <label for="address">Address</label>
            <textarea class="textarea" name="address" required><?php echo $result['address']; ?>
            </textarea>
        </div>

        <div class="input_field terms">
            <label class="check">
            <input type="checkbox" required>
            <span class="checkmark"></span>
            </label>
            <p>Agree to Terms and Conditions</p>
        </div>

        <div class="input_field">
            <input type="submit" value="Update" class="btn" name="update">
        </div>
        </div>
        </form>
    </div>
</body>
</html>

<?php

if(isset($_POST['update'])) {

    $filename = $_FILES["img_file"]["name"];
    $tempname = $_FILES["img_file"]["tmp_name"];
    $folder = "img/".$filename;
    move_uploaded_file($tempname, $folder);

    $fname          = $_POST['fname'];
    $lname          = $_POST['lname'];
    $password       = $_POST['password'];
    $con_password   = $_POST['con_password'];
    $gender         = $_POST['gender'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $degree         = $_POST['deg'];
    
    
    $language       = $_POST['lang'];
    $lang1 = implode(",", $language);
   

    $address        = $_POST['address'];

   
    
    $query = "UPDATE form SET img_file='$folder', fname='$fname', lname='$lname', password='$password', con_password='$con_password', gender='$gender', email='$email', phone='$phone', degree='$degree', language='$lang1', address='$address' WHERE id='$id'";
    
    $data = mysqli_query($conn, $query);

    if($data) {
        echo "<script> alert('Data Updated Successfully!');</script>";

        ?>

        <meta http-equiv= "refresh" content = "0; url = http://localhost/mine/display.php" />

        <?php
        } else {
            echo "<script> alert('Failed to Update Data: ');</script>";
        }
    }


?>
