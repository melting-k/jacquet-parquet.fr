(function ($) {
    $(function () {
        $(window).ready(function () {
            checkCookies();
        });
        ///////////////////////////////////////////////////////
        /* CHECK DES COOKIES & AFFICHAGE DU BANDEAU */
        ///////////////////////////////////////////////////////
        function checkCookies() {
            var cookies = localStorage.getItem("cookies");
                // VERIFICATION A L'OUVERTURE DE LA PAGE
                if (cookies != 'accepted' || !cookies.length) {
                    $('.u-banner-cookies').addClass('active');
                }else {
                  window.dataLayer = window.dataLayer || [];
                  function gtag(){dataLayer.push(arguments);}
                  gtag('js', new Date());
                  gtag('config', 'UA-93006386-2');
                }
                // FERMETURE DU BANDEAU & STOCKAGE EN LOCAL STORAGE
                $('.js-closeCookies').click(function () {
                    if (typeof localStorage != 'undefined') {
                        localStorage.setItem("cookies", "accepted");
                    }
                    ///////////////////////////////////////////////////
                    // A REMPLACER PAR LE CODE GOOGLE ANALYTICS DU SITE
                    ///////////////////////////////////////////////////
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());
                    gtag('config', 'UA-93006386-2');
                    ///////////////////////////////////////////////////
                    ///////////////////////////////////////////////////
                    ///////////////////////////////////////////////////
                    $('.u-banner-cookies').removeClass('active');
                });
            }
    });
})(jQuery);
