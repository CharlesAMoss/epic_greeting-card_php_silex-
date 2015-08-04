<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    $app = new Silex\Application();

    $app->get("/", function() {
      return "
      <!DOCTYPE html>
<html>
  <head>

    <title> Pick your price dealership </title>

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css'>
    <style>
      h1 {
        text-align: center;
      }
    </style>


  </head>
  <body>
    <header class='page-header'>

        <h1>Stop Walking today!</h1>

    </header>

    <div class='container'>

    <form action='/car'>

        <div class='form-group' >
          <label for='price'>Max Price:</label>
          <input id='price' name='price' type='number' class='form-control' >
        </div>
        <div class='form-group'>
          <label for='miles'>Max Miles:</label>
          <input id='miles' name='miles' type='number' class='form-control' >
        </div>

        <button type='submit' class='btn btn-default' value='submit'>Submit</button>

      </form>

    </div>

  </body>
</html>
        ";
    });

    $app->get("/car", function() {
      $honda = new Car("Honda", 2000.00, 200000, "image/honda.jpg");
      $ford = new Car("Truck", 30000.00, 30, "image/ford.jpg");
      $toyoda = new Car("4 door", 14000.00, 60000, "image/yoda.jpg");
      $cars = array($honda, $ford, $toyoda);

      $cars_matching_search = array();
      foreach ($cars as $car) {
        if ($car->cost < $_GET["price"] && $car->mileage < $_GET["miles"]) {
          array_push($cars_matching_search, $car);
        }
      }

    if ($cars_matching_search == array()) {
      $output = "";
      $output = $output . "<h1>Find another car dealer</h1>";

      return $output;
    } else {
      foreach ($cars_matching_search as $car) {
        $car_image = $car->getImage();
        $car_price = $car->getPrice();
        $car_model = $car->getModel();
        $car_mileage = $car->getMileage();
        $outputs = "";
        $outputs = $outputs . "<h2>" . $car->model . "</h2>
        <div>
          <img src" . $car->image  . ">
        </div>
        <ul>
          <li> $" . $car->cost . "</li>
          <li> Miles:" . $car->mileage . " </li>
        </ul>";

        return $outputs;
      }
    }
    });

    return $app;
?>
