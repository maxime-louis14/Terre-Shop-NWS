<?php
require_once "tools.php";
if ($_POST) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "l'email et/ou le mot de passe est vide";
    } else {
        $check = executerequest(//va chercher dans la table l'entré dont l'email est égale à l'email envoyé
            "SELECT * FROM inscription WHERE email = :email",
            array(
                ':email' => $_POST['email']
            )
        );
        if ($check->rowCount() == 1) {//verifie bhbbbbbsi une entré existe
            $member = $check->fetch(PDO::FETCH_ASSOC);//convertie cette entré en tableau à parcourir
            if (password_verify($_POST['password'], $member['password'])) {//déhash le mot de passe
                header('Location:accueil.php');
                // or die();
                  exit();
                //redirection permanente                
                $_SESSION["membre"] = $member;//créer une session pour la personne connecter ^^
                var_dump($_SESSION);
            }
            else{
                echo 'vos identifiants sont incorrect';
            }
        }
    }
}
// si la conextion 



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>connection</title>
</head>

    <form action="" method="post">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="mot de passe">
        <button type="submit">se connecter</button>
    </form>
</body>

</html>