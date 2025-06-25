(function ($) {
    $(function () {
        
        $(window).ready(function () {
            windowWidth = $(window).width();
            windowHeight = $(window).height();
            Animation();
            smoothScroll();
        });
        
        $(window).load(function () {
            parallax();
        });
        
        $(window).resize(function () {
            if (window.matchMedia("(min-width:990px)").matches) {
                location.reload();
            }
        });
        
        ///////////////////////////////////////////////////////
        /* SMOOTHSCROLL */
        ///////////////////////////////////////////////////////

        function smoothScroll() {
            
            $(document).on('click',".scroll", function (event) {
                event.preventDefault();
                var hash = (this.hash) ? this.hash : $(this).attr('target');
                
                if($(this).closest('[data-role=nav]').length) {
                    
                    $(this).closest('nav').removeClass('active');
                    $(this).closest('html').removeClass('noscroll');
                    
                    setTimeout(function(){
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 700);
                    }, 600);
                }
                else {
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 700);
                }
            });
            
            $('a.no-anchor').on('click',function(e){
                e.preventDefault();
            });
            
        };

        ///////////////////////////////////////////////////////
        /* FUNCTION PARALLAX */
        ///////////////////////////////////////////////////////
        
        const presets_parallax = {
            
            fromB : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateY(5vh)'],
                'end'       : ['1','translateY(0vh)']
            },
            
            fromL : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateX(-3vw)'],
                'end'       : ['1','translateX(0vw)']
            },
            fromR : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateX(3vw)'],
                'end'       : ['1','translateX(0vw)']
            },
            fadeIn : {
                'property'  : ['opacity'],
                'start'     : ['0'],
                'end'       : ['1']
            },
            fadeOut : {
                'property'  : ['opacity'],
                'start'     : ['1'],
                'end'       : ['0']
            },
            zoomIn : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','scale(0)'],
                'end'       : ['1','scale(1)']
            },
            zoomIn50 : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','scale(0.5)'],
                'end'       : ['1','scale(1)']
            },
            zoomOut : {
                'property'  : ['opacity','transform'],
                'start'     : ['1','scale(1)'],
                'end'       : ['0','scale(2)']
            },
            zoomOut50 : {
                'property'  : ['opacity','transform'],
                'start'     : ['1','scale(1)'],
                'end'       : ['0','scale(1.5)']
            }
            
        };
        
        function parallax() {
            
            var elements = $('.parallax');
            
            var observer = new IntersectionObserver(parallax_callback,{rootMargin:"100%"});
            
            $(elements).each(function(index,element){
                var config_setup = setup_parallax(element);
                
                if(config_setup.stop) {
                    if (!window.matchMedia("(min-width:" + config_setup.stop + "px)").matches) {
                        return;
                    }
                }
                
                var config_updated = parallaxScroll(config_setup);
                element.config = config_updated;
                apply_parallax_values(config_updated.config, config_updated.values);
                observer.observe(element);
            });

            function parallax_callback(entries, observer)
            {
                $(entries).each(function(index,entry){
                    var config = entry.target.config;
                    
                    $(window).on('scroll', function (event) {
                        if(entry.isIntersecting) {
                            apply_parallax_values(config.config, config.values);
                        }
                    });
                });
            }
            
            
            function setup_parallax(element) {
                
                // Création d'un objet vide pour stocker les valeurs utiles
                
                var config_object = {};
                
                // Récupération des data utiles
                
                config_object.elem = $(element),
                config_object.top_offset = Math.round($(element).offset().top),
                config_object.height = $(element).outerHeight(),
                config_object.start_offset = 0,
                config_object.end_offset = 100,
                config_object.anchor = false;
                
                // Récupération des valeurs de l'animation dans le HTML ou du preset d'animation
                
                if (config_object.elem.data('parallax') != undefined) {
                    
                    var preset = config_object.elem.data('parallax');
                        config_object.css_properties = presets_parallax[preset].property,
                        config_object.start_values = presets_parallax[preset].start,
                        config_object.end_values = presets_parallax[preset].end;
                    
                    if (window.matchMedia("(max-width:760px)").matches) {
                        config_object.start_offset = 5;
                        config_object.end_offset = 5;
                    }
                    else
                    {
                        config_object.start_offset = 5;
                        config_object.end_offset = 5;
                    }
                    
                    if(config_object.elem.data('parallax-delay') != undefined && window.matchMedia("(min-width:990px)").matches)
                    {
                        var cssValue = config_object.elem.data('parallax-delay')*.1+'s';
                        config_object.elem.css('transition-delay',cssValue);
                    }
                    
                } else {
                    config_object.css_properties = config_object.elem.data('css').toString().split(","),
                    config_object.start_values = config_object.elem.data('start').toString().split(","),
                    config_object.end_values = config_object.elem.data('end').toString().split(",");
                }
                
                // Récupération des propriétés CSS

                if (config_object.elem.attr('off-start') != undefined) {
                    config_object.start_offset = config_object.elem.attr('off-start');
                }
                
                // Offset de fin
                
                if (config_object.elem.attr('off-end') != undefined) {
                    config_object.end_offset = config_object.elem.attr('off-end');
                }
                
                // Attribution d'un Anchor
                
                if (config_object.elem.data('anchor') != undefined) {
                    config_object.anchor = config_object.elem.data('anchor');
                    config_object.top_offset = $(config_object.anchor).offset().top;
                    config_object.height = $(config_object.anchor).outerHeight();
                }
                
                // Responsive utilities

                if (config_object.elem.data('stop') != undefined) {
                    config_object.stop = config_object.elem.data('stop');
                }
                
                return config_object;
            };
            
        }

        function parallaxScroll(config_object) {
            
            
            var valuesTab = [],
                regex = /[+-]?\d+(\.\d+)?/g,
                css_props = '',
                i;
            
            for (i = 0; i < config_object.css_properties.length; i++) {
                
                var property = config_object.css_properties[i],
                    startFull = config_object.start_values[i],
                    endFull = config_object.end_values[i],
                    splitUnits = endFull.split(regex),
                    units = splitUnits[splitUnits.length - 1],
                    chaine_start = splitUnits[0],
                    startVal = startFull.match(regex).map(function (v) {
                        return parseFloat(v);
                    }),
                    endVal = endFull.match(regex).map(function (v) {
                        return parseFloat(v);
                    }),
                    anchor = config_object.anchor;
                
                css_props += config_object.css_properties[i] + ',';
                
                var object = {
                    chaine0: chaine_start,
                    start: startVal[0],
                    end: endVal[0],
                    css: property,
                    units: units,
                    delta: (endVal - startVal) / (config_object.end_offset - config_object.start_offset)
                };
                
                valuesTab.push(object);
            }
            
            css_props = css_props.substring(0,css_props.length-1);
            config_object.elem.css(
                'will-change', css_props
            )
            
            var init = config_object.top_offset - windowHeight;
            var end = config_object.top_offset + config_object.height;
            config_object.start_scroll = config_object.top_offset - windowHeight + config_object.start_offset * (end - init) / 100;
            config_object.end_scroll = config_object.top_offset - windowHeight + config_object.end_offset * (end - init) / 100;
            
            if(config_object.top_offset <= windowHeight)
            {
                var init = 0;
                config_object.start_scroll = 0;
                config_object.end_scroll = config_object.end_offset * (end - init) / 100;
            }
            
            return {
                'config' : config_object,
                'values' : valuesTab
            }
            
        };

        
        function apply_parallax_values(config_object,valuesTab) {
            
            var scrollPos = $(window).scrollTop(),
                i;
            
            
            if (config_object.top_offset < windowHeight) 
            {
                var percent = (scrollPos / (config_object.top_offset + config_object.height)) * 100;
            } 
            else 
            {
                var percent = (scrollPos - config_object.top_offset + windowHeight) / (config_object.height + windowHeight) * 100;
            }
            
            if (scrollPos >= config_object.start_scroll && scrollPos <= config_object.end_scroll) {
                for (i = 0; i < valuesTab.length; i++) {
                    config_object.elem.css(
                        valuesTab[i].css, (valuesTab[i].chaine0 + (valuesTab[i].start + percent * valuesTab[i].delta - valuesTab[i].delta * config_object.start_offset) + valuesTab[i].units)
                    )
                }
            }
            
            if (scrollPos <= config_object.start_scroll) {
                for (i = 0; i < valuesTab.length; i++) {
                    config_object.elem.css(
                        valuesTab[i].css, (valuesTab[i].chaine0 + valuesTab[i].start + valuesTab[i].units)
                    )
                }
            }
            
            if (scrollPos >= config_object.end_scroll) {
                
                for (i = 0; i < valuesTab.length; i++) {
                    config_object.elem.css(
                        valuesTab[i].css, (valuesTab[i].chaine0 + valuesTab[i].end + valuesTab[i].units)
                    )
                }
                if(config_object.elem.data('parallax') != undefined)
                {
                    config_object.elem.attr('data-parallax-stop',true);
                }
            }
            
        }
        
        // ******************************* ELEMS WITH DATA-PARALLAX
        
        var elements_presets = $('[data-parallax]');

        var observer_presets = new IntersectionObserver(parallax_presets_callback,{rootMargin:"-5% 0%"});
        
        $(elements_presets).each(function(index,element){

            var config_setup = setup_presets(element);
            
            
            if(config_setup.stop) {
                if (!window.matchMedia("(min-width:" + config_setup.stop + "px)").matches) {
                    return;
                }
            }
            var config_updated = parallax_presets_values(config_setup);
            element.config = config_updated;
            
            apply_parallax_presets_values(config_updated.config, config_updated.values,true);
            
            
            
            if(config_setup.start_offset) {
                const margin = "0% 0% "+config_setup.start_offset*-1+"% 0%";
                
                var observer_alt = new IntersectionObserver(parallax_presets_callback,{rootMargin:margin});
                observer_alt.observe(element);
            }
            
            else
            {
                observer_presets.observe(element);
            }

        });




        function parallax_presets_callback(entries, observer)
        {
            $(entries).each(function(index,entry){
                var config = entry.target.config;
                if(entry.isIntersecting) {
                    apply_parallax_presets_values(config.config, config.values,false);
                }
                else
                {
                    const position = entry.target.getBoundingClientRect();
                    if(position.top < 0) {
                        apply_parallax_presets_values(config.config, config.values,false);
                    }
                }
            });
        }

        
        function setup_presets(element) {
                
            // Création d'un objet vide pour stocker les valeurs utiles

            var config_object = {};

            // Récupération des data utiles

            config_object.elem = $(element);

            var preset = config_object.elem.data('parallax');

            config_object.css_properties = presets_parallax[preset].property,
            config_object.start_values = presets_parallax[preset].start,
            config_object.end_values = presets_parallax[preset].end;

            if(config_object.elem.data('parallax-delay') != undefined && window.matchMedia("(min-width:990px)").matches)
            {
                var cssValue = config_object.elem.data('parallax-delay')*.1+'s';
                config_object.elem.css('transition-delay',cssValue);
            }
            
            if(config_object.elem.data('stop') != undefined)
            {
                config_object.stop = config_object.elem.data('stop');
            }
            
            if(config_object.elem[0].hasAttribute('off-start') )
            {
                config_object.start_offset = config_object.elem.attr('off-start');
            }

            // Renvoi de l'objet

            return config_object;
        }

        function parallax_presets_values(config_object) {
            
            var valuesTab = [],
                regex = /[+-]?\d+(\.\d+)?/g,
                i;
            
            for (i = 0; i < config_object.css_properties.length; i++) {
                
                var property = config_object.css_properties[i],
                    startFull = config_object.start_values[i],
                    endFull = config_object.end_values[i],
                    splitUnits = endFull.split(regex),
                    units = splitUnits[splitUnits.length - 1],
                    chaine_start = splitUnits[0],
                    startVal = startFull.match(regex).map(function (v) {
                        return parseFloat(v);
                    }),
                    endVal = endFull.match(regex).map(function (v) {
                        return parseFloat(v);
                    });
                
                var object = {
                    chaine0: chaine_start,
                    start: startVal[0],
                    end: endVal[0],
                    css: property,
                    units: units
                };
                
                valuesTab.push(object);
            }
            
            return {
                'config' : config_object,
                'values' : valuesTab
            }
            
        }
        
        function apply_parallax_presets_values(config_object,valuesTab,start) {
            
            var i;
            
            if(config_object.elem.data('parallax-stop') != undefined)
            {
                return;
            }
            
            if(start == true)
            {
                for (i = 0; i < valuesTab.length; i++) {
                    config_object.elem.css(
                        valuesTab[i].css, (valuesTab[i].chaine0 + valuesTab[i].start + valuesTab[i].units)
                    )
                }
            }
            else 
            {
                for (i = 0; i < valuesTab.length; i++) {
                    config_object.elem.css(
                        valuesTab[i].css, (valuesTab[i].chaine0 + valuesTab[i].end + valuesTab[i].units)
                    )
                }
                
                config_object.elem.attr('data-parallax-stop',true);
            }
            
        }

        ///////////////////////////////////////////////////////
        /* ANIMATION AU CHARGEMENT DU SITE */
        ///////////////////////////////////////////////////////

        function Animation() {

            // ========================================
            // *****  CHARGEMENT DU SITE 
            // ========================================

            if ($(".u-transition.first").length) {
                $.post("ajax/animation.php", {
                    animation: "none"
                });
                setTimeout(function () {
                    $(".u-transition").addClass('remove');
                }, 500);
                setTimeout(function () {
                    $(".u-transition").addClass('under');
                }, 600);
                setTimeout(function () {
                    $(".u-transition").removeClass('first active remove');
                }, 800);
            }
            
            if ($(".u-transition.active").length) {
                $.post("ajax/animation.php", {
                    animation: "none"
                });
                setTimeout(function () {
                    $(".u-transition").addClass('remove');
                }, 10);
                setTimeout(function () {
                    $(".u-transition").addClass('under');
                }, 400);
                setTimeout(function () {
                    $(".u-transition").removeClass('active anim remove');
                }, 650);
            }

            // ========================================
            // ***** ANIMATIONS INTERPAGES
            // ========================================

            $(document).on('click',"a:not([target='_blank'],.no-anim,.scroll,.no-anchor)", function (event) {
                event.preventDefault();
                
                $.post("ajax/animation.php", {
                    animation: "done"
                });

                var link = $(this).attr('href');
                var transition = $('.u-transition');

                transition.removeClass("under");

                setTimeout(function () {
                    transition.addClass('out');
                }, 10);

                setTimeout(function () {
                    window.location.href = link;
                }, 360);
            });
        }
    });
})(jQuery);

// ===========================================
// ***** Gestionnaire de cards
// ===========================================

function load_items() {
    const load_buttons = document.querySelectorAll('[load_items]');
    
    for (button of load_buttons) {
        const cards_wrapper = button.closest('[cards_wrapper]'),
              cards_container = cards_wrapper.querySelector('[cards_container]'),
              cards_total = parseInt(cards_container.getAttribute('total_items')),
              element = button,
              article_baseUrl = cards_wrapper.dataset.article_url;
        
        display_button(element,cards_container);
        
        button.addEventListener('click',function() {handleClick(element)});
        
        function handleClick(button) {
            const items_number = button.dataset.number,
                  formData = new FormData(),
                  cards_number = cards_container.querySelectorAll('[card]').length,
                  filters = cards_wrapper.querySelectorAll('[filter_items]');

            for (const filter of filters) {
                formData.append(filter.dataset.key,filter.dataset.value);
            }

            formData.append('current',cards_number);
            formData.append('number',items_number);
            formData.append('base_url',article_baseUrl);

            cards_ajax_handler(formData,cards_number);
        }

        async function cards_ajax_handler(data,number) {
            
            const new_cards = await fetch('ajax/load_items.php',{
                method:'post',
                body: data 
            });

            const content = await new_cards.text();
            cards_container.innerHTML += content;
            
            const card_items = cards_container.querySelectorAll('[card]');
            
            let i,
                y=1;
            
            const new_cards_num = card_items.length - number,
                  bouton = cards_wrapper.querySelector('[load_items]');
            
            for(i = card_items.length - new_cards_num; i < card_items.length; i++)
            {
                const item = card_items[i];
                
                item.classList.add('unvisible');
                
                setTimeout(function() {
                    item.classList.remove('unvisible');
                },y*100);
                
                y++;
            }
            
            display_button(element,cards_container);
        }
    }
}
  
function display_button(bouton,container) {

    const cards_count = parseInt(container.querySelectorAll('[card]').length),
          total = parseInt(container.getAttribute('total_items'));
    
    if(cards_count >= total)
    {
        bouton.classList.add('hidden');
    }
    else
    {
        bouton.classList.remove('hidden');
    }
}

///////////////////////////////////////////////////////
/* Retour Arrière */
///////////////////////////////////////////////////////

function history_back() {
    const back_buttons = document.querySelectorAll('[history-back]');
    
    for(back_button of back_buttons) {
        back_button.addEventListener('click',() => {
            history.go(-1);
        })
    }
}

///////////////////////////////////////////////////////
/* GESTION OUVERTURE / FERMETURE MENU */
///////////////////////////////////////////////////////

function menu() {

    const navigation = document.querySelector('[data-role=nav]');

    const nav_buttons = document.querySelectorAll('[data-action="open_nav"]');

    for (const button of nav_buttons) {
        button.addEventListener('click',handleMenuClick);
    }

    function handleMenuClick() {
        navigation.classList.toggle('active');
    }

    let scrollTop = document.documentElement.scrollTop;

    if(scrollTop > 50) {
        navigation.classList.add('sticky');
    }

    document.addEventListener('click', function(event) {
        if(!event.target.closest('[data-role=nav]') && navigation.classList.contains('active')) {
            navigation.classList.remove('active');
        }
    });

    window.addEventListener('scroll',function() {
        let scrollTopNew = document.documentElement.scrollTop;

        if(scrollTopNew > 50) {
            navigation.classList.add('sticky');
        } else {
            navigation.classList.remove('sticky');
        }
        
        scrollTop = scrollTopNew;
    });
}

///////////////////////////////////////////////////////
/* Carousel */
///////////////////////////////////////////////////////

function carousel() {
    const carousels = document.querySelectorAll('[js-carousel]');
    
    if(!carousels) {
        return;
    }

    for(const carousel of carousels) {
        setup_carousel(carousel);
    }
}

function setup_carousel(carousel) {
    
    const carousel_slides = carousel.querySelectorAll('[js-carousel_slide]'),
          carousel_prev = carousel.querySelector('[js-carousel_prev]'),
          carousel_next = carousel.querySelector('[js-carousel_next]');
    let responsive_array = [
            {
                breakpoint : 300,
                visible : 1
            },
            {
                breakpoint : 1000,
                visible : 2
            },
            {
                breakpoint : 1620,
                visible : 3
            }
        ];
        
    if(carousel.hasAttribute('partners')) {
        responsive_array = [
            {
                breakpoint : 300,
                visible : 1
            },
            {
                breakpoint : 480,
                visible : 2
            },
            {
                breakpoint : 1000,
                visible : 3
            },
            {
                breakpoint : 1200,
                visible : 4
            },
            {
                breakpoint : 1620,
                visible : 5
            }
        ];
    }
    
    let current_index = 0,
        total_items = carousel_slides.length,
        visible_items = 1;
    
    carousel.style.setProperty('--slidesNumber',total_items);
    
    responsive_array.forEach((item,index) => {
        
        if(window.matchMedia('(min-width:'+item.breakpoint+'px)').matches)
        {
            visible_items = item.visible;
        }
        
    });
        
    total_items -= visible_items;
    
    update_carousel();
    
    // Next button (navigate to next slide)
    
    carousel_prev.addEventListener('click',function(){
        if(current_index == 0) return;
        current_index--;
        
        update_carousel();
    });
    
    // Prev button (navigate to next slide)
    
    carousel_next.addEventListener('click',function(){
        if(current_index >= total_items) return;
        current_index++;
        
        update_carousel();
    });
    
    
    // Touch events (mobile)
    
    let touchstartX = 0,
        touchendX = 0,
        swipe = 'none';
    
    function checkDirection() {
        
        swipe = 'none';
        
        if (touchendX < touchstartX && touchendX+100 < touchstartX) {
            swipe = "left";
        }
        if (touchendX > touchstartX && touchendX-100 > touchstartX) {
            swipe = "right";
        }
      
      touchstartX = touchendX = 0;
        
    }

    carousel.addEventListener('touchstart', e => {
        touchstartX = e.changedTouches[0].screenX
    });

    carousel.addEventListener('touchend', e => {
        touchendX = e.changedTouches[0].screenX
        checkDirection();
        
        if(swipe == "left") {
            if(current_index >= total_items) return;
            current_index++;
            update_carousel();
        }
        if(swipe == "right") {
            if(current_index == 0) return;
            current_index--;

            update_carousel();
        }
    });
    
    
    function update_carousel() {
        
        const current_slide = carousel.querySelectorAll('.active'),
              prev_slides = carousel.querySelectorAll('.prev');
        
        // Update des classes pour l'item actif
        
        if(current_slide) {
            for (const slide of current_slide) {
                slide.classList.remove('active');
            }
        }
        if(prev_slides) {
            for (const slide of prev_slides) {
                slide.classList.remove('prev');
            }
        }
        for(let i=0;i<visible_items;i++) {
            active_index = current_index+i;
            carousel_slides[active_index].classList.add('active');
        }
        for(let y=0;y<current_index;y++) {
            carousel_slides[y].classList.add('prev');
        }
        
        
        carousel.style.setProperty('--currentSlide',current_index);
        

        carousel_prev.classList.remove('disabled');
        carousel_next.classList.remove('disabled');

        // Si on atteint la plus petite valeur 
        
        if(current_index == 0) {
            carousel_prev.classList.add('disabled');
        }
        
        // Si on atteint la plus grande valeur 
        
        if (current_index == total_items) {
            carousel_next.classList.add('disabled');
        }
    }
}

///////////////////////////////////////////////////////
/* Sécuriser les emails */
///////////////////////////////////////////////////////

function secure_email() {
    var mails = document.querySelectorAll('[data-email]');
    
    mails.forEach(function(item){
        var content = item.innerHTML,
            link = document.createElement('a');
        
        content = content.replaceAll('%%','');
        link.innerHTML = content;
        link.setAttribute('href','mailto:'+content);
        link.setAttribute('target','_blank');
        
        item.parentNode.replaceChild(link,item);
    });
}

///////////////////////////////////////////////////////
/* Téléphone cliquable sur mobile */
///////////////////////////////////////////////////////

function clickable_phone() {
    var phones = document.querySelectorAll('[data-phone]');

    if(!phones) {
        console.log(false);
        return;
    }

    if(window.matchMedia('(max-width:1000px)').matches) {
        
    
        phones.forEach(function(item) {
            var content = item.innerHTML,
                number = content.replaceAll(' ','');
                link = document.createElement('a');
            
            link.innerHTML = content;
            link.setAttribute('href','tel:'+number);
            link.setAttribute('target','_blank');
            
            item.parentNode.replaceChild(link,item);
        });
    }
}

///////////////////////////////////////////////////////
/* Horizontal Scroll */
///////////////////////////////////////////////////////

function horizontal_scroll() {

    const scrollers = document.querySelectorAll('[js-hscroll]'),
          observer = new IntersectionObserver(start_hscroll);

    // On n'éxecute rien si les conditions de la fonction ne sont pas remplies (pas d'élément / fenêtre trop petite)
    if(!window.matchMedia('(min-width:1000px)').matches || !scrollers.length) {
        return;
    }

    for(const scroller of scrollers) {
        observer.observe(scroller);
    }
}

function start_hscroll(entries, observer) {
    for (const entry of entries) {
        const element = entry.target;

        // On stocke la référence du handler pour pouvoir le retirer
        if (!element._hscrollHandler) {
            element._hscrollHandler = function () {
                setup_hscroll(element);
            };
        }
        
        // Appelle une fois pour l'état initial
        setup_hscroll(element);

        if (entry.isIntersecting) {
            // Ajoute le listener seulement si visible
            window.addEventListener('scroll', element._hscrollHandler);
            // Appelle une fois pour l'état initial
            setup_hscroll(element);
        } else {
            // Retire le listener si non visible
            window.removeEventListener('scroll', element._hscrollHandler);
        }
    }
}
          
function setup_hscroll(element) {
    const view = element.querySelector('[js-hscroll_view]'),
        view_width = view.getBoundingClientRect().width,
        wrapper = element.querySelector('[js-hscroll_wrapper]'),
        wrapper_width = wrapper.getBoundingClientRect().width,
        scrollbar = element.querySelector('[js-hscroll_scrollbar]'),
        scroller = element.querySelector('[js-hscroll_scroller]'),
        scroller_coords = scroller.getBoundingClientRect(),
        start = scroller_coords.height + windowHeight,
        end = windowHeight,
        total = start - end;
    let percent, transform;

    if(scroller_coords.bottom > start) {
        percent = 0;
        transform = 0;
    }

    if(scroller_coords.bottom < end) {
        percent = 100;
        transform = ((view_width - wrapper_width) * -1).toFixed();
    }

    if(end < scroller_coords.bottom && start > scroller_coords.bottom) {
        percent = ((scroller_coords.bottom - start) / (end - start) * 100).toFixed(2); 
        percent = Number(percent);

        
        transform = ((view_width - wrapper_width) * percent / -100).toFixed();
    }
    
    element.style.setProperty('--transformation',transform+'px');
    element.style.setProperty('--scrollbar',percent+"%");

}

window.addEventListener("load", function() {
    load_items();
    history_back();
    carousel();
    menu();
    secure_email();
    clickable_phone();
    horizontal_scroll();
});

window.addEventListener("resize", function() {
    carousel();
    horizontal_scroll();
}); 