<html>
    <head>
   <script src="..\controller\JS\LogValidation.js"></script>
        <title> LOGIN </title>
     
    </head>

<?php
 include("Navigation2.php");
session_start();

include ("../controller/loginCheck.php");

if(isset($_SESSION["Username"])){

  header("location: Home.php");
}

?>
<style>
        body{
            background-image: url('../Asset/Photo/img4.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>



<!-- onsubmit="return Validation()" -->
    <form action = "" onsubmit="return Validation()" method = "post" enctype = "">
        <fieldset>
            <center>
            
            <legend> 
                Doctor Login
            </legend>
            <br>
        <table>
            <tr>
                <td>
                    Username
                </td>
                <td>
                    <input type = "text" name = "username" id="username" value = ""><td id="ErrUName"></td>
                </td>
            </tr>

            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type = "password" name = "password" id="password" value = ""><td id="ErrPass"></td>
                </td>
            </tr>

        </table>
            <br>
            
            <input type = "submit" name ="" value = "Login">
            <a href = "Registration.php"> REGISTER</a>
            </center>  
        </fieldset>
    </form>
</html>