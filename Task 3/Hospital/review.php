<?php
$title = 'Review';
include 'layouts/header.php';
// include 'middleware/auth.php';



if ($_POST) {
  $errors = [];
  $_SESSION = $_POST;
  $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
  if (empty($_SESSION['q1'])) {
  $errors['q'] = "<div class = 'alert alert-danger'>Please, Complete Answers</div>";
  }
  if (empty($_SESSION['q2'])) {
    $errors['q'] = "<div class = 'alert alert-danger'>Please, Complete Answers</div>";
  }
  if (empty($_SESSION['q3'])) {
    $errors['q'] = "<div class = 'alert alert-danger'>Please, Complete Answers</div>";
  }
  if (empty($_SESSION['q4'])) {
    $errors['q'] = "<div class = 'alert alert-danger'>Please, Complete Answers</div>";
  }
  if (empty($_SESSION['q5'])) {
    $errors['q'] = "<div class = 'alert alert-danger'>Please, Complete Answers</div>";
  }
  if (empty($errors)) {
    // print_r($_SESSION);die;
    header('location:result.php');die;
  }
}

?>

<div class="container jumbotron">
    <div class="row">
      <div class="col-12 text-center">
        <h1>Hospital Survey</h1>
        <form method="post">
            <table class="table table-striped table-hover mt-5">            
              <thead>
                <tr>
                    <th class="text-left">Questions ?</th>
                    <th class="text-center">Bad</th>
                    <th class="text-center">Good</th>
                    <th class="text-center">Very Good</th>
                    <th class="text-center">Excellent</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <th class="text-left">Are you satisfied with the level of cleanliness ?</th>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q1" value = "Bad"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q1" value = "Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q1" value = "Very Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q1" value = "Excellent"></label>
                      </div>
                    </td>
                </tr>

                <tr>
                    <th class="text-left">Are you satisfied with the service prices ?</th>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q2" value = "Bad"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q2" value = "Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                      <label><input type="radio" name="q2" value = "Very Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q2" value = "Excellent"></label>
                      </div>
                    </td>
                </tr>

                <tr>
                    <th class="text-left">Are you satisfied with the nursing services ?</th>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q3" value = "Bad"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q3" value = "Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q3" value = "Very Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q3" value = "Excellent"></label>
                      </div>
                    </td>
                </tr>

                <tr>
                    <th class="text-left">Are you satisfied with the level  of the doctor ?</th>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q4" value = "Bad"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q4" value = "Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q4" value = "Very Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q4" value = "Excellent"></label>
                      </div>
                    </td>
                </tr>
                
                <tr>
                    <th class="text-left">Are you satisfied with the calmness in the hospital ?</th>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q5" value = "Bad"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q5" value = "Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q5" value = "Very Good"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="radio">
                        <label><input type="radio" name="q5" value = "Excellent"></label>
                      </div>
                    </td>
                </tr>
              </tbody>              
            </table>            
             <button class="btn btn-success col-6 form-control">Result</button>
             <label class = "col-6">
              <?php if (isset($errors)) {
              echo $errors['q']; }
              ?>
            </label>
           </form>
      </div>
    </div>
  </div>
      
  <?php
  include 'layouts/footer.php';

  ?>