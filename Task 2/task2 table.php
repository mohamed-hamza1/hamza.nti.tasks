<?php
// dynamic table
// dynamic rows
// dynamic columns
// check if gender of user == m ==> male
// check if gender of user == f ==> female


// collection => laravel => array of objects
$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        'emali' => '.......@gmail.com',
        'phone' => '+2010********',
        'fav. foods' => ['0', '1', '2']
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'emali' => '.......@gmail.com',
        'phone' => '+2010********',
        'fav. foods' => ['3', '4'],
    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'emali' => '.......@gmail.com',
        'phone' => '+2010********',
        'fav. foods' => ['5', '6','7'],
    ],
    (object)[
        'id' => 4,
        'name' => 'hamza',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'emali' => '.......@gmail.com',
        'phone' => '+2010********',
        'fav. foods' => ['8', '9'],
    ],
];

$table = "<table class='table'>
    <thead>";
        foreach ($users[0] as $property => $value) {
            $table .= "<th>$property</th>";
        }
$table .=    "</thead>
    <tbody>";
        foreach ($users as $index => $user) {
            $table .= "<tr>";
                foreach ($user as $property => $value) {
                    $table .= "<td>";
                    if (gettype($value) == 'array' || gettype($value) == 'object') {
                        foreach ($value as $k => $v) {
                          if ($property == 'gender') {
                              if ($v == 'm') {
                                  $v = 'male';
                              }else {
                                $v = 'female';
                           }
                          }
                        $table .= $v . ', ';
                        }
                    }else {
                        $table .= $value;
                    }
                    $table .= "</td>";
                }
            
            $table .= "</tr>";
        }
$table .=    "</tbody>
</table>";


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Table</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?= $table ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>