<?php
include ("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <div class="title">
            <h1>Registration Page</h1>
        </div>

    <div class="container">
        <form action="#"method="POST" enctype="multipart/form-data">
        

        <div class="form">
        
        <div class="input_field" style="width: 75%;">
            <label for="IMG">Upload Image</label>
            <input type="file" name="img_file" required>
        </div>

        <div class="input_field">
            <label for="fname">First Name</label>
            <input type="text" class="input" name="fname" required>
        </div>

        <div class="input_field">
            <label for="lname">Last Name</label>
            <input type="text" class="input"  name="lname" required>
        </div>

        <div class="input_field">
            <label for="password">Password</label>
            <input type="password" class="input"  name="password" required>
        </div>

        <div class="input_field">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="input" name="con_password" required>
        </div>

        <div class="input_field">
            <label for="gender">Gender</label>
            <div class="custom_select">
            <select name="gender" required>
                <option value = "">Select</option>
                <option vlaue = "male">Male</option>
                <option value = "female">Female</option>
            </select>
            </div>
        </div>

        <div class="input_field">
            <label for="email">Email Address</label>
            <input type="text" class="input" name="email" required>
        </div>

        <div class="input_field">
            <label for="phone">Phone Number</label>
            <input type="text" class="input" name="phone" required>
        </div>

        <div class="input_field">
            <label style="margin-right: 100px;" for="radio">Degree</label>
            <input type="radio" name="deg" value="BSCS" required><label style="margin-left: 5px;">BSCS</label>
            <input type="radio" name="deg" value="BSIT" required><label style="margin-left: 5px;">BSIT</label>
            <input type="radio" name="deg" value="BSSE" required><label style="margin-left: 5px;">BSSE</label>
            <input type="radio" name="deg" value="Other" required><label style="margin-left: 5px;">Other</label>
        </div>

        <div class="input_field">
            <label for="checkbox" style="margin-right:75px;">Language</label>
            <input type="checkbox" name="lang[]" value="English"><label style="margin-left: 5px;">English</label>
            <input type="checkbox" name="lang[]" value="Urdu"><label style="margin-left: 5px;">Urdu</label>
            <input type="checkbox" name="lang[]" value="Other"><label style="margin-left: 5px;">Other</label>
        </div>

        <div class="input_field">
            <label for="address">Address</label>
            <textarea class="textarea" name="address" required></textarea>
        </div>

        <div class="input_field terms">
            <label class="check">
            <input type="checkbox" required>
            <span class="checkmark"></span>
            </label>
            <p>Agree to Terms and Conditions</p>
        </div>

        <div class="input_field">
            <input type="submit" value="Register" class="btn" name="reg_btn">
        </div>

        <div class="login_here"> Already Have an Account ? <a href="login.php"> Login Here</a></div>
        </div>
        </form>
    </div>
</body>
</html>


<?php
error_reporting(0);

if(isset($_POST['reg_btn'])) {

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

    

    $query = "INSERT INTO form (img_file, fname, lname, password, con_password, gender, email, phone, degree, language, address) VALUES ('$folder','$fname', '$lname', '$password', '$con_password', '$gender', '$email', '$phone', '$degree', '$lang1', '$address')";
    $data = mysqli_query($conn, $query);

    if($data) {
        echo "<script> alert('Data Inserted into db');</script>";
        } else {
            echo "<script> alert('Failed to insert data: ');</script>";
        }
    }


?>
