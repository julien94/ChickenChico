<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Chicken Chico</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Goutez la différence"/>
        <meta name="keywords" content="khebab, sandwich, pomme de terre, four"/>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <script src="../js/jquery-1.10.2.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&rs=AIzaSyC9_zXqzYiRuzQXZNl5mUfQywB4hcjfNkk"></script>
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
                <div id="thumbs">
                    <ul class="thumbs noscript">
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo0.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo1.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo2.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo3.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo4.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo5.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo6.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo7.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo8.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                        <li>
                            <a class="thumb" name="optionalCustomIdentifier" href="" title="Chicken Chico">
                                <img src="../image/photo/photo9.jpg" alt="your image title again for graceful degradation" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="copyright">Copyright Chicken Chico 2014 - <a href="admin/user/view">Admin</a></div>
        </div>
        <script>
            jQuery(document).ready(function($) {
                var gallery = $('#thumbs').galleriffic({
                    delay: 3000, // in milliseconds
                    numThumbs: 20, // The number of thumbnails to show page
                    preloadAhead: 40, // Set to -1 to preload all images
                    enableTopPager: false,
                    enableBottomPager: true,
                    maxPagesToShow: 7, // The maximum number of pages to display in either the top or bottom pager
                    imageContainerSel: '', // The CSS selector for the element within which the main slideshow image should be rendered
                    controlsContainerSel: '', // The CSS selector for the element within which the slideshow controls should be rendered
                    captionContainerSel: '', // The CSS selector for the element within which the captions should be rendered
                    loadingContainerSel: '', // The CSS selector for the element within which should be shown when an image is loading
                    renderSSControls: true, // Specifies whether the slideshow's Play and Pause links should be rendered
                    renderNavControls: true, // Specifies whether the slideshow's Next and Previous links should be rendered
                    playLinkText: 'Play',
                    pauseLinkText: 'Pause',
                    prevLinkText: 'Previous',
                    nextLinkText: 'Next',
                    nextPageLinkText: 'Next &rsaquo;',
                    prevPageLinkText: '&lsaquo; Prev',
                    enableHistory: false, // Specifies whether the url's hash and the browser's history cache should update when the current slideshow image changes
                    enableKeyboardNavigation: true, // Specifies whether keyboard navigation is enabled
                    autoStart: false, // Specifies whether the slideshow should be playing or paused when the page first loads
                    syncTransitions: false, // Specifies whether the out and in transitions occur simultaneously or distinctly
                    defaultTransitionDuration: 1000, // If using the default transitions, specifies the duration of the transitions
                    onSlideChange: undefined, // accepts a delegate like such: function(prevIndex, nextIndex) { ... }
                    onTransitionOut: undefined, // accepts a delegate like such: function(slide, caption, isSync, callback) { ... }
                    onTransitionIn: undefined, // accepts a delegate like such: function(slide, caption, isSync) { ... }
                    onPageTransitionOut: undefined, // accepts a delegate like such: function(callback) { ... }
                    onPageTransitionIn: undefined, // accepts a delegate like such: function() { ... }
                    onImageAdded: undefined, // accepts a delegate like such: function(imageData, $li) { ... }
                    onImageRemoved: undefined  // accepts a delegate like such: function(imageData, $li) { ... }
                });
            });
        </script>
        <script>
            $(".crJaune").mouseover(function(){$(this).css("box-shadow", "1px 1px 15px rgba(255, 255, 255, 0.8)");});
            $(".crJaune").mouseout(function(){$(this).css("box-shadow", "1px 1px 15px rgba(255,255,255, 0)");});
            $(".mini").mouseover(function() {
                $(this).css("box-shadow", "1px 1px 20px rgba(0, 100, 255, 0.5)");
            });
            $(".mini").mouseout(function() {
                $(this).css("box-shadow", "0px 0px 15px rgba(255, 255, 0, 0.5)");
            });
        </script>
    </body>
</html>