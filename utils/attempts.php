<?php
require('../index.php');

//Récupérer tous les tentatives en fonction de l'id d'un user
function getAttempsUser($id)
{
    //Récupérer le token, le nom de domaine et le format depuis le .env
    $token = $_ENV['TOKEN'];
    $domainName = $_ENV['DOMAINNAME'];
    $format = $_ENV['FORMAT'];

    $params = '&quizid=202&userid=';
    $functionName = 'mod_quiz_get_user_attempts';

    $url = $domainName . $format . $token . '&wsfunction=' . $functionName . $params.$id;
    return $response = json_decode(file_get_contents($url));
}

//Obtenir l'id du candidats en le récupérant dans l'url.
$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$idCandidate = array_pop($url);

$infoAttempts = getAttempsUser($idCandidate);
$idAttempt = end($infoAttempts->attempts)->id;


//Récupérer les informations sur la tentatives en fonction de de l'id de la dernière tentative.
function getAttempsReview($id)
{
    $token = $_ENV['TOKEN'];
    $domainName = $_ENV['DOMAINNAME'];
    $format = $_ENV['FORMAT'];

    $params = '&attemptid=';
    $functionName = 'mod_quiz_get_attempt_review';

    $url = $domainName . $format . $token . '&wsfunction=' . $functionName . $params.$id;
    return $response = json_decode(file_get_contents($url));

}

$reviewAttempt = getAttempsReview($idAttempt);
