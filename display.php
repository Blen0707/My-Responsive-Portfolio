<?php

session_start();

?>

<html>
    <head>
        <title>Display Page</title>
        <style>
            body {
                background: rgb(176, 204, 153);
            }

            h1{
                margin: 20px 38%;
                text-align: center;
                border-radius: 15px;
                background: #004f63;
                color: #fff;
                font-family: arial;
            }

            table {
                background: #fff;
                border-radius: 10px;
                margin: 10px auto;
                width: 100%;
            }

            .edit_btn, .delete_btn {
                background: green;
                color: #fff;
                width: 45%;
                height: 25px;
                font-weight: bold;
                cursor: pointer;
                border: 0;
                border-radius: 7px;
                outline: none;
                margin: 2px;
            }

            .delete_btn {
                background: red;
            }

            .logout_btn input{
                background: purple;
                color: #fff;
                width: 80px;
                height: 25px;
                border-radius: 7px;
                cursor: pointer;
                margin-top: 20px;
                margin-left: 45%;
            }
        </style>
    </head>


<?php
include ("db.php");
error_reporting(0);

$userprofile = $_SESSION['email'];

if($userprofile == true) {
    
}else {
    header('location:login.php');
}

$query = "SELECT * FROM form";
$data = mysqli_query($conn, $query);

$show_data = mysqli_num_rows($data);


if($show_data != 0) {
    
    ?>

    <h1>Display Data Page</h1>

    <table border= 2 cellspacing = 6>
        <tr>
            <th width="3%">ID</th>
            <th width="3%">Image</th>
            <th width="8%">First Name</th>
            <th width="8%">Last Name</th>
            <th width="7%">Gender</th>
            <th width="10%">Email</th>
            <th width="8%">Phone</th>
            <th width="6%">Degree</th>
            <th width="10%">Language</th>
            <th width="15%">Address</th>
            <th width="10%">Actions</th>
        </tr>
    
    <?php
    while($result = mysqli_fetch_assoc($data)) {
       
        echo "<tr>
                <td>".$result['id']."</td>

                <td><img src= '".$result['img_file']."' height='50px; width=50px;'></td>

                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['degree']."</td>
                <td>".$result['language']."</td>
                <td>".$result['address']."</td>

                <td>
                    <a href='update.php?id=$result[id]'>
                    <input type='submit' value='Edit' class='edit_btn'>
                    </a>
                    
                    <a href='delete.php?id=$result[id]'>
                    <input type='submit' value='Delete' class='delete_btn' onclick= 'return checkdelete()'>
                    </a>
                </td>
            </tr>";

    }
} else {
    echo "No record found!";
}

?>

</table>

<div class="logout_btn">
<a href="logout.php"><input type="submit" value="Logout" name="logout_btn"></a>
</div>

</html>

<script>
    function checkdelete() {
        return confirm(' Do you really want to delete this entry? ');
    }
</script>