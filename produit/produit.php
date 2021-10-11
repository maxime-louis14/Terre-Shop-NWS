<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$pdo = new PDO( //ceci me sert a me connecté a ma base de donnée
    'mysql:host=localhost;
        dbname=compte;',
    'root',
    'root', // mon adresse, le nom de la base et mes identifiants
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //pose pas de question
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ) //surement quelque chose
);


function executerequest($replace, $param = array())
{       //fonction pour faire une requete: param1 = remplacer les table de la base.
    //param2 = associations des élements de mon formulaire à ma table
    if (!empty($param)) {
        foreach ($param as $name => $value) {
            $param[$name] = htmlspecialchars($value);
        }
    } //1: filtrer les caractere speciaux pour eviter les injections de code

    global $pdo; // recuperer ma connection à ma base
    $result = $pdo->prepare($replace);
    $success = $result->execute($param); //2: éxecuté la requete
    var_dump($pdo->errorInfo());
    if ($success) {
        return $result;
    } else {
        return false;
    } //3: si ca marche: youpiiii!!!!
}

if (!empty($_POST)) {//va chercher dans la table l'entré dont l'email est égale à l'email envoyé
    $check = executerequest("SELECT * FROM produit WHERE email = :email", array(':email' => $_POST['email']));
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
    <link rel="stylesheet" href="styles-vue.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>
<header>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../connectioninscription/accueil.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       
        <li class="nav-item">
          <a class="nav-link" href="../connectioninscription/connexion.php">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../connectioninscription/inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Resvation/reservation.php">Réservé</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

<body>

    <div class="photo">
        <img src="../image/TerreShop/mug-blanc.jpg" alt="Mug blanc">
    </div>

    <div class="row">
        <div class="col-2 text-truncate">
            Praeterea iter est quasdam res quas ex communi.
        </div>
    </div>

 <div class="wapper">
    <form action="" method="post" id="formulaire">
        <label for="couleur">Couleur</label>
        <br>
        <select name="couleur" class="form-select w-25" aria-label="Default select example"> placeholder="mot de passe">
            <option value="rouge">Rouge</option>
            <option value="bleu">Bleu</option>
            <option value="blanc">Blanc</option>
        </select>
        <label for="Guildes">Guildes</label>
        <br>
        <select name="guildes" class="form-select w-25" aria-label="Default select example"> placeholder="mot de passe">
            <option value="Feu">Feu</option>
            <option value="Eau">Bleu</option>
            <option value="Terre">Terre</option>
            <option value="Air">Air</option>
        </select>
    
        <br>
        <label for="Sexe">Sexe</label>
        <select name="Sexe" class="form-select w-25" aria-label="Default select example"> placeholder="mot de passe">
            <option value="F">F</option>
            <option value="M">M</option>
        </select>
        <br>
        <label for="prix"></label> 
        <input type="number" min="0" max="100" name="prix" placeholder=""><p>€</p>
        </select>
        <br>
        <button type="submit" class="btn btn-outline-primary">ajouter</button>
    </form>

 </div>

</body>

</html>