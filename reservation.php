<?php

ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $pdo = new PDO( //ceci me sert a me connecté a ma base de donnée
        'mysql:host=localhost;
        dbname=compte;','root', 'root', // mon adresse, le nom de la base et mes identifiants
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//pose pas de question
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')//surement quelque chose
    );

 
function executerequest($replace, $param = array())
{       //fonction pour faire une requete: param1 = remplacer les table de la base.
        //param2 = associations des élements de mon formulaire à ma table
if(!empty($param)){
foreach($param as $name=>$value){
$param[$name]=htmlspecialchars($value);
}
}//1: filtrer les caractere speciaux pour eviter les injections de code

global $pdo;// recuperer ma connection à ma base
$result = $pdo->prepare($replace);
$success = $result->execute($param);//2: éxecuté la requete
var_dump($pdo->errorInfo());
if($success){
return $result;
}else{
return false;
}//3: si ca marche: youpiiii!!!!
}   

if(!empty($_POST)){
        
    $request=executerequest("REPLACE INTO reservation VALUES (:Nom, Prenom, Date, Heures, mail, produit,)",
                            array(
                                ':Nom'      =>$_POST['Nom'],
                                ':Prenom'   =>$_POST['Prenom'],
                                ':Date'     =>$_POST['Date'],
                                ':Heures'   =>$_POST['Heurses'],
                                ':mail'     =>$_post['mail'],
                                ':produit'  =>$_post['produit'],
                                )   
    );
    debug($_POST);
}
