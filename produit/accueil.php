<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles-vue.css">
  <title>acceuil</title>
</head>
<body>
  
<div id="app">
<header>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
     <a class="navbar-brand" @click="choose('accueil')" v-if="actualPage !== 'accueil'">Accueil</a>
       <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav" v-if="actualPage !== 'accueil' !== 'accueil'" v-for="button in buttonsfilter">
           <li v-if="actualPage !== button.name" class="nav-item">
            <!---les buttons-->
          <a class="nav-link" @click="choose(button.name); deletebutton(button);" >Voir les {{button.name}}</a>
            <!--- syntaxe Mustache --->
           </li>
         </ul>
         <div class="nav-item"><a class="nav-link"v-if="actualPage !== 'accueil' && actualPage !== 'formulaire'" @click="choose('formulaire')">terminer ma selection</a>  
         </div>
       </div>
    </div>
  </nav>
</header>
      <accueil v-if="actualPage == 'accueil'"></accueil>
      <div v-if="actualPage !== 'accueil'">
        <div id="ici" class="container">
          <div class="row">
          <div class="col-8">
            <mug  v-if="actualPage == 'mug'"></mug>
            <pull v-if="actualPage == 'pull'"></pull>
            <sac  v-if="actualPage == 'sac'"></sac>
            <formulaire v-if="actualPage == 'formulaire'"></formulaire>
          </div>
    </div>
</div>

</body>
<script src="../produit/Vue.js"></script>
</html>
