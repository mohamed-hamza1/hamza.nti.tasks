<?php
if($_POST){
    $num1 = $_POST['first_number'];
    $num2 = $_POST['second_number'];
    $num3 = $_POST['third_number'];

if($num1 > $num2 && $num2 > $num3 ){
    $maximum = $num1;
    $minimum = $num3;
}
elseif($num1 > $num3 && $num3 > $num2 ){
    $maximum = $num1;
    $minimum = $num2;
}
elseif($num2 > $num1 && $num1 > $num3 ){
    $maximum = $num2;
    $minimum = $num3;
}

elseif($num2 > $num3 && $num3 > $num1 ){
    $maximum = $num2;
    $minimum = $num1;
}
elseif($num3 > $num1 && $num1 > $num2 ){
    $maximum = $num3;
    $minimum = $num2;
}
elseif($num3 > $num2 && $num2 > $num1 ){
    $maximum = $num3;
    $minimum = $num1;
}
$message = "<div class='alert alert-info'>
Max Number is : $maximum <br>
Min Number is : $minimum
</div>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Max-Min</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mt-3">
          <div class="row">
              <div class="col-12">
                  <h1 class="text-dark text-center bg-secondary">Max & Min Number</h1>
              </div>
              <div class="col-12 text-center">
                  <h4>Type 3 different numbers</h4>
              </div>
              <div class="offset-4 col-4">
                  <form method="post">
                      <div class="form-group">
                        <label for="first_number">First Number</label>
                        <input type="text" name="first_number" id="first_number" class="form-control" placeholder="Enter Number Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="second_number">Second Number</label>
                        <input type="text" name="second_number" id="second_number" class="form-control" placeholder="Enter Number Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="third_number">Third Number</label>
                        <input type="text" name="third_number" id="third_number" class="form-control" placeholder="Enter Number Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <button class="btn btn-success rounded">Calculate</button>
                      </div>
                    </form>
                    <?php if(isset($message)){ echo $message;}  ?>
              </div>
          </div>
      </div>
<div class="footer">
    <marquee behavior="fixed" direction="">&copy; 2022 Mohamed Hamza - All Rights Reserved</marquee>
</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>