<?php
$title = 'Result';
include 'layouts/header.php';


$marks = [
  'Bad' => 0,
  'Good' => 3,
  'Very Good' => 5,
  'Excellent' => 10
];


  foreach ($marks as $evaluate => $value) {
    if ($_SESSION['q1'] == $evaluate) {
      $q1 = $value;
    }
   }
   foreach ($marks as $evaluate => $value) {
     if ($_SESSION['q2'] == $evaluate) {
       $q2 = $value;
     }
    }
    foreach ($marks as $evaluate => $value) {
     if ($_SESSION['q3'] == $evaluate) {
       $q3 = $value;
     }
    }
    foreach ($marks as $evaluate => $value) {
     if ($_SESSION['q4'] == $evaluate) {
       $q4 = $value;
     }
    }
    foreach ($marks as $evaluate => $value) {
     if ($_SESSION['q5'] == $evaluate) {
       $q5 = $value;
     }
    }
   $totalMarks = $q1 + $q2 + $q3 + $q4 + $q5;
   
   if ($totalMarks < 25) {
     $message = "<div class='alert alert-danger'>We are sorry and will call you on this phone </div>";
     $message .= $_SESSION['phoneNumber'];
     $totalReview = "<div>Bad</div>";
   }
   if ($totalMarks == 25) {
     $message = "<div class='alert alert-success'>Thank You</div>";
     $totalReview = "<div>Good</div>";
   }
   if ($totalMarks > 25 && $totalMarks < 40) {
     $message = "<div class='alert alert-success'>Thank You</div>";
     $totalReview = "<div>Very Good</div>";
   }
   if ($totalMarks >= 40 && $totalMarks <= 50) {
     $message = "<div class='alert alert-success'>Thank You</div>";
     $totalReview = "<div>Excellent</div>";
   }

?>

<div class="container jumbotron">
    <div class="row">
      <div class="col-12 text-center">
        <h1>Hospital Survey</h1>
        <form method="post" action="result.php">
            <table class="table table-striped table-hover mt-5">            
              <thead>
                <tr>
                    <th class="text-left">Questions ?</th>
                    <th class="text-center">Review</th>                    
                </tr>
              </thead>
              <tbody>
                <tr>
                    <th class="text-left">Are you satisfied with the level of cleanliness ?</th>
                    <td class="text-center col-4">
                      <label><?php if (isset($_SESSION['q1'])) {
                        echo $_SESSION['q1'];
                      } ?></label>
                    </td>
                </tr>

                <tr>
                    <th class="text-left">Are you satisfied with the service prices ?</th>
                    <td class="text-center col-4">
                      <label><?php if (isset($_SESSION['q2'])) {
                        echo $_SESSION['q2'];
                      } ?></label>
                    </td>
                </tr>

                <tr>
                    <th class="text-left">Are you satisfied with the nursing services ?</th>
                    <td class="text-center col-4">
                      <label><?php if (isset($_SESSION['q3'])) {
                        echo $_SESSION['q3'];
                      } ?></label>
                    </td>
                </tr>

                <tr>
                    <th class="text-left">Are you satisfied with the level  of the doctor ?</th>
                    <td class="text-center col-4">
                      <label><?php if (isset($_SESSION['q4'])) {
                        echo $_SESSION['q4'];
                      } ?></label>
                    </td>
                </tr>

                <tr>
                    <th class="text-left">Are you satisfied with the calmness in the hospital ?</th>
                    <td class="text-center col-4">
                      <label><?php if (isset($_SESSION['q5'])) {
                        echo $_SESSION['q5'];
                      } ?></label>
                    </td>
                </tr>
              </tbody>
              <tfoot>                
                <tr class="bg-info">
                    <th class="text-left">Total Review</th>
                    <td class="text-center col-4">
                      <label><?php if (isset($totalReview)) {
                        echo $totalReview;
                      } ?></label>
                    </td>
                </tr>
              </tfoot>              
            </table>
           </form>
           <?php if(isset($message)){ echo $message; } ?>
      </div>
    </div>
  </div>
      




<?php
  include 'layouts/footer.php';

?>