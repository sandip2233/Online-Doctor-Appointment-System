<?php
include_once 'connection.php';

session_start();
if (isset($_SESSION['patientSession']) != "") {
header("Location: index.php");
}
if (isset($_POST['login']))
{
$userId = mysqli_real_escape_string($con,$_POST['userId']);
$password  = mysqli_real_escape_string($con,$_POST['password']);

$res = mysqli_query($con,"SELECT * FROM client WHERE userId = '$userId'");
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['patientSession'] = $row['userId'];
?>
<script type="text/javascript">
alert('Login Success');
</script>
<?php
header("Location: index.php");
} else {
?>
<script>
alert('wrong input ');
</script>
<?php
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
    <link rel = "icon" href = 
    "icon.png" 
            type = "image/x-icon">
    <link rel="stylesheet" href="style.css">
    
   
  
</head>

<body>

    
        <div class="hero">
            <div class="from-box">
                <div class="buttom-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">LOG IN</button>
                    <button type="button" class="toggle-btn" onclick="register()">REGISTER</button>
                </div>
                <form id="login" class="input-group" onsubmit = "return validation()" method = "POST">
                    <input type="text" class="input-field" placeholder="User Id" name="userId" required>
                    <input type="password" class="input-field" placeholder="Enter Password" name="password" required>
                    <input type="checkbox" class="check-box"><span>Remember Password</span>
                    <button type="submit" name="login" id="login" class="submit-btn">Log In</button>
                </form>
                <form id="register" class="input-group2" action="insert.php" method="post">
                    <input type="text" class="input-field" placeholder="Enter Your Name" name="name" required >

                    <input type="text" class="input-field" placeholder="Enter Age" name="age" required>
                    <input type="text" class="input-field" placeholder="Create User Id" name="userId" required>
                    <input type="text" class="input-field" placeholder="Create Password" name="password" required>
                    <input type="number" class="input-field" placeholder="Enter Phone Number" name="number" required>
                   
                    <input type="checkbox" class="check-box"><span>I agreed to the</span>
                    <button type="submit" class="submit-btn">Register</button>
                </form>
            </div>
        </div>
        
    <script>
          
            function validation()  
            {  
                var id=document.login.user_id.value;  
                var ps=document.login.password.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        
        var x = document.getElementById("login")
        var y = document.getElementById("register")
        var z = document.getElementById("btn")
         
       function register(){
           x.style.left = "-400px";
           y.style.left = "50px";
           z.style.left = "110px";
       }
      function login(){
           x.style.left = "50px";
           y.style.left = "450px";
           z.style.left = "0px";   
       } 
    </script>

    </body>
</html>

