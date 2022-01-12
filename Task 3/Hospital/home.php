<?php
$title = 'Hospital Survey';
include 'layouts/header.php';

if ($_POST) {
  $errors = [];
  $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
  if (empty($_POST['phoneNumber'])) {
      $errors['phoneNumber'] = "<div class='alert alert-danger'>Please, Enter your Phone Number</div>";
  }else {
    header('location:review.php');
  }
  }
  
?>





  <div class="container jumbotron">
    <div class="row">
      <div class="col-12 text-center">
        <h1>Hospital Survey</h1>        
        <div class="offset-4 mt-5 col-4">
          <form method="post">
            <div class="form-group">
              <input type="phoneNumber" name="phoneNumber" maxlength="11" id="phoneNumber" class="form-control" placeholder="Enter Your Phone Number">
              <button class="btn btn-success form-control">Survey</button>
            </div>
            <?php if (isset($errors['phoneNumber'])) {
              echo $errors['phoneNumber'];
            }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
  


  <?php
  include 'layouts/footer.php';

  ?>