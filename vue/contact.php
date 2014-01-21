<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Chicken Chico</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Goutez la différence"/>
        <meta name="keywords" content="khebab, sandwich, pomme de terre, four"/>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <script src="jquery/jquery-1.10.2.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&rs=AIzaSyC9_zXqzYiRuzQXZNl5mUfQywB4hcjfNkk"></script>
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
            <div id="corp">
                <div id="left">
                    <h3><strong>Pour nous contacter, rien de plus simple ...</strong></h3><br/>
                    <h4>~ Numero ~</h4>
                    <div>06 - 10 - 58 - 09 - 11</div>
                    <h4>~ Email ~</h4>
                    <div>chicken.chico@hotmail.fr</div>
                    <h4>~ Adresse ~</h4>
                    <div>5-7 boulevard Marx Dormoy, <br/>93190 Livry-Gargan</div>
                    <h4>~ Transport ~</h4>
                    <div>Gare de Gargan <br/>Bus 146, 601, 605, 347 <br/>Arrêt République Marx dormoy.</div>
                </div>
                <div id="right">
                    <div id="map-canvas"></div>
                      <script>
                        function initialize() {
                            var myLatlng = new google.maps.LatLng(48.9099936,2.5272759);
                            var mapOptions = {
                                zoom: 15,
                                center: myLatlng
                            };
                        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            map: map,
                            title: 'Chicken Chico - Goûtez la différence !'
                        });
                        }

                        google.maps.event.addDomListener(window, 'load', initialize);
                    </script>
                </div>
            </div>
            <div id="footer">
                <a href="/carte"><img src="image/mini1.jpg" class="mini m"></a>
                <a href="/carte"><img src="image/mini2.jpg" class="mini m"></a>
                <a href="/carte"><img src="image/mini3.jpg" class="mini m"></a>
                <a href="/carte"><img src="image/mini4.jpg" class="mini"></a>
            </div>
       </div>
        <script>
            $("#menu h4").mouseover(function(){$(this).css("box-shadow", "1px 1px 20px rgba(255, 255, 0, 0.5)");});
            $("#menu h4").mouseout(function(){$(this).css("box-shadow", "0px 0px 15px rgba(0, 100, 255, 0.5)");});
            $(".mini").mouseover(function(){$(this).css("box-shadow", "1px 1px 20px rgba(0, 100, 255, 0.5)");});
            $(".mini").mouseout(function(){$(this).css("box-shadow", "0px 0px 15px rgba(255, 255, 0, 0.5)");});
        </script>
    </body>
</html>