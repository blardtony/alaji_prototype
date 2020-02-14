<?php
require('../index.php');

function averageCriteria(array $array)
  {
    $nbElements = count($array);
    $sum = 0;
    $coef = 0;
    for ($i=0; $i < $nbElements; $i++) {
      $sum = $sum + ($array[$i][0] * $array[$i][1]);
      $coef = $coef + $array[$i][1];
    }
    return $sum/$coef;
  }



  function acquis($moyenne)
  {
    if ($moyenne>=0.5) {
      $response = "Acquis";
    }else {
      $response = "Non acquis";
    }
    return $response;
  }
