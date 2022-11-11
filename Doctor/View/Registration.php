
<?php 

include("Navigation2.php");
?><html>
    <head>
        
        <title>Add New Doctor</title>
        <script src="..\controller\JS\RegValidation.js"></script>
        <script src="..\controller\CheckMail.js"></script>
        
    </head>
    <style>
        body{
            background-image: url('../Asset/Photo/img3.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <body>
        <form action = "../controller/RegistrationCheck.php" onsubmit=" return Validation()" method = "post" enctype="">
            <fieldset>
                <center>
                <legend>
                Add New Doctor
                </legend>
                
            <table>
            <tr>
                    <td>
                        Name:
                    </td>
                    <td> 
                        <input type = "text" name = "name" id="name" value = ""/>  <td><p id="ErrName"></p></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        Username:
                    </td>
                    <td>
                    <input type = "text" name = "username" id="username" value="" >  <td><p id="ErrUName"></p></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                    <input type = "password" name = "password" id="password" value="" >  <td><p id="ErrPass"></p></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        Email:
                    </td>
                    <td> 
                        <input type = "text" name = "email" id="email" value = "" onkeyup="CheckMail()"/>  <td><p id="ErrMail"></p></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        Contact:
                     </td>
                    <td>
                         <input type = "text" name = "phone" id="phone" value = "" />  <td><p id="ErrMobile"></p></td>
                    </td>
                </tr>
                <tr>
                    <td>
                        Speciality:
                     </td>
                    <td>
                         <input type = "text" name = "speciality" id="speciality" value = "" placeholder=""/>  <td><p id="ErrSpec"></p></td>
                    </td>
                </tr>
                

                <tr>
                    <td>
                        Gender: 
                    </td>
                    <td> 
                        <input type = "radio" name = "gender" value = "Male"/> Male
                        <input type = "radio" name = "gender" value = "Female"/> Female
                       <td> <p id="Errgender"></p></td>
                    </td>
                </tr>

            </table>
            <br>
            <input type = "submit" name ="" value = "Add Doctor">
            <a href="Login.php">Login</a>
            </center>

            </fieldset>  
        </form>
    </body>
</html>