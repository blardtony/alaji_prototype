<?php
require('../index.php');


function getAll() // Obtenir les canddiats en fonctions du cours, Ici le quiz CLEA.
{
  $token = $_ENV['TOKEN'];
  $domainName = $_ENV['DOMAINNAME'];
  $format = $_ENV['FORMAT'];
  
  $params = "&courseid=41";
  $functionName = "core_enrol_get_enrolled_users";

  $url = $domainName . $format . $token . '&wsfunction=' . $functionName . $params;

  return $response = json_decode(file_get_contents($url));
}
$datas = getAll();
