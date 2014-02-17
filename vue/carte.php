<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Chicken Chico</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Goutez la différence"/>
        <meta name="keywords" content="khebab, sandwich, pomme de terre, four"/>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <script src="../js/jquery-1.10.2.js"></script>
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
                    <a href="/accueil"><div class="crJaune">Accueil</div></a>
                    <a href="/carte"><div class="crJaune">Nos menus</div></a>
                    <a href="/photo"><div class="crJaune">Nos photos</div></a>
                    <a href="/contact"><div class="crJaune">Nous contacter</div></a>
                </div>
            </div>
            <div id="liste">
                <div class="crBleu cr600">Tout nos sandichs vendu à l'unités, sont accompagnés de frites.</div><br/><br/>
                <?php
                for($i=0;$i<count($this->data);$i++){
                    if(is_int($i/2)){
                        echo'<h2>'.strtoupper($this->data[$i]->getName()).'</h2><br/><br/>';
                        echo'<div class="ligne">';
                        echo'<ul class="titre">';
                        echo'<li class="nom">Nom</li>';
                        echo'<li class="descri">Description</li>';
                        echo'<li class="price">Prix Unité</li>';
                        echo'<li class="price">Prix Menu</li>';
                        echo'<li class="img">Photo</li>';
                        echo'</ul>';
                        echo'</div>';
                        $tab = $this->data[$i]->getListProduit();
                        for ($j=0; $j<count($tab) ;$j++){
                            if(is_int($j/2)){$class = "grey";}
                            else{$class = "";}
                            echo'<div class="ligne '.$class.'">';
                            echo'<ul>';
                            echo'<li class="nom bleu">'.ucfirst($tab[$j]->getName()).'</li>';
                            echo'<li class="descri">'.$tab[$j]->getDescription().'</li>';
                            if($tab[$j]->getPrix() == ""){$euro = "";}else{$euro = " €";}
                            if($tab[$j]->getPrixMenu() == ""){$euro1 = "";}else{$euro1 = " €";}
                            echo'<li class="price bleu">'.$tab[$j]->getPrix().$euro.'</li>';
                            echo'<li class="price">'.$tab[$j]->getPrixMenu().$euro1.'</li>';
                            echo'<li><img class="img fright" src="image/menu/'.$tab[$j]->getImage().'"></li>';
                            echo'</ul>';
                            echo'</div>';
                        }
                    }
                    else{
                    echo'<h2>'.strtoupper($this->data[$i]->getName()).'</h2><br/><br/>';
                    echo'<div class"ligne">';
                    echo'<ul class="titre">';
                    echo'<li class="img">Photo</li>';
                    echo'<li class="nom">Nom</li>';
                    echo'<li class="descri">Description</li>';
                    echo'<li class="price">Prix Unité</li>';
                    echo'<li class="price">Prix Menu</li>';
                    echo'</ul>';
                    echo'</div>';
                    $tab = $this->data[$i]->getListProduit();
                    for ($k=0; $k<count($tab) ;$k++){
                        if(is_int($k/2)){$class = "grey";}
                        else{$class = "";}
                        echo'<div class="ligne '.$class.'">';
                        echo'<ul>';
                        echo'<li><img class="img fleft" src="image/menu/'.$tab[$k]->getImage().'"></li>';
                        echo'<li class="nom bleu">'.ucfirst($tab[$k]->getName()).'</li>';
                        echo'<li class="descri">'.$tab[$k]->getDescription().'</li>';
                        if($tab[$k]->getPrix() == ""){$euro = "";}else{$euro = " €";}
                        if($tab[$k]->getPrixMenu() == ""){$euro1 = "";}else{$euro1 = " €";}
                        echo'<li class="price bleu">'.$tab[$k]->getPrix().$euro.'</li>';
                        echo'<li class="price">'.$tab[$k]->getPrixMenu().$euro1.'</li>';
                        echo'</ul>';
                        echo'</div>';
                    }
                    }
                    echo'<div class="marge"></div>';
                    echo'<hr color="#333333" width="800px" />';
                    echo'<div class="marge"></div>';
                }
                ?>
            </div>
            <div class="copyright2">Copyright Chicken Chico 2014 - <a href="admin/user/view">Admin</a></div>
        </div>
        <script>
            $(".crJaune").mouseover(function(){$(this).css("box-shadow", "1px 1px 15px rgba(255, 255, 255, 0.8)");});
            $(".crJaune").mouseout(function(){$(this).css("box-shadow", "1px 1px 15px rgba(255,255,255, 0)");});
        </script>
    </body>
</html>
<?php
