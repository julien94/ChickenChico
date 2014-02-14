<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Chicken Chico</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Goutez la différence"/>
        <meta name="keywords" content="khebab, sandwich, pomme de terre, four"/>
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../css/rhinoslider-1.05.css">
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="../js/rhinoslider-1.05.min.js"></script>
        <script type="text/javascript" src="../js/mousewheel.js"></script>
	<script type="text/javascript" src="../js/easing.js"></script>
	
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
                <div id="menu">
                    <a href="/accueil"><div class="crJaune">Accueil</div></a>
                    <a href="/carte"><div class="crJaune">Nos menus</div></a>
                    <a href="/contact"><div class="crJaune">Nous contacter</div></a>
                </div>
            </div>
            <div id="page">
                <ul id="slider">
                    <li><img src="../img/slider/01.png" alt="" /></li>
                    <li><img src="../img/slider/02.jpg" alt="" /></li>
                    <li><img src="../img/slider/03.jpg" alt="" /></li>
                    <li><img src="../img/slider/04.jpg" alt="" /></li>
                    <li><img src="../img/slider/05.jpg" alt="" /></li>
                </ul>
            </div>
            <div id="welcome">
                <h1>Goûtez la différence !</h1><br/>
                <h4>Venez découvrir nos spécialités culinaire <strong>(Hallal)</strong> dans un cadre de qualité avec salle climatisée et terrasse.<br/><br/>Votre restaurant est ouvert tous les jours de 11h15 à 00h00 (Fermé le vendredi, uniquement aux heures de prières).</h4><br/><br/><br/>
                <div id="facebook">
                    <iframe src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FChicken-Chico%2F269046623155226&amp;width=400&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:400px; height:290px;" allowTransparency="true"></iframe>
                </div>
            </div>
            <div class="center">Copyright Chicken Chico 2014 - <a href="admin/user/view">Admin</a></div>
       </div>
        <script type="text/javascript">
		$(document).ready(function() {
			$('#slider').rhinoslider({
				showTime: 8000,
				controlsPrevNext: false,
				controlsPlayPause: false,
				autoPlay: true,
				showBullets: 'always',
				slidePrevDirection: 'toRight'
			});
		});
	</script>
        <script>
            $(".crJaune").mouseover(function(){$(this).css("box-shadow", "1px 1px 15px rgba(255, 255, 0, 0.8)");});
            $(".crJaune").mouseout(function(){$(this).css("box-shadow", "1px 1px 8px rgba(255,255,255, 0.3)");});
            $(".mini").mouseover(function(){$(this).css("box-shadow", "1px 1px 20px rgba(0, 100, 255, 0.5)");});
            $(".mini").mouseout(function(){$(this).css("box-shadow", "0px 0px 15px rgba(255, 255, 0, 0.5)");});
        </script>
    </body>
</html>