<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
  public function index()
  {
    // initialize a matrix
    $matrix = array(array(1, 2, 3), array(4, 5, 6), array(7, 8, 9));

    // print the original matrix
    echo "Original matrix:<br>";
    foreach ($matrix as $row) {
      echo implode(" ", $row) . "<br>";
    }

    // transpose the matrix
    $transposed_matrix = array();
    foreach ($matrix as $i => $row) {
      foreach ($row as $j => $value) {
        $transposed_matrix[$j][$i] = $value;
      }
    }

    // print the transposed matrix
    echo "Transposed matrix:<br>";
    foreach ($transposed_matrix as $row) {
      echo implode(" ", $row) . "<br>";
    }
  }
}
