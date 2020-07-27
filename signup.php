<?php
session_start(); //we need session for the log in thingy XD 
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CDN CSS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Boostrap CDN JQUERY -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Boostrap CDN popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 
    <title>Sign Up Page</title>
</head>
<body>
<?php
        if(isset($_POST['signup'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            // $message = "$lastname $firstname would like to request an account.";
            $query = "INSERT INTO `requests` (`id`, `username`, `email`, `password`, `date`) VALUES (NULL, '$username', '$email', '$password', CURRENT_TIMESTAMP)";
            if(performQuery($query)){
                echo "<script>alert('Your account request is now pending for approval by admin. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Username or Email Already exists.')</script>";
            }
        }
        // $query = "SELECT * FROM `requests`.`username` = '$username';";
        // $stmt = performQuery($query);
        // $stmt->execute(array($username));
        // $result = $stmt->fetchAll();
        // if (!empty($result) ) {
        // $name_error='Username already taken';
        // }
   

            // $stmt = $con->prepare($query);
            // $stmt->execute(array($username));
            // $result = $stmt->fetchAll();
            // if (!empty($result) ) {
            // $name_error='Username already taken';
            // }
    ?>
<body class="text-center">
      <div class="container">
            <form method="post" class="form-signup mx-auto mt-5 bg-secondary col-5 text-center">
              <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
              <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
              <!-- <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> > -->
              <label for="inputUsername" class="sr-only">Username</label>
              <input name="username" type="text" id="inputname" class="form-control" placeholder="Username" required autofocus>
              <!-- <?php if (isset($name_error)): ?>
              <span><?php echo $name_error; ?></span>
              <?php endif ?>
              </div> -->
      <!-- <label for="inputEmail" class="sr-only">Lastname</label>
              <input name="lastname" type="text" id="inputEmail" class="form-control" placeholder="Lastname" required autofocus> -->
              <br/>
              <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <br/>
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <br/>
              <button name="signup" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
              <br/>
              <a href="login.php" class="mt-5 mb-3 text-white">Go back to login page</a>
            </form>
          </div>
</body>
</html>