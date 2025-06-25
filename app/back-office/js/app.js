const BODY = document.body;
const SIDEBAR_MENU = document.getElementById('sidebar-menu');
const LEFT_COL = document.querySelector('.left_col.scroll-view');
const RIGHT_COL = document.querySelector('.right_col');
const NAV_MENU = document.querySelector('.nav_menu');
const FOOTER = document.querySelector('footer');

//******************************************************************************
// Sidebar
//******************************************************************************

document.addEventListener('DOMContentLoaded', function () {
    const setContentHeight = function () {
        RIGHT_COL.style.minHeight = window.innerHeight + 'px';
        
        const bodyHeight = BODY.offsetHeight;
        const footerHeight = BODY.classList.contains('footer_fixed') ? -10 : FOOTER.offsetHeight;
        const leftColHeight = LEFT_COL.children[1].offsetHeight;
        let contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

        contentHeight -= NAV_MENU.offsetHeight + footerHeight + 26;

        RIGHT_COL.style.minHeight = contentHeight + 'px';
    };

    const sidebarMenuLinks = document.querySelectorAll('#sidebar-menu a');

    sidebarMenuLinks.forEach(function (link) {
        link.addEventListener('click', function (ev) {
            const li = this.parentElement;

            if (li.classList.contains('active')) {
                li.classList.remove('active', 'active-sm');
                li.querySelector('ul:first-child').style.display = 'none';
                setContentHeight();
            } else {
                if (!li.parentElement.classList.contains('child_menu')) {
                    const activeItems = document.querySelectorAll('#sidebar-menu li.active');
                    activeItems.forEach(function (item) {
                        item.classList.remove('active', 'active-sm');
                        item.querySelector('ul:first-child').style.display = 'none';
                    });
                }

                li.classList.add('active');
                li.querySelector('ul:first-child').style.display = 'block';
                setContentHeight();
            }
        });
    });

    const currentUrl = window.location.href;
    const sidebarMenuLinksArray = Array.from(sidebarMenuLinks);

    const currentPageLink = sidebarMenuLinksArray.find(function (link) {
        return link.href === currentUrl;
    });

    if (currentPageLink) {
        const currentLi = currentPageLink.parentElement;
        currentLi.classList.add('current-page');

        let parentUl = currentLi.parentElement;
        while (parentUl && parentUl.tagName !== 'UL') {
            parentUl.style.display = 'block';
            parentUl.parentElement.classList.add('active');
            parentUl = parentUl.parentElement.parentElement;
        }

        setContentHeight();
    }

    window.addEventListener('resize', function () {
        setContentHeight();
    });

    setContentHeight();

    if (typeof jQuery.fn.mCustomScrollbar !== 'undefined') {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel: { preventDefault: true }
        });
    }
});


//******************************************************************************
// PNotify customisation
//******************************************************************************

PNotify.prototype.options.styling = "bootstrap3";
PNotify.prototype.options.buttons.sticker = false;
PNotify.prototype.options.buttons.closer_hover = false;
PNotify.prototype.options.delay = 3000;
PNotify.prototype.options.animate.animate = true;
PNotify.prototype.options.animate.in_class = "bounceInRight";
PNotify.prototype.options.animate.out_class = "bounceOutRight";
PNotify.prototype.options.animate_speed = 1000;


//******************************************************************************
// tinymce
//******************************************************************************

// Prevent Bootstrap dialog from blocking focusin with tinymce
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".mce-window").length) {
    e.stopImmediatePropagation();
  }
});

//**************************************************************************
// FONCTIONS POUR AJOUTER DES ITEMS / SUPPR / DRAG AND DROP
//**************************************************************************


jQuery(function() {
    $(document).ready(function() {
        dragAndDrop();
        autocomplete();
        
        function dragAndDrop() {
            $(".sortable").sortable({
                revert: true,
                opacity:.5,
                start: function (e, ui) {
                    $(ui.item).find('textarea').each(function () {
                    tinymce.execCommand('mceRemoveEditor', false, $(this).attr('id'));
                    });
                },
                stop: function (e, ui) {
                    $(ui.item).find('textarea').each(function () {
                    tinymce.execCommand('mceAddEditor', true, $(this).attr('id'));
                    });
                    var container = $(this).closest('.x_panel.row').find('.sortable');
                    modif_data(container[0],'.article-item');
                }
            });
        }

        function autocomplete() {
            
            // Fonction de normalisation de la requête
            var normalize = function( term ) {
                var ret = "";
                for ( var i = 0; i < term.length; i++ ) {
                    ret += accentMap[ term.charAt(i) ] || term.charAt(i);
                }
                return ret;
            };
            $.ajax({
                url:'ajax/get_tags.php',
                type: "POST",
                dataType: "json",
                cache: false,
                data: {
                    types : 1
                },
                success : function(data) {
                    data = $.map(data, function(objet){
                        return objet;
                    });
                    $('.js-autocomplete').autocomplete({
                        source: function( request, response ) {
                            var term = $.ui.autocomplete.escapeRegex(normalize(request.term)),
                                startsWithMatcher = new RegExp("^" + term, "i"),
                                startsWith = $.grep( data, function(value) {
                                    value = value.label || value.value || value;
                                    return startsWithMatcher.test(normalize(value));
                                });
                                var containsMatcher = new RegExp(term, "i"),
                                contains = $.grep( data, function(value) {
                                    return $.inArray(value, startsWith) < 0 && containsMatcher.test(
                                    normalize(value.label));
                                });
                            response(startsWith.concat(contains).slice(0,10));
                        },
                        position:{
                            my:"left top+10"
                        },
                        select: function (event, ui) {
                            $(this).val(ui.item.label);
                        }
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        $.autocompleteFunction = function() {
            autocomplete();
        }
    });
});

// ****************************
// ***** FORM CHECKER
// ****************************


function form_checker() {
    
    // ***** Variables utiles 

    const formulaires = document.querySelectorAll('[is-checked]');
    
    for(const formulaire of formulaires) {
        
        let formState = true,
        form_inputs;

        // ***** Vérification des inputs / textarea

        function all_inputs() {
            form_inputs = get_all_inputs(formulaire);

            for(input of form_inputs) {
                input.addEventListener('change',handleChange);
            }
        }

        all_inputs();

        const observer = new MutationObserver(() => {
            all_inputs();
        });
        
        const config = { childList: true, subtree: true };
        
        if(document.getElementById('articleBody')) {
            observer.observe(document.getElementById('articleBody'),config);
        }

        function handleChange(event) {
            const index = event.target;
            formState = check_form_fields(index,index.element_name,true);
        }

        formulaire.addEventListener('submit', handleSubmit);

        function handleSubmit(event) {
            event.preventDefault();
            let is_error = false;

            for(index of form_inputs) {
                formState = check_form_fields(index,index.element_name,true);

                if(!formState)
                {
                    is_error = true;
                }
            };

            // Si toutes les conditions sont bien remplies on envoie le formulaire
            if (!is_error) {
                formulaire.submit();
            }
            
            return false;
            
        };
    }
};

function get_all_inputs(formulaire) {
    const inputs = Array.from(formulaire.querySelectorAll('input,textarea,select'));
    let i, formState;

    for(i = 0; i < inputs.length; ++i) {
        const element = inputs[i];
        let name = element.getAttribute('name');
            name = name.replace("][","--");
            name = name.replace("]","--");
            name = name.replace("[","--");
        
        const element_name = name.split('--');

        inputs[i].element_name = element_name;
    } 

    return inputs;
}

function check_form_fields(element,element_name,formState) {
    let required_state,
        is_equal_state,
        format_state;
    
    if (element_name[0] !== undefined) {
        switch (element_name[0]) {
            case 'required':
                required_state = check_if_required(element);
                if (!required_state) {
                    formState = false;
                }
                break;
            case 'alpha':
            case 'alphanum':
            case 'url':
            case 'mail':
            case 'phone':
            case 'date':
            case 'image_large':
            case 'image_square':
            case 'pdf':
                format_state = check_if_format(element,element_name[0]);
                if (!format_state) {
                    formState = false;
                }
                break;
            default:
                break;
        }
    }

    if (element_name[1] !== undefined && formState) {
        switch (element_name[1]) {
            case 'alpha':
            case 'alphanum':
            case 'url':
            case 'mail':
            case 'phone':
            case 'date':
            case 'image_large':
            case 'image_square':
            case 'pdf':
                format_state = check_if_format(element,element_name[1]);
                if (!format_state) {
                    formState = false;
                }
                break;
            default:
                break;
        }
    }

    if (element_name[2] !== undefined && formState) {
        switch (element_name[2]) {
            case 'alpha':
            case 'alphanum':
            case 'url':
            case 'mail':
            case 'phone':
            case 'date':
            case 'image_large':
            case 'image_square':
            case 'pdf':
                format_state = check_if_format(element,element_name[1]);
                if (!format_state) {
                    formState = false;
                }
                break;
            default:
                break;
        }
    }

    if(element.getAttribute('is_equal_to') !== null && formState) {
        is_equal_state = check_if_equal(element);
        if (!is_equal_state) {
            formState = false;
        }
    }
    
    return formState;
}

// ***** Vérification des éléments requis

function check_if_required(element) {
    let value = element.value,
        message = "Ce champ est obligatoire",
        parent = element.closest('.form-checker');
    
    if (value == "" || value == undefined) {
        parent.classList.add('error');
        parent.setAttribute('data-message', message);
        return false;
    } else if (element.getAttribute('type') == "checkbox") {

        let element_name = element.getAttribute('name'),
            checkboxes = parent.querySelectorAll('[name="'+element_name+'"]'),
            is_checked = false,
            y;
        
        for(y = 0; y< checkboxes.length; ++y) {
            if(checkboxes[y].checked)
            {
                is_checked = true;
            }
        }

        if (!is_checked) {
            parent.classList.add('error');
            parent.setAttribute('data-message', message);
            return false;
        } else {
            parent.classList.remove('error');
            return true;
        }
    } else {
        parent.classList.remove('error');
        return true;
    }
}

// ***** Vérification des éléments qui doivent être égaux

function check_if_equal(element) {
    let value = element.value,
        is_equal_to = document.querySelector(element.getAttribute('is_equal_to')).value,
        message = "Les deux champs ne correspondent pas",
        parent = element.closest('.form-checker');

    if(value !== is_equal_to) {
        parent.classList.add('error');
        parent.setAttribute('data-message', message);
        return false;
    }

    else {
        parent.classList.remove('error');
        return true;
    }
}

// ***** Vérification du format des données

function check_if_format(element, format) {
    
    // ***** Variables utiles et patterns 
    const value = element.value,
        parent = element.closest('.form-checker'),

        PATTERN_num = /^[0-9 ]*$/,
        PATTERN_TITLE_num = "Seul les chiffres et les espaces sont autorisés",

        PATTERN_alpha = /^[A-Za-z' èéàùçâêûôîäüöïë,-.]*$/,
        PATTERN_TITLE_alpha = "Seul les lettres et les espaces sont autorisés",

        PATTERN_alphanum = /^[A-Za-z0-9' èéàùçâêûôîäüöïë,-.\/()!?:\";*+]*$/,
        PATTERN_TITLE_alphanum = "Seul les lettres, les chiffres et les espaces sont autorisés",

        PATTERN_tel = /^(?:0|\(?\+33\)?\s?|\+33\(?0\)?|0033\s?)[1-79][\s\.\-]?(?:\d\d[\s\.\-]?){4}$/,
        PATTERN_TITLE_tel = "Veuillez renseigner un numéro de téléphone valide",

        PATTERN_email = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$/,
        PATTERN_TITLE_email = "L\'email doit être écrit au format contact@exemple.com",

        PATTERN_url = /^http(s)?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=])*$/,
        PATTERN_TITLE_url = "L'url doit être au format http(s)://www.ton-url.com",

        PATTERN_TITLE_file = "L'extension du fichier n'est pas supportée.",
        
        PATTERN_date = /^[\d]{4}\-[\d]{2}\-[\d]{2}$/,
        PATTERN_date_alt = /^[\d]{2}\/[\d]{2}\/[\d]{4}$/,
        PATTERN_TITLE_date      = "Veuillez renseigner une date au format JJ/MM/AAAA";
    
    // ***** Pas de valeur ? Le champ n'est pas requis, et n'a pas été renseigné : on skippe
    
    if (value == "" || value == undefined) {
        parent.classList.remove('error');
        return true;
    }
    
    // ***** Sinon, on vérifie le format des données attendues

    switch (format) {
        case 'alpha':
            if (!PATTERN_alpha.test(value)) {
                parent.classList.add('error');
                parent.setAttribute('data-message', PATTERN_TITLE_alpha);
                return false;
            } else {
                parent.classList.remove('error');
                return true;
            }
            break;

        case 'alphanum':
            if (!PATTERN_alphanum.test(value)) {
                parent.classList.add('error');
                parent.setAttribute('data-message', PATTERN_TITLE_alphanum);
                return false;
            } else {
                parent.classList.remove('error');
                return true;
            }
            break;

        case 'url':
            if (!PATTERN_url.test(value)) {
                parent.classList.add('error');
                parent.setAttribute('data-message', PATTERN_TITLE_url);
                return false;
            } else {
                parent.classList.remove('error');
                return true;
            }
            break;

        case 'mail':
            if (!PATTERN_email.test(value)) {
                parent.classList.add('error');
                parent.setAttribute('data-message', PATTERN_TITLE_email);
                return false;
            } else {
                parent.classList.remove('error');
                return true;
            }
            break;

        case 'phone':
            if (!PATTERN_tel.test(value)) {
                parent.classList.add('error');
                parent.setAttribute('data-message', PATTERN_TITLE_tel);
                return false;
            } else {
                parent.classList.remove('error');
                return true;
            }
            break;

        case 'date':
            if (!PATTERN_date.test(value) && !PATTERN_date_alt.test(value))
            {
                parent.classList.add('error');
                parent.setAttribute('data-message', PATTERN_TITLE_date);
                return false;
            }
            else 
            {
                if(PATTERN_date_alt.test(value)) 
                {
                    var date_splitted = value.split('/');
                    var date_formatted = date_splitted[2]+'-'+date_splitted[1]+'-'+date_splitted[0];
                    element.value = date_formatted;
                }
                parent.classList.remove('error');
                parent.removeAttribute('data-message');
                return true;
            }
            break;

        case 'image_large':
        case 'image_square':
        case 'pdf':
            
            const extensions = element.getAttribute('accept').split(','),
                  split = value.split("."),
                  ext = "." + split[split.length - 1].toLowerCase();
            
            if (extensions.indexOf(ext) !== -1) {
                parent.classList.remove('error');
                return true;
            } else {
                parent.classList.add('error');
                parent.setAttribute('data-message', PATTERN_TITLE_file);
                return false;
            }
            
            break;

        default:
            return true;
    }
}

function collapse_link() {
    document.querySelectorAll('.collapse-link').forEach(function(link) {
        link.addEventListener('click', function() {
            const BOX_PANEL = this.closest('.x_panel');
            const ICON = this.querySelector('i');
            const BOX_CONTENT = BOX_PANEL.querySelector('.x_content');
    
            // fix for some div with hardcoded fix class
            if (BOX_PANEL.style.height) {
                BOX_CONTENT.style.transition = 'height 200ms';
                BOX_CONTENT.style.height = '0';
                BOX_CONTENT.addEventListener('transitionend', function() {
                    BOX_CONTENT.removeAttribute('style');
                    BOX_CONTENT.style.transition = '';
                }, { once: true });
            } else {
                BOX_CONTENT.style.transition = 'height 200ms';
                BOX_CONTENT.style.height = BOX_CONTENT.scrollHeight + 'px';
                BOX_CONTENT.addEventListener('transitionend', function() {
                    BOX_CONTENT.style.height = 'auto';
                    BOX_CONTENT.removeAttribute('style');
                }, { once: true });
            }
    
            ICON.classList.toggle('fa-chevron-up');
            ICON.classList.toggle('fa-chevron-down');
        });
    });
}

function add_item() {
    document.querySelectorAll('.articleAddItem').forEach(function(item) {
        item.addEventListener('click', function() {
        var container = document.querySelector('#articleBody');
        var target = document.querySelector("#" + this.dataset.target);
        var type = this.dataset.type;
    
        var generateId = function() {
            const seed = new Date().getTime();
            
            const randomNumber = Math.floor((Math.random() + seed) * 1000) + 1;

            return "ImageToUpload" + randomNumber;
        };
    
        var cloneAndAppend = function(element, customizeClone) {
            var clone = element.cloneNode(true);
            clone.removeAttribute('id');
            clone.classList.remove('hidden');
            customizeClone(clone);
            container.appendChild(clone);
            modif_data(container,'.article-item');
            tiny_mce();
        };
    
        switch (type) {
            case "video":
            case "html":
            case "title":
                cloneAndAppend(target, function(clone) {});
            break;
            
            case "cta":
            case "text":
            cloneAndAppend(target, function(clone) {
                clone.querySelector('textarea').classList.add('wysiwig');
            });
            break;
    
            case "content":
            var label = generateId();
            cloneAndAppend(target, function(clone) {

                clone.querySelector('textarea').classList.add('wysiwig');
                clone.querySelector('.label-file').setAttribute('for', label);
                clone.querySelector('.input-file').setAttribute('id', label);
            });
            break;
    
            case "image":
            case "pdf":
            var label = generateId(100);
            cloneAndAppend(target, function(clone) {
                clone.querySelector('.label-file').setAttribute('for', label);
                clone.querySelector('.input-file').setAttribute('id', label);
            });
            break;
    
            case "thumbnails":
            var label1 = generateId(200);
            var label2 = generateId(300);
            cloneAndAppend(target, function(clone) {
                clone.querySelector('[label-1]').setAttribute('for', label1);
                clone.querySelector('[image-1]').setAttribute('id', label1);
                clone.closest('.article-item').querySelector('[label-2]').setAttribute('for', label2);
                clone.querySelector('[image-2]').setAttribute('id', label2);
            });
            break;
        }
        });
    });
}

function modif_data(container,selector) {
    let i = 0;
    const items = container.querySelectorAll(selector);

    items.forEach(function(item) {
        const contents = item.querySelectorAll('.content');

        contents.forEach(function(content) {
            let item_name = content.getAttribute('name');
            item_name = item_name.replace(/\[(\d+)?\]/, '[' + i + ']');
            content.setAttribute('name', item_name);
        });

        i++;
    });
}

function tiny_mce() {
    tinymce.init({
        selector: 'textarea.wysiwig',
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
        entity_encoding: "raw",
        encoding: "UTF-8",
        themes: "silver",
        statusbar: false,
        skin: "tinymce-5",
        height: 400,
        resize: true,
        menubar: false,
        content_style: "body {font-size:100%;}",
        plugins: [
            'link',
            'code',
            'lists',
            'nonbreaking',
            'code'
        ],
        link_class_list: [
            { title: 'Opacité', value: 'opacity' },
        ],
        toolbar: 'undo redo | bold italic underline | bullist | link | code',
        paste_as_text: true,
        newline_behavior: 'linebreak',
        nonbreaking_force_tab: true,
        fontsize_formats: "70% 80% 90% 100% 110% 120% 130%",
        content_style: "body { font-family: Arial; font-size:90%; }"
    });
}

// Définition des accents à remplacer
const accentMap = {
    "é": "e", "è": "e", "ê": "e", "ë": "e",
    "ö": "o", "ô": "o",
    "à": "a", "â": "a",
    "ù": "u", "û": "u", "ü": "u",
    "ç": "c",
    "É": "E", "È": "E", "Ê": "E", "Ë": "E",
    "Ö": "O", "Ô": "O",
    "À": "A", "Â": "A",
    "Ù": "U", "Û": "U", "Ü": "U",
    "Ç": "C"
};

// Fonction de normalisation de la requête
function normalize(term) {

    return term.split('').map(char => accentMap[char] || char).join('');
}

function fetchTags() {
    return fetch('ajax/get_tags.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ types: 1 })
    })
    .then(response => response.json())
    .then(data => data.map(objet => objet))
    .catch(error => console.log(error));
}

function modal_tags() {
    var modal = document.querySelector('.modal_tags');

    if (!modal) return;

    var tagsSelection = modal.querySelector('.modal_tags_selection');
    var tagsList = modal.querySelector('.modal_tags_list');
    var tagsConfirm = modal.querySelector('.modal_tags_confirm');
    var tagsOrigin = tagsList.innerHTML;
    var slugsSelected = [];

    function updateTagList(slug, action) {
        const targetTag = tagsList.querySelector(`.modal_tags_item[data-slug="${slug}"]`);
        const targetTagSelected = tagsSelection.querySelector(`.modal_tags_item[data-slug="${slug}"]`);

        if (action === 'select') {
            slugsSelected.push(slug);
            tagsSelection.appendChild(targetTag.cloneNode(true));
            targetTag.classList.add('hidden');
        } else if (action === 'deselect') {
            slugsSelected.splice(slugsSelected.indexOf(slug), 1);
            targetTagSelected.remove();
            targetTag.classList.remove('hidden');
        }
    }

    modal.addEventListener('click', function(event) {
        var target = event.target;

        if (target.classList.contains('modal_tags_item')) {
        var slug = target.dataset.slug;

        if (target.closest('.modal_tags_selection')) {
            updateTagList(slug, 'deselect');
        } else if (target.closest('.modal_tags_list')) {
            updateTagList(slug, 'select');
        }
        }
    });

    tagsConfirm.addEventListener('click', function() {
        var tagsSelected = tagsSelection.querySelectorAll('.modal_tags_item');
        var articleTags = document.querySelector('#article-tags');
        var container = articleTags.querySelector('.addable_container');
        var items = articleTags.querySelectorAll('.addable_items');
        var counter = 0;
        var counterEmpty = 0;

        items.forEach(function(item) {
            if (!item.querySelector('input').value) {
                counterEmpty++;
            }
        });

        tagsSelected.forEach(function(item, index) {
            counter++;
            var value = item.dataset.name;

            items.forEach(function(existingItem) {
                if (existingItem.querySelector('input').value === value) {
                    tagsList.appendChild(item);
                    counter--;
                }
            });
        });

        var itemsToAdd = counter - counterEmpty;

        for (var i = 0; i < itemsToAdd; i++) {
            var newItem = document.createElement('div');
            newItem.className = items[0].className;
            newItem.innerHTML = items[0].innerHTML;
            newItem.innerHTML += '<span class="fa fa-trash red delete-item"></span>';
            container.appendChild(newItem).querySelector('input').removeAttribute("value");
            $.autocompleteFunction();
        }
        
        // Transformez la NodeList en un tableau
        const items_empty_array = Array.from(container.querySelectorAll('.addable_items input'));

        // Filtrer les éléments dont la valeur est vide ou absente
        const items_empty = items_empty_array.filter(function (item) {
            return !item.value;
        });

        for (var i = 0; i < items_empty.length; i++) {
            if(tagsSelected[i])
            {
                items_empty[i].value = tagsSelected[i].dataset.name;
                tagsSelected[i].remove();
            }
        }

        tagsList.innerHTML = tagsOrigin;
    });

    var normalize = function(term) {
        var ret = "";
        for (var i = 0; i < term.length; i++) {
            ret += accentMap[term.charAt(i)] || term.charAt(i);
        }
        return ret;
    };

    var searchTagInput = document.querySelector('.js-search-tag');

    if (searchTagInput) {
        searchTagInput.addEventListener('keyup', function() {
            var tagsAll = tagsList.querySelectorAll('.js-tag');
            var request = normalize(this.value.toString());
            request = request.replace(/[?/\!,.":%€$()\']/g, '').replace(/[\s]/g, '').toLowerCase();

            if (!request.length) {
                tagsList.innerHTML = tagsOrigin;

                tagsList.querySelectorAll('.js-tag').forEach(function(tag) {
                    if (slugsSelected.indexOf(tag.dataset.slug) > -1) {
                        tag.classList.add('hidden');
                    }
                });
            } else {
                let tagsToDisplay = [];

                tagsAll.forEach(function(tag) {
                    var slug = tag.dataset.slug.toString();
                    if (slug.indexOf(request) > -1) {
                        tagsToDisplay.push(tag.outerHTML);
                    }
                });

                tagsList.innerHTML = tagsToDisplay.length ? tagsToDisplay.join('') : 'Aucun tag ne correspond à votre recherche.';
            }
        });
    }
}

function add_element() {
    document.querySelectorAll('.add-item').forEach(function(addItem) {
        addItem.addEventListener('click', function() {
            var container = this.closest('.addable').querySelector('.addable_container');
            var contenu = container.querySelector('.addable_items').innerHTML;
            var classes = container.querySelector('.addable_items').className;
            container.insertAdjacentHTML('beforeend', '<div class="' + classes + '">' + contenu + '<span class="fa fa-trash red delete-item"></span></div>');

            modif_data(container,'.addable_items');

            // REACTIVER SI UTILISATION DES TAGS AVEC AUTO SUGGESTION 
            // $.autocompleteFunction();
        });
    });
    
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-item')) {
            event.target.closest('.addable_items').remove();
        }
    });
}

function preview_image() {
    document.addEventListener('change', function(event) {
        if (event.target.classList.contains('input-file')) {
            var reader = new FileReader(),
                container = event.target.closest('.form-group').querySelector('.apercu-image');
    
            var nomImage = event.target.closest('.form-group').querySelector('.nom-fichier');
            nomImage.innerHTML = event.target.value;
    
            var output = container.querySelector('.img-responsive');
    
            reader.onload = function() {
                if(container) {
                    container.classList.add('image-masked');
                    setTimeout(function() {
                        output.src = reader.result;
                        container.classList.add('image-unmasked');
                        container.classList.remove('image-masked');
                    }, 400);
                }
            };
    
            reader.readAsDataURL(event.target.files[0]);
        }
    });
}

function remove_item() {
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('delete','bouton') || event.target.closest('.delete.bouton')) {
            var container = event.target.closest('.x_panel.row').querySelector('.sortable');
            event.target.closest('.article-item').remove();
            modif_data(container,'.article-item');
        }
    });
}

function delete_element() {
    document.querySelectorAll('button.delete-post').forEach(function(button) {
        button.addEventListener('click', function() {
            const id = this.getAttribute('id');
            document.querySelector('.modal-footer input#id').value = id;
        });
    });
}

function password_utilities() {
    const password_fields = document.querySelectorAll('[password_field]');
    
    for(const password_field of password_fields) {
        const input = password_field.querySelector('.form-control');
        const icon = password_field.querySelector('[show_password]');
        
        icon.addEventListener('click', function() {
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    }
}

function galerie_preview() {
    const imagesPreview = function(input, images_preview) {
        if (input.files) {
            const files_number = input.files.length;
            for (var i = 0; i < files_number; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    // Crée un élément HTML en Vanilla JavaScript
                    var wrapper = document.createElement('p');
                    wrapper.className = 'img-galerie';
                    
                    var span = document.createElement('span');
                    span.className = 'img-wrapper';
                    
                    var img = document.createElement('img');
                    img.src = event.target.result;
                    img.alt = '';
                    img.className = 'img-galerie';
                    
                    // Ajoute l'image au wrapper
                    span.appendChild(img);
                    wrapper.appendChild(span);
                    
                    // Insère dans l'élément cible
                    images_preview.appendChild(wrapper);
                };

                reader.readAsDataURL(input.files[i]);
            }

            images_preview.classList.add('image-masked');

            setTimeout(function() {
                images_preview.classList.add('image-unmasked');
                images_preview.classList.remove('image-masked');
            }, 600);
        }
    };

    const input_galleries = document.querySelectorAll('[input_gallery]');

    for (const input of input_galleries) {
        input.addEventListener('change',handleInputChange);

        function handleInputChange() {
            const thumbnails_gallery = input.closest('.form-group').querySelector('[apercu_images]');
            imagesPreview(input, thumbnails_gallery);
        }
    }
}

function remove_item_gallery() {
    document.addEventListener('click', function(event) {
        // Vérifie si l'élément cliqué a la classe 'delete-img-galerie'
        if (event.target.closest('[delete_item]')) {
            const container = event.target.closest('[item_gallery]'); // Trouve le conteneur parent avec la classe 'img-galerie'
            
            // Ajoute la classe 'deleted' au conteneur
            container.classList.add('deleted');

            // Supprime le conteneur après un délai
            setTimeout(function() {
                container.remove();
            }, 550);
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    form_checker();
    collapse_link();
    add_item();
    tiny_mce();
    // modal_tags();
    add_element();
    preview_image();
    remove_item();
    delete_element();
    password_utilities();
    galerie_preview();
    remove_item_gallery();
});