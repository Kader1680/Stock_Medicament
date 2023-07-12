<?php
include './connection.php';
  $Industry = "";
  $Generic = "";
  $Date = "";
  $Autorisation = "";
  $sucesss = "";
  $fail = "";
  // if the request using get methods
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // GET methods show the data of the client 
    $Industry = $_POST["industry"];
    $Generic = $_POST["generic"];
    $Date = $_POST["date"];
    $Autorisation = $_POST["Autorisation"];
    do {
        // chek if you have empty feild
        if (empty($Industry) | empty($Generic) | empty($Date) | empty($Autorisation)) {
          
          $fail = 'All fail are requiered';
          break;
        }
        

        $sql = "INSERT INTO medicament (Industry, Generic, Date, Autorisation)". 
        "VALUES ('$Industry', '$Generic', '$Date', '$Autorisation')";

        $result = $connection->query($sql);
                // check the query if excute or not
                if (!$result) {
                    die ('not table'.$connection->$error);
        }
        // $sucesss = "succeful add a new medicamen"; 
   
    } while (false);

  //   do {
  //     if (!empty($Industry) | !empty($Generic) | !empty($Date) | !empty($Autorisation)) {
        
  //       $sucesss = 'sucesss to adding';
  //       break;
  //     }

      
  // } while (true);
  

    

  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" href="./img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Medicament</title>
</head>
<style>
  .fail{
    background-color: #ff7070;
    color: white;
  }
  .btn-close{
    color: white;
  }
  .head{
      margin-top: 2rem;
  }
  .head{
          text-align: center;  
      }
  .head div{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2rem;
    }
    .head div img{
        width: 70px;
    }
</style>
<body>
<div class="head">
    <div>
      <h1><img src="./img/logo.png" alt="">Welcome To Traid</h1>
    </div>
    <h4 >Best to Stock Medicament</h4>
</div>
<div class="title text-center" >Add   New Medicament</div>

<form class="container" method="POST">
  <?php 
     if (!empty($fail)) {

      // !empty(fail) => mean you have error message in variable
      
      
        echo 
          "
          <div class='fail container text-center fw-bolder alert alert-dismissible fade show' role='alert'>
              $fail
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
          
          ";
             
        }
        // else{
        //   echo 
        //   "
        //   <div class='alert alert-primary alert-dismissible fade show' role='alert'>
        //      $sucesss
        //     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        //   </div>
        //   ";
        // }
  
  ?>



  <div class="mb-3">
    <label for="Industry" class="form-label">Industry</label>
    <input name="industry" type="text" class="form-control">
  </div>

  <div class="mb-3">
    <label for="Generic" class="form-label">Generic</label>
    <input name="generic" type="text" class="form-control" >
  </div>

  <div class="mb-3">
    <label for="Date" class="form-label">Date</label>
    <input name="date" type="text" class="form-control" >
  </div>

  <!-- <div class="mb-3">
    <label for="Autorisation" class="form-label">Autorisation</label>
    <input name="Autorisation" type="text" class="form-control" >
  </div> -->

  <div class="mb-3">
      <label for="cars">Autorisation</label>
      <select name="Autorisation" id="cars">
        <option  value="Accept">Accept</option>
        <option value="Refuse">Refuse</option>
 
      </select>
  </div>

  
 
  <!-- <button type="submit" class="btn btn-primary"><input target="_parent" type="submit" class="text-white text-decoration-none" />Create</button> -->
  <input  target="_parent" type="submit" class="btn bg-primary text-white text-decoration-none" />
  <button type="submit" class="btn btn-danger"><a class="text-white text-decoration-none" href="/Php-Mysql-website">Back To Home Page</a></button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>