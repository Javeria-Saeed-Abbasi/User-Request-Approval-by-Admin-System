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
 
    <title>Login Page</title>
</head>
<body>
<?php
  //for users:
        if(isset($_POST['signin'])){
            $password = $_POST['password'];
            $username = $_POST['username'];
            $query = "SELECT * from `accounts`;";
            if(count(fetchAll($query)) > 0){ //this is to catch unknown error.
                  foreach(fetchAll($query) as $row){
                    if($row['username']==$username&&$row['password']==$password){
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $row['username'];
                        header('location:welcome.php');
                    }else{
                        echo "<script>alert('Wrong login details.')</script>";
                    }
                }
            }else{
                echo "<script>alert('Error.')</script>";
            }

        }
        //for admin
        if(isset($_POST['signin'])){
          $password = $_POST['password'];
          $username = $_POST['username'];
          $query = "SELECT * from `admin`;";
          if(count(fetchAll($query)) > 0){ //this is to catch unknown error.
                foreach(fetchAll($query) as $row){
                  if($row['username']==$username&&$row['password']==$password){
                      $_SESSION['login'] = true;
                      $_SESSION['username'] = $row['username'];
                      header('location:index.php');
                  }else{
                      echo "<script>alert('Wrong login details.')</script>";
                  }
              }
          }else{
              echo "<script>alert('Error.')</script>";
          }

      }
        ?>
<div class="container">
            <form method="post" class="form-signin mx-auto mt-5 bg-secondary col-5 text-center">
              <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
              <h1 class="h2 mb-3 font-weight-normal">Please sign in</h1>
                
              <label for="inputUsername" class="sr-only">Username</label>
              <input name="username" type="text" id="inputname" class="form-control" placeholder="Username" required autofocus>
              <br/>
              <!-- <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <br/> -->
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <br/>
              <button name="signin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              <br/>
              <a href="signup.php" class="mt-5 mb-3 text-white">Create an account</a>
            </form>
          </div>
      
</body>
</html>