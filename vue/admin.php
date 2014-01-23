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
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

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
            <div class="formpage">
                <h1><center>CATEGORIES</center></h1>
                <form class="formcat">
                    <div class="add">
                        <div class="bold">AJOUTER UNE CATEGORIE :</div>
                        <input class="input" type="text" name="">
                        <input class="submit" type="submit" value="Ajouter">
                    </div>
                    <div>
                        <div class="bold">MODIFIER / SUPPRIMER UNE CATEGORIE :</div>
                        <select name="categoryName" class="input">
                        <option></option>
                        // Affiche la liste des categories
                        </select>
                        <input type="submit" value="Modifier" name="updcat">
                        <input type="submit" value="Supprimer" name="delcat">
                    </div>    
                </form>
                <hr>
                <h1><center>PRODUITS</center></h1>
                <form class="formprod">
                    <div class="bold">AJOUTER UN PRODUIT :</div>
                    <div><input type="text" name="productName" value="Nom" size="20" class="input"></div>
                    <div><textarea name="descri" class="input">Description</textarea></div>
                    <div><input type="text" size="20" name="pue" class="input" value="Prix Unité"></div>                    
                    <div><input type="text" size="20" name="pme" class="input" value="Prix Menu"></div>
                    <div><input type="text" name="pue" value="Photo" class="input"></div>
                    <div><select class="input">
                        <option>Categorie   </option>
                        <option>sandwich</option>
                        <option>boisson</option>
                        <option>dessert</option>
                        </select></div>
                </form>
            </div>
        </div>
        <script>
            $("#menu h4").mouseover(function() {
                $(this).css("box-shadow", "1px 1px 20px rgba(255, 255, 0, 0.5)");
            });
            $("#menu h4").mouseout(function() {
                $(this).css("box-shadow", "0px 0px 15px rgba(0, 100, 255, 0.5)");
            });
        </script>
    </body>
</html>
<?php


