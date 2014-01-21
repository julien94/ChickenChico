<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Chicken Chico</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Goutez la différence"/>
        <meta name="keywords" content="khebab, sandwich, pomme de terre, four"/>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <script src="jquery/jquery-1.10.2.js"></script>
    </head>
    <body>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-46720288-1', 'chickenchico.com');
            ga('send', 'pageview');

        </script>
        <div id="container">
            <div id="header">
                <img src="image/logo.png" class="logo">
                <div id="menu">
                    <a href="/accueil"><h4>Accueil</h4></a>
                    <a href="/carte"><h4>Nos menus</h4></a>
                    <a href="/contact"><h4>Nous contacter</h4></a>
                </div>
            </div>
            <div id="liste">
                <div class="formprod">
                <h1>Ajouter un produit</h1>
                <form>
                    <div>Titre</div>
                    <input type="text" class="addprod">
                    <div>Description</div>
                    <div><textarea name="descri" class="addprod"></textarea></div>
                    <div>Prix Unité</div>
                    <input type="text" size="2" name="pue" class="addprod">                    
                    <div>Prix Menu</div>
                    <input type="text" size="2" name="pme" class="addprod">
                    <div>Photo</div>
                    <input type="text" name="pue" class="addprod">
                    <div>Categorie</div>
                    <select class="addprod">
                        <option>sandwich</option>
                        <option>boisson</option>
                        <option>dessert</option>
                    </select>
                </form>
                </div>
            </div>
        </div>
        <script>
            $("#menu h4").mouseover(function(){$(this).css("box-shadow", "1px 1px 20px rgba(255, 255, 0, 0.5)");});
            $("#menu h4").mouseout(function(){$(this).css("box-shadow", "0px 0px 15px rgba(0, 100, 255, 0.5)");});
        </script>
    </body>
</html>
<?php


