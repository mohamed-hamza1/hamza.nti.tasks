<?php
if($_POST){
    $loanamount = $_POST['loanamount'];
    $years = $_POST['years'];
if ($years > 3) {
    $interest = $loanamount * $years * .15;    
}elseif ($years <= 3 && $years > 0) {
    $interest = $loanamount * $years * .1;    
}elseif ($years <= 0) {
    $errors =  "<div class='alert alert-danger'>Invalid Input</div>";
}


$total = $loanamount + $interest;
$monthlypaid = $total / ($years * 12);


$message = "<div class='alert alert-info'>
Interest Amount = $interest <br>
Loan Amount After Interest = $total <br>
Monthly Paid = $monthlypaid
</div>";
}

?>



<!doctype html>
<html lang="en">
  <head>
    <title>Bank</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-12 center">
                  <h1 class="text-center bg-light">Bank</h1>
              </div>
              <div class="col-4 offset-4">
                  <form method="post" class="bg-light">
                      <legend class=" text-center"><h1>Loan Calculator</h1></legend>
                      <fieldset class="form-group text-center">
                          <label for="name">Name</label>
                          <input type="text" placeholder="Enter Your Name" name="name" value="<?php if (isset($_POST['name'])) {echo $_POST['name'];}?>">
                      </fieldset>
                      <fieldset class="form-group text-center">
                          <label for="loanamount">Loan</label>
                          <input type="text" placeholder="Enter Loan Amount" name="loanamount" value="<?php if (isset($_POST['loanamount'])) {echo $_POST['loanamount'];}?>">
                      </fieldset>
                      <fieldset class="form-group text-center">
                          <label for="years">Loan Years</label>
                          <input type="text" placeholder="Enter Numbers of Years" name="years" value="<?php if (isset($_POST['years'])) {echo $_POST['years'];}?>">
                      </fieldset>
                      <fieldset class="form-group text-center">
                          <input type="submit" class="btn btn-success">
                      </fieldset>
                  </form>
                  <?php 
                  if(isset($errors)){ echo $errors;}
                  if(isset($message) && empty($errors)){ echo $message;}  ?>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>