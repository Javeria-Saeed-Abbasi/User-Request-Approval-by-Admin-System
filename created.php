
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
    <title>Pending Requests Page</title>
</head>
<body>
<header>
     
<!-- ======================= For Pending Requests ============================ -->
    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
        <center>

            <?php
      
                $query = "select * from `requests`;";
                if(count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $row){
                      if($row['status']== 'created'){
                        // echo "<tr>";
                        // echo "<td style='border=1px solid black'>".$row['id']."</td>";
                        // echo "<td>".$row['username']."</td>";
                        // echo "<td>".$row['email']."</td>";
                        // echo "<td>".$row['status']."</td>";
                      

                        // echo "</tr>";
                      
                        ?>
                        <center>
                        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Accept</th>
      <th scope="col">Reject</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><small><i><?php echo $row['date'] ?></i></small></td>
      <td><button class="btn btn-secondary my-2">Pending</button></td>
      <td><a href="accept.php?id=<?php echo $row['id'] ?>" class="btn btn-primary my-2">Accept</a></td>
      <td><a href="reject.php?id=<?php echo $row['id'] ?>" class="btn btn-danger my-2">Reject</a></td>

      
    </tr>
  </tbody>
</table>
                </center>
            <?php
                }
                        }
                    // echo "</tbody></table>";

                }else{
                    echo "No Pending Requests.";
                }
            ?>
          


<!-- ==================== //Accepeted Requests page =============================-->
          <?php
      
                $query = "select * from `requests`;";
                if(count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $row){
                      if($row['status']== 'accepted'){
                      
                        ?>
                        <center>
                        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Accept</th>
      <th scope="col">Reject</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><small><i><?php echo $row['date'] ?></i></small></td>
      <td><button class="btn btn-success my-2"><?php echo $row['status']?></button></td>
      <td></td>
      <td></td>

      
    </tr>
  </tbody>
</table>
                </center>
            <?php
                }
                        }

                }else{
                    echo "No Pending Requests.";
                }
            ?>
<!-- =========================== Rejected Requests Page   ====================== -->
<?php
      
      $query = "select * from `requests`;";
      if(count(fetchAll($query))>0){
          foreach(fetchAll($query) as $row){
            if($row['status']== 'rejected'){
            
              ?>
              <center>
              <table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">#</th>
<th scope="col">Username</th>
<th scope="col">Email</th>
<th scope="col">Date</th>
<th scope="col">Status</th>
<th scope="col">Accept</th>
<th scope="col">Reject</th>

</tr>
</thead>
<tbody>
<tr>
<th scope="row"><?php echo $row['id'] ?></th>
<td><?php echo $row['username'] ?></td>
<td><?php echo $row['email'] ?></td>
<td><small><i><?php echo $row['date'] ?></i></small></td>
<td><button class="btn btn-danger my-2"><?php echo $row['status']?></button></td>
<td></td>
<td></td>


</tr>
</tbody>
</table>
      </center>
  <?php
      }
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