<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Chicken Chico</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Goutez la différence"/>
        <meta name="keywords" content="khebab, sandwich, pomme de terre, four"/>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css"/>
        <script src="../js/jquery-1.10.2.js"></script>
        <script src="../js/bootstrap.js"></script>
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
                    <a href="/admin/viewCat"><h4>Gestion Categorie</h4></a>
                    <a href="/admin/viewProd"><h4>Gestion Produits</h4></a>
                    <a href="/admin/deco"><h4>Deconnection</h4></a>
                </div>
            </div>
            <div class="formpage">
                <form role="form">
                    <div class="form-group">
                        <h4>AJOUTER UNE CATEGORIE :</h4>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Ajouter</button>
                    </div>
                    <hr>
                    <div class="form-group">
                        <h4 class="">MODIFIER OU SUPPRIMER UNE CATEGORIE :</h4>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Supprimer</button>
                </form>
            </div>    
        </div>
        <script>
            $(".input").mousedown(function() {
                $(this).val("").css("color", "white");
            });
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


