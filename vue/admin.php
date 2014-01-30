<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Chicken Chico</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Goutez la différence"/>
        <meta name="keywords" content="khebab, sandwich, pomme de terre, four"/>
        <link rel="stylesheet" href="<?php echo (ROOTHTML) ?>../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo (ROOTHTML) ?>../css/bootstrap.css" type="text/css"/>
        <script src="<?php echo (ROOTHTML) ?>../js/jquery-1.10.2.js"></script>
        <script src="<?php echo (ROOTHTML) ?>../js/bootstrap.js"></script>
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
                <img src="<?php echo (ROOTHTML) ?>../image/logo.png" class="logo">
                <div id="menu">
                    <a href="/admin/option"><h4>Gestion Categorie / Produit</h4></a>
                    <a href="/admin/deco"><h4>Deconnection</h4></a>
                </div>
            </div>
            <div class="formpage">
            <?php
            if(!empty($this->data[0])){
                echo '<h3>'.$this->data[0]->getTitre().'</h3>';
                echo '<form role="form"'.$this->data[0]->getMethod().$this->data[0]->getAction().$this->data[0]->getClass().$this->data[0]->getEncType().'>';
                foreach($this->data[0]->getFieldList() as $field){
                    echo '<div class="form-group">';
                    print_r($field->toString());
                    echo '</div>';
                }
                echo '</form>';
                echo '<br/>';
            }
            else{
                ?>
                <div class="category">
                    <h2>CATEGORIES</h2>
                    <h3><a href="/admin/viewCategory/new">Ajouter</a></h3>
                    <h3 class="grey"><a href="/admin/viewCategory/select">Modifier</a></h3>
                    <h3><a href="/admin/viewCategory/del">Supprimer</a></h3>
                </div>
                <div class="product">
                    <h2>PRODUITS</h2>
                    <h3 class="grey"><a href="">Ajouter</a></h3>
                    <h3><a href="">Modifier</a></h3>
                    <h3 class="grey"><a href="">Supprimer</a></h3>
                </div>
                <hr class="clear"/>
            <?php }
                  if(!empty($this->msg)){echo '<div class="clear msgform">'.$this->msg[0].'</div>';} ?>
            </div>
        </div>
        <script>
            $(".category h3").mouseover(function(){$(this).css('background', 'grey');}).mouseout(function(){$(this).css('background', '');});
            $(".product h3").mouseover(function(){$(this).css('background', 'grey');}).mouseout(function(){$(this).css('background', '');});
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


