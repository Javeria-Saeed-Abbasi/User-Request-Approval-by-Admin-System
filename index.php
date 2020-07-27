<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
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
 
    <title>Admin Page</title>
</head>
<body>
<header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Hi, <?php echo $_SESSION['username']?></strong>
          </a>
            <div class="pull-right">
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:index.php');
                }
    
                ?>
                <form method="post">
                    <button name="logout" class="btn btn-danger my-2">Logout</button>
                </form>
            </div>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
            <?php
            
                $query = "select * from `requests`;";
                if(count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $row){
                        ?>
                        <center>
                        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Accept</th>
      <th scope="col">Reject</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><a href="accept.php?id=<?php echo $row['id'] ?>" class="btn btn-primary my-2">Accept</a></td>
      <td><a href="reject.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary my-2">Reject</a></td>
      <td><small><i><?php echo $row['date'] ?></i></small></td>
      
    </tr>
  </tbody>
</table>
                </center>
            <?php
                    }
                }else{
                    echo "No Pending Requests.";
                }
            ?>
          
        </div>
          
      </section>

    </main>


      
</body>
</html>