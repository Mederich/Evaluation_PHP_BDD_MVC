<?php
    function ajoutarticle($nomArticle, $prixArticle, $bdd){
        try{
            //ETAPE 2 : Préparer la requête
            $req=$bdd->prepare('INSERT INTO article (nom_article, prix_article) VALUES(?, ?)');

            //ETAPE 3 : Binding de Paramètre
            $req->bindParam(1, $nomArticle, PDO::PARAM_STR);
            $req->bindParam(2, $prixArticle, PDO::PARAM_STR);

            //ETAPE 4 : Exécution de la requête
            $req->execute();

            //ETAPE 5 : J'envoie le message de confirmation au Controler
            return "L'article $nomArticle a été ajouté avec succès.";

        }catch(Exception $error){
            //J'envoie le message d'erreur au Controler
            return $error->getMessage();
        }
    }

    function ShowArticle($bdd){
        try{
            //ETAPE 2 : Préparer la requête
            $req=$bdd->prepare('SELECT nom_article, prix_article FROM article');

            //ETAPE 3 : Binding de Paramètre
            $req->execute();

            //ETAPE 4 : Exécution de la requête
            $data = $req->fetchAll();

            //ETAPE 5 : J'envoie le message de confirmation au Controler
            return $data;

        }catch(Exception $error){
            //J'envoie le message d'erreur au Controler
            return $error->getMessage();
        }
    }
?>