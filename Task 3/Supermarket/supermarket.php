<?php

if (isset($_POST['productsnumber'])) {
    
    $table =  "<table class='table col-12'>
                    <thead>                        
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantities</th>                        
                    </thead>
                    <tbody>";
                    for ($i=0 ; $_POST['productsnumber'] > $i ; $i++) { 
                        $table .= "<tr>
                        <td> <input type='text' class='form-control'></td>
                        <td><input type='number' class='form-control' name = 'price'></td>
                        <td><input type='number' class='form-control' name = 'quantities'></td>
                        </tr>";
                    }
            $table .= "<tr>
                            <td colspan=3>
                                <button class='btn btn-success form-control' name='receipt'>Get Receipt</button>
                            </td>
                       </tr>
                    </tbody>
            </table>";
}
if(isset($POST['receipt'])){
    print_r($_POST);
}

?>





<!doctype html>
<html lang="en">
  <head>
    <title>Supermarket</title>
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
                  <h1 class="text-center bg-light">Supermarket</h1>
              </div>
              <div class="col-6 offset-3">
                  <form method="post" class="bg-light">
                      <legend class=" text-center"><h1>Online Purchase</h1></legend>
                      <fieldset class="form-group text-center">
                          <label for="name">Customer Name</label>
                          <input type="text" placeholder="Enter Your Name" name="name" value="<?php if (isset($_POST['name'])) {echo $_POST['name'];}?>">
                      </fieldset>
                      <fieldset class="form-group text-center">
                          <label for="City">Select City</label>
                          <select name="city" id="city">
                              <option value="cairo" <?php if (isset($_POST['City']) && $_POST['City'] == 'cairo') {echo 'selected';}?> name="cairo">Cairo</option>
                              <option value="giza" <?php if (isset($_POST['City']) && $_POST['City'] == 'giza') {echo 'selected';}?> name="giza">Giza</option>
                              <option value="alex" <?php if (isset($_POST['City']) && $_POST['City'] == 'alex') {echo 'selected';}?> name="alex">Alex</option>
                              <option value="other" <?php if (isset($_POST['City']) && $_POST['City'] == 'other') {echo 'selected';}?> name="other">Other</option>
                          </select>                    
                      </fieldset>
                      <fieldset class="form-group text-center"> 
                          <label for="productsnumber">Number of Products</label>
                          <input type="number" placeholder="Enter Products Numbers" name="productsnumber" value="<?php if (isset($_POST['productsnumber'])) {echo $_POST['productsnumber'];}?>">
                      </fieldset>
                      <fieldset class="form-group text-center">                      
                          <button class="btn btn-primary" name="proceed_to_buy">Proceed to Buy</button>
                      </fieldset>
                  </form>
                  
                  <?php 
                  if(isset($table)){ echo $table;}
                  ?>
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