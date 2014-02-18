<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Chicken Chico</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Goutez la différence"/>
        <meta name="keywords" content="khebab, sandwich, pomme de terre, four"/>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <script src="js/jquery-1.10.2.js"></script>
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
                    <a href="/accueil"><div class="crJaune">Accueil</div></a>
                    <a href="/carte"><div class="crJaune">Nos menus</div></a>
                    <a href="/photo"><div class="crJaune">Nos photos</div></a>
                    <a href="/contact"><div class="crJaune">Nous contacter</div></a>
                </div>
            </div>
            <div id="corp">
                <div class="miniature fleft">
                    <ul>
                        <li class="miniImg fleft"><img src="image/photo/photo0.jpg"></li>
                        <li class="miniImg fright"><img src="image/photo/photo1.jpg"></li>
                        <li class="miniImg fleft"><img src="image/photo/photo2.jpg"></li>
                        <li class="miniImg fright"><img src="image/photo/photo3.jpg"></li>
                        <li class="miniImg fleft"><img src="image/photo/photo4.jpg"></li>
                        <li class="miniImg fright"><img src="image/photo/photo5.jpg"></li>
                        <li class="miniImg fleft"><img src="image/photo/photo6.jpg"></li>
                        <li class="miniImg fright"><img src="image/photo/photo7.jpg"></li>
                        <li class="miniImg fleft"><img src="image/photo/photo8.jpg"></li>
                        <li class="miniImg fright"><img src="image/photo/photo9.jpg"></li>
                    </ul>
                </div>
                <div class="bigImg fright"><img src="image/photo/photo0.jpg"></div>
            </div>
            <div class="copyright">Copyright Chicken Chico 2014 - <a href="admin/user/view">Admin</a></div>
        </div>
        <script>
            $(".crJaune").mouseover(function(){$(this).css("box-shadow", "1px 1px 15px rgba(255, 255, 255, 0.8)");});
            $(".crJaune").mouseout(function(){$(this).css("box-shadow", "1px 1px 15px rgba(255,255,255, 0)");});
            $(".mini").mouseover(function() {$(this).css("box-shadow", "1px 1px 20px rgba(0, 100, 255, 0.5)");});
            $(".mini").mouseout(function() {$(this).css("box-shadow", "0px 0px 15px rgba(255, 255, 0, 0.5)");});
        </script>
    </body>
</html>