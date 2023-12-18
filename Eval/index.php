<?php
//LE FICHIER CONTROLLER : LOGIQUE + TRAITEMENT DU CODE ET DES DONNEES

    //Import des ressources
include './utils/bdd.php';
include './model/model_article.php';

$message = "";
$messageArticle = "";


//Vérifie si le formulaire d'ajout d'article a été envoyé

if(isset($_POST['ajoutarticle'])){
    //SECURITE ETAPE 1 : vérifie les données, si elles sont vide ou non
    if(isset($_POST['nom_article']) && !empty($_POST['nom_article']) && isset($_POST['prix_article']) && !empty($_POST['prix_article'])){
       //SECURITE ETAPE 2 : nettoyage
        $nameArticle = htmlentities(strip_tags(trim($_POST['nom_article'])));
        $prixArticle = $_POST['prix_article'];

        //SECURITE ETAPE 3 : vérifie le format des données
        //-> ici on a que des strings, donc pas besoin de vérification

         //J'APPELLE LA REQUETE POUR ENREGISTRER MON ARTICLE (fonction se trouvant dans le model)
        $message = ajoutarticle($nameArticle, $prixArticle, $bdd);
    }
}

//J'APPELLE LA REQUETE POUR AFFICHER LA LISTE DES ARTICLES (fonction se trouvant dans le mdoel)

$data = ShowArticle($bdd);

// Boucle qui affiche sur la page l'ensemble des Articles.
foreach($data as $article){
    $messageArticle = $messageArticle."<article>
    <p>Article : {$article['nom_article']} | {$article['prix_article']}</p>
</article>";
}

 //JE DIS A LA VUE CE QU'ELLE DOIT AFFICHER. Je transmets les infos grâce à $message et $showArticle
include "./view/view_article.php";

?>