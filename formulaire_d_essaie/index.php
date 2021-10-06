
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $pdo = new PDO( //ceci me sert a me connecté a ma base de donnée
        'mysql:host=localhost;
        dbname=phpexo;','root', 'root', // mon adresse, le nom de la base et mes identifiants
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//pose pas de question
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')//surement quelque chose
    );

    
    
    function executerequest($replace, $param = array()){//fonction pour faire une requete: param1 = remplacer les table de la base.
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
        
        $request=executerequest("REPLACE INTO oui VALUES (:nom, :prenom, :mail, :telephone, :id)",
                                array(
                                    ':nom'      =>$_POST['nom'],
                                    ':prenom'   =>$_POST['prenom'],
                                    ':mail'     =>$_POST['mail'],
                                    ':telephone'=>$_POST['telephone'],
                                    ':id'       =>0
                                )
        );
        debug($_POST);
    }
    
    
    function debug ($param){
        echo '<pre>';
        var_dump($param);
        echo '</pre>';
    }//facultatif: c'est juste pour voir un beau tableau de ce que j'envoie
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>reservation des goodies</h1>
    <form action="" method="post">
        <input id="prenom" type="text" name="prenom" placeholder="prenom">
        <input type="text" name="nom" placeholder="nom">
        <input type="email"name="mail" placeholder="mail@info.fr">
        <input type="text" name="telephone">
        <input type="hidden" name="id">
        <button type="submit">envoyer</button>
    </form>
</body>
</html>