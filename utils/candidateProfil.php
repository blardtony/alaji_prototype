<?php
require('../index.php');


function getInfosUser($id) //Obtenir les informations d'un utiliser en fonction de l'id
{
  $token = $_ENV['TOKEN'];
  $domainName = $_ENV['DOMAINNAME'];
  $format = $_ENV['FORMAT'];
  $params = "&criteria[0][key]=id&criteria[0][value]=";
  $functionName = "core_user_get_users";

  $url = $domainName . $format . $token . '&wsfunction=' . $functionName . $params . $id;

  return $response = json_decode(file_get_contents($url));
}

//
$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$idCandidate = array_pop($url);

$infos = getInfosUser($idCandidate);

$fullName = $infos->users[0]->fullname;
$email = $infos->users[0]->email;
$imageProfile = $infos->users[0]->profileimageurl;
