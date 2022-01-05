<?php
if($_POST){
  $physics = $_POST['physics'];
  $chemistry = $_POST['chemistry'];
  $biology = $_POST['biology'];
  $mathematics = $_POST['mathematics'];
  $computer = $_POST['computer'];




$total = $physics + $chemistry + $biology + $mathematics + $computer;
$percentage = ($total/250)*100;

if($percentage >= 90 && $percentage <= 100){
  $message = "<div class='alert alert-success'>
  <ul>
    <li>Total Degree : $total</li>
    <li>Percentage : $percentage <b>%</b></li>
    <li>Your Result is : Grade A</li>
  </ul>
  </div>";
}
elseif($percentage >= 80 && $percentage < 90){
  $message = "<div class='alert alert-success'>
  <ul>
  <li>Total Degree : $total</li>
  <li>Percentage : $percentage <b>%</b></li>
  <li>Your Result is : Grade B</li>
</ul>
</div>";
}
elseif($percentage >= 70 && $percentage < 80){
  $message = "<div class='alert alert-success'>
<ul>
  <li>Total Degree : $total</li>
  <li>Percentage : $percentage <b>%</b></li>
  <li>Your Result is : Grade C</li>
</ul>
</div>";
}elseif($percentage >= 60 && $percentage < 70){
  $message = "<div class='alert alert-success'>
  <ul>
    <li>Total Degree : $total</li>
    <li>Percentage : $percentage <b>%</b></li>
    <li>Your Result is : Grade D</li>
  </ul>
  </div>";
}
elseif($percentage >= 40 && $percentage < 60){
  $message = "<div class='alert alert-success'>
  <ul>
    <li>Total Degree : $total</li>
    <li>Percentage : $percentage <b>%</b></li>
    <li>Your Result is : Grade E</li>
  </ul>
  </div>";
}
elseif($percentage < 40){
  $message = "<div class='alert alert-danger'>
  <ul>
    <li>Total Degree : $total</li>
    <li>Percentage : $percentage <b>%</b></li>
    <li>Your Result is : Grade F</li>
  </ul>
  </div>";
}
if($physics > 50 || $chemistry > 50 || $biology > 50 || $mathematics > 50 || $computer > 50){
  $message = "<div class='alert alert-warning'>Invalid Input</div>";
}
} 
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Degree Calc</title>
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
                  <h1 class="text-dark text-center bg-info">Calculate Your Degree</h1>
              </div>
              <div class="col-12 text-center">
                  <h4>input your degree</h4>
              </div>
              <div class="offset-4 col-4">
                  <form method="post" class="mt-4">
                      <div class="form-group">
                        <label for="physics">Physics</label>
                        <input type="text" name="physics" id="physics" class="form-control" placeholder="Enter Your Degree Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="chemistry">Chemistry</label>
                        <input type="text" name="chemistry" id="chemistry" class="form-control" placeholder="Enter Your Degree Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="biology">Biology</label>
                        <input type="text" name="biology" id="biology" class="form-control" placeholder="Enter Your Degree Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="mathematics">Mathematics</label>
                        <input type="text" name="mathematics" id="mathematics" class="form-control" placeholder="Enter Your Degree Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="computer">Computer</label>
                        <input type="text" name="computer" id="computer" class="form-control" placeholder="Enter Your Degree Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <button class="btn btn-primary rounded">Calculate</button>
                      </div>
                    </form>
                    <?php if(isset($message)){ echo $message;} ?>
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