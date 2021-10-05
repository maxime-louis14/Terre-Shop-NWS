<?php

require_once "tools.php";//recuperer le contenu du fichier tools

if (!empty($_POST)) {//va chercher dans la table l'entré dont l'email est égale à l'email envoyé
    $check = executerequest("SELECT * FROM inscription WHERE email = :email", array(':email' => $_POST['email']));
    if (!empty($check) && $check->rowCount() > 0) {//verifie si une entré existe deja
        echo 'cet adresse mail est déja prise';
    } else {
        $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $request = executerequest(
            "REPLACE INTO inscription VALUES (:id, :pseudo, :email, :password, NOW())",
            array(
                ':id'       => 0,
                ':pseudo'   => $_POST['pseudo'],
                ':email'    => $_POST['email'],
                ':password' => $mdp
            )
        );
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>inscription</title>
</head>

<body>
    <form action="" method="post">
        <input id="pseudo" type="text" name="pseudo" placeholder="pseudo">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password">
        <button type="submit">s'inscrire</button>
    </form>
</body>

</html>