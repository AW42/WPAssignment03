<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet">
    <title>Assignment</title>

    <style>
        body{
            background-image:url("https://images.pexels.com/photos/1089438/pexels-photo-1089438.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
            text-align: center;    
        }

        h1{
            margin-left :7%;
            color:white;
            font-family: 'Goldman', cursive;
            font-weight: bold;
            font-size: 60px;
            }

            .container{
             position: relative;
            text-align: center;
            display: inline-block;
             background-color: #edf4ff;
            width: 37%;
            height: auto;
            margin-left: 35%;
            margin-top: 90px;
            margin-right: 150px;
            margin-bottom: 120px;
            padding-top: 40px;
            border-radius: 50px;

}

h4{
    font-size:36px;
}

#Form{
    margin-bottom:55px;
}

#btn2{
    width: 30%;
    box-sizing: border-box;
    padding: 7px 0;
    margin-top: 8px;
    outline: none;
    border: none;
    background:#7e2827;
   
    border-radius: 20px;
    color: #fff;
}

    </style>



</head>
<body>
<h1>Welcome To Password Generator</h1>
<div class="container"> 

<form method="post" id="Form">
<label for="master"><h4>Master Password</h4>
    <input type="password" name="password" id="master" placeholder="Enter password">
    <input type="submit" value="Submit" name="submit" id="btn2">
</label>
</form>

</div>

<?php 
    include('config.php');    
    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $query = "select * from masterpassword";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result)){
            if($row['password'] == $password){
                session_start();
                $_SESSION['admin'] = true;
                header("Location: admin.php");
            }else{
                session_start();
                $_SESSION['admin'] = false;
                echo "Please check your password.";
            }
        }

    }



?>
    
</body>
</html>