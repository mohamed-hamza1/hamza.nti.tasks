<?php
if($_POST){
    $num = $_POST['number'];
    $root = $_POST['root'];

$result = pow($num , (1/$root));
$message = "<div class='alert alert-primary'>
The Result is : $result
</div>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Get Root</title>
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
                  <h1 class="text-dark text-center bg-info">Get Root</h1>
              </div>
              <div class="col-12 text-center">
                  <h4>Input Your Number and Root</h4>
              </div>
              <div class="offset-4 col-4">
                  <form method="post" class="mt-4">
                      <div class="form-group">
                        <label for="number">Number</label>
                        <input type="text" name="number" id="number" class="form-control" placeholder="Enter Number Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="root">Root</label>
                        <input type="text" name="root" id="root" class="form-control" placeholder="Enter Root Here" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <button class="btn btn-danger rounded">Caculate</button>
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