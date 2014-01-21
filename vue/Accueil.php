<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Chicken Chico</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Goutez la différence"/>
        <meta name="keywords" content="khebab, sandwich, pomme de terre, four"/>
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../css/bjqs.css">
        <script src="../jquery/jquery-1.10.2.js"></script>
        <script src="../jquery/bjqs-1.3.min.js"></script>
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
                <img src="../image/logo.png" class="logo">
                <div class="form">
                <form action="/admin" method="post">
                    <div>
                        <input class="zone" type="text" size="12" name="mail" value="Email">
                        <input class="zone pass" type="text" size="12" name="mdp" value="Mot de passe">
                    </div>
                    <div class="right"><input type="submit" value="Admin"></div>
                </form>
                    <?php if(!empty($this->data[0])){echo '<div class="erreur"><center>'.$this->data[0].'</center></div>';} ?>
                </div>
                <div id="menu">
                    <a href="/accueil"><h4>Accueil</h4></a>
                    <a href="/carte"><h4>Nos menus</h4></a>
                    <a href="/contact"><h4>Nous contacter</h4></a>
                </div>
            </div>
            <div id="welcome">
                <h1>Goûtez la différence !</h1><br/>
                <h4>Venez découvrir nos spécialités culinaire <strong>(Hallal)</strong> dans un cadre de qualité avec salle climatisée et terrasse.<br/><br/>Votre restaurant est ouvert tous les jours de 11h15 à 00h00 (Fermé le vendredi, uniquement aux heures de prières).</h4><br/><br/><br/>
                <div id="facebook">
                    <iframe src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FChicken-Chico%2F269046623155226&amp;width=400&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:400px; height:290px;" allowTransparency="true"></iframe>
                </div>
            </div>
            <div id="banner-slide">
                <ul class="bjqs">
                    <li><img src="../image/photo0.jpg" title=""></li>
                    <li><img src="../image/photo1.jpg" title=""></li>
                    <li><img src="../image/photo2.jpg" title=""></li>
                    <li><img src="../image/photo3.jpg" title=""></li>
                    <li><img src="../image/photo4.jpg" title=""></li>
                    <li><img src="../image/photo5.jpg" title=""></li>
                    <li><img src="../image/photo6.jpg" title=""></li>
                    <li><img src="../image/photo7.jpg" title=""></li>
                    <li><img src="../image/photo8.jpg" title=""></li>
                    <li><img src="../image/photo9.jpg" title=""></li>
                </ul>
            </div>
            <script>
                jQuery(document).ready(function($) {
          
                    $('#banner-slide').bjqs({
                        animtype      : 'slide',
                        height        : 600,
                        width         : 450,
                        animspeed     : 8000,
                        showcontrols  : false,
                        responsive    : true,
                        randomstart   : false
                    });
          
                });
            </script>
            <div id="footer">
                <a href="/carte"><img src="../image/mini1.jpg" class="mini m"></a>
                <a href="/carte"><img src="../image/mini2.jpg" class="mini m"></a>
                <a href="/carte"><img src="../image/mini3.jpg" class="mini m"></a>
                <a href="/carte"><img src="../image/mini4.jpg" class="mini"></a>
            </div>
       </div>
        <script>
            $(".zone").click(function(){$(this).val("").css("color", "white");});
            $(".pass").click(function(){$(this).attr("type", "password");});
            $("#menu h4").mouseover(function(){$(this).css("box-shadow", "1px 1px 20px rgba(255, 255, 0, 0.5)");});
            $("#menu h4").mouseout(function(){$(this).css("box-shadow", "0px 0px 15px rgba(0, 100, 255, 0.5)");});
            $(".mini").mouseover(function(){$(this).css("box-shadow", "1px 1px 20px rgba(0, 100, 255, 0.5)");});
            $(".mini").mouseout(function(){$(this).css("box-shadow", "0px 0px 15px rgba(255, 255, 0, 0.5)");});
        </script>
    </body>
</html>