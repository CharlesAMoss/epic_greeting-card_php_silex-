<?php

class Car
  {
    private $make_model;
    private $price;
    private $miles;
    private $image_path;
    function __construct($make_model, $price, $miles, $image_path)
    {
        $this->model = $make_model;
        $this->cost = $price;
        $this->mileage = $miles;
        $this->image = $image_path;
    }
    function setPrice($new_price)
    {
        $float_price = (float) $new_price;
        if ($float_price != 0){
          $formatted_price = number_format($float_price, 2);
          $this->cost = $formatted_price;
        }
    }
    function setModel($new_model)
    {
          $this->model = $new_model;
    }
    function setMileage($new_miles)
    {
          $this->mileage = $new_miles;
    }
    function setImage($new_image)
    {
          $this->image = $new_image;
    }
    function getPrice()
    {
          return $this->cost;
    }
    function getModel()
    {
          return $this->model;
    }
    function getMileage()
    {
          return $this->miles;
    }
    function getImage()
    {
          return $this->image;
    }
  }

?>
