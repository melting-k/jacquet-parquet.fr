///////////////////////////////////////////////////////
/* CREATION SELECT PERSONNALISE (DROPDOWN) */
///////////////////////////////////////////////////////

function dropdown() {

    var custom_selects = document.querySelectorAll('.custom-select');

    custom_selects.forEach(function(index)
    {
        var wrapper = index.closest('div'),
            parent = index.closest('form'),
            options = index.querySelectorAll('option'),
            multiple = index.hasAttribute('multiple'),
            choices = [],
            defaut = '',
            dropdown = document.createElement('div'),
            list = document.createElement('div'),
            icon = wrapper.querySelector('.custom-select_cursor').innerHTML;

        dropdown.classList.add('c-form_dropdown');

        if(multiple) {
            dropdown.setAttribute('multiple',true);
            options.forEach(function(key) {
                if(key.value !== '') {
                    choices.push('<button data-value="'+key.value+'" type="button"><span class="c-form_dropdown_list_checkbox"></span>'+key.textContent+'</button>'); 
                } else {
                    defaut = key.textContent;
                }
            });
        }
        else
        {
            options.forEach(function(key) {
                if(key.value !== '')
                {
                    choices.push('<button data-value="'+key.value+'" type="button">'+key.textContent+'</button>');
                }
                else
                {
                    defaut = key.textContent;
                }
            });
        }

        list.classList.add('c-form_dropdown_list');
        
        for(const choice of choices){
            list.innerHTML += choice;
        }

        wrapper.appendChild(dropdown);
        dropdown.innerHTML += '<button class="c-form_dropdown_button" type="button"><span class="c-form_dropdown_button_text">'+defaut+'</span> <span class="c-form_dropdown_button_cursor">'+icon+'</span></button>';

        dropdown.appendChild(list);
        
        // *** Evenement "Reset" provoque la réinitialisation à la valeur par défaut 
        
        parent.addEventListener('reset',function() {
            
            index.selectedIndex = 0;
            
            dropdown.querySelector('.c-form_dropdown_button_text').textContent = defaut;
            
            for (option of options) {
                option.removeAttribute('selected');
            }
            
            index.selectedIndex = -1;
        });
        
        const dropdown_button = wrapper.querySelector('.c-form_dropdown_button');
    
        dropdown_button.addEventListener('click', function(event) {
            event.preventDefault();
            if(!event.target.closest('[data-value]')) {
                document.querySelectorAll('.c-form_dropdown').forEach(function(index){
                    index.classList.remove('open');
                });
                dropdown.classList.toggle('open');
            }
        });   

        document.addEventListener('click', function(event){
            if(!event.target.closest('.c-form_dropdown') && !event.target.closest('[data-value]')) {
                if(dropdown.classList.contains('open')) {
                    dropdown.classList.remove('open');
                }
            }       
        });
        
        index.custom_values = [],
        index.custom_labels = [];
        
        dropdown.addEventListener('click',function(event){
            if(event.target.hasAttribute('data-value') || event.target.closest('[data-value]'))
            {
                event.preventDefault();
                const element = event.target.hasAttribute('data-value') ? event.target : event.target.closest('[data-value]'),
                    select = element.closest('[form-field]').querySelector('select'),
                    dropdown = element.closest('.c-form_dropdown'),
                    list = dropdown.querySelector('.c-form_dropdown_list'),
                    dropdown_button = dropdown.querySelector('.c-form_dropdown_button'),
                    valeur = element.getAttribute('data-value'),
                    texte = element.textContent,
                    button_txt = dropdown_button.querySelector('.c-form_dropdown_button_text');

                if(dropdown.hasAttribute('multiple'))
                {
                    var index = select.custom_values.indexOf(valeur);

                    if(index !== -1)
                    {
                        select.custom_values.splice(index,1);
                        select.custom_labels.splice(index,1);
                    }
                    else
                    {
                        select.custom_values.push(valeur);
                        select.custom_labels.push('<button class="c-form_dropdown_tag" data-value="'+valeur+'">'+texte+'</span>');
                    }

                    list.querySelector('button[data-value="'+valeur+'"]').classList.toggle('selected');
                    select.querySelectorAll('option').forEach(function(current){
                        current.removeAttribute('selected');
                    });

                    if(select.custom_values.length == 0)
                    {
                        button_txt.innerHTML = select.querySelector('option[disabled]').textContent;
                    }
                    else if(select.custom_values.length > 0)
                    {
                        button_txt.innerHTML = select.custom_values.length+' choix sélectionné(s)';

                        select.custom_values.forEach(function(index) {
                            select.querySelector('option[value="'+index+'"]').setAttribute('selected', true);
                        });
                    }
                    // else
                    // {   
                    //     select.custom_values.forEach(function(index) {
                    //         select.querySelector('option[value="'+index+'"]').setAttribute('selected', true);
                    //     });

                    //     button_txt.innerHTML = '';

                    //     select.custom_labels.forEach(function(index){
                    //         button_txt.innerHTML += index; 
                    //     });
                    // }

                }
                else
                {
                    select.querySelectorAll('option').forEach(function(index){
                        index.removeAttribute('selected');
                    });

                    select.querySelector('option[value="'+valeur+'"]').setAttribute('selected', 'selected');
                    dropdown.classList.toggle('open'); 
                    button_txt.innerHTML = texte; 
                    dropdown.classList.add('is_focus'); 
                }

                select.dispatchEvent(new Event('change'));
            }
        });
    });     
}

// ***** FORM CHECKER (TALEEZ)

function form_checker() {
    
    // ***** Variables utiles 

    const formulaires = document.querySelectorAll('[is-checked]');
    
    for(const formulaire of formulaires) {
        
        let formState = true,
            to_submit = formulaire.hasAttribute('no_submit') ? false : true;

        // ***** Vérification des inputs / textarea

        let form_inputs = formulaire.querySelectorAll('input,textarea,select'), i;

        for(i = 0; i < form_inputs.length; ++i) {
            const element = form_inputs[i];
            
            let name = element.getAttribute('name');

            const element_name = name.split('_');

            form_inputs[i].element_name = element_name;
            form_inputs[i].is_filled = false;
        } 
        
        form_inputs.forEach((index) => {
            if(index.type !== 'checkbox' && index.type !== 'range' && index.type !== 'radio')
            {
                index.addEventListener('input', (event) => {
                    formState = check_form_fields(index,index.element_name,true);
                });
            }
            else
            {
                index.addEventListener('change', (event) => {
                    formState = check_form_fields(index,index.element_name,true);
                });
            }
        });
        
        formulaire.addEventListener('submit', (event) => {

            event.preventDefault();
            let is_error = false;
            
            for(index of form_inputs) {
                formState = check_form_fields(index,index.element_name,true);

                if(!formState)
                {
                    is_error = true;
                }
            };
            
            if(!is_error && to_submit) {
                ajax_submit(formulaire);
            }
            
        });
    }
};

function check_form_fields(element,element_name,formState) {
    let required_state,
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
            case 'email':
            case 'phone':
            case 'date':
            case 'checkbox':
            case 'file':
            case 'zipcode' :
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
            case 'email':
            case 'phone':
            case 'date':
            case 'checkbox':
            case 'file':
            case 'zipcode' :
                format_state = check_if_format(element,element_name[1]);
                if (!format_state) {
                    formState = false;
                }
                break;
            default:
                break;
        }
    }
    
    return formState;
}

// ***** Vérification des éléments requis

function check_if_required(element) {

    let value = element.value,
        message = element.getAttribute('data-required'),
        parent = element.closest('[form-field]');
        
    if (value == "" || value == undefined) 
    {
        parent.classList.add('error');
        parent.setAttribute('data-message', message);
        element.is_filled = false;
        window.setTimeout(() => {element.dispatchEvent(new Event('filled'));},100);
       
        return false;
    } 
    else if (element.type === "checkbox" || element.type === "radio") 
    {
        let is_checked = false;
        // Si aucun bouton radio ou checkbox dans le même groupe n'est coché
        const groupe = parent.querySelectorAll(`[name="${element.name}"]`);

        if (![...groupe].every(item => !item.checked)) {
            is_checked = true;
        }

        if(is_checked) {
            groupe.forEach((input) => {
                input.is_filled = true;
                window.setTimeout(() => {input.dispatchEvent(new Event('filled'));},100);
            });

            parent.classList.remove('error');
            return true;

        } else {
            groupe.forEach((input) => {
                input.is_filled = false;
                window.setTimeout(() => {input.dispatchEvent(new Event('filled'));},100);
            });

            parent.setAttribute('data-message', message);
            parent.classList.add('error');
            return false;
        }
    } else {
        element.is_filled = true;
        window.setTimeout(() => {element.dispatchEvent(new Event('filled'));},100);
        parent.classList.remove('error');
        return true;
    }
}

// ***** Vérification du format des données
timeout_validation = undefined;

function check_if_format(element, format) {
    
    // ***** Variables utiles et patterns 
        
    let format_is_ok = true;

    const value = element.value,
        parent = element.closest('[form-field]'),

        PATTERN_alpha = /^[A-Za-z' èéàùçâêûôîäüöïë,-.]*$/,
        PATTERN_TITLE_alpha = "Seul les lettres et les espaces sont autorisés",

        PATTERN_alphanum = /^[A-Za-z0-9' èéàùçâêûôîäüöïë,-.\/()!?:\";*+]*$/,
        PATTERN_TITLE_alphanum = "Seul les lettres, les chiffres et les espaces sont autorisés",

        PATTERN_tel = /^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/,
        PATTERN_TITLE_tel = "Veuillez renseigner un numéro de téléphone valide",

        PATTERN_zipcode = /^(\d){5}$/,
        PATTERN_TITLE_zipcode = "Veuillez renseigner un code postal à 5 chiffres",

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
        element.is_filled = true;
        window.setTimeout(() => {element.dispatchEvent(new Event('filled'));},100);
        parent.classList.remove('error');
        return true;
    }
    
    // ***** Sinon, on vérifie le format des données attendues

    switch (format) {
        case 'alpha':
            if (!PATTERN_alpha.test(value)) {
                format_is_ok = false;
                parent.setAttribute('data-message', PATTERN_TITLE_alpha);
            }
            break;
        case 'alphanum':
            if (!PATTERN_alphanum.test(value)) {
                format_is_ok = false;
                parent.setAttribute('data-message', PATTERN_TITLE_alphanum);
            }
            break;
        case 'url':
            if (!PATTERN_url.test(value)) {
                format_is_ok = false;
                parent.setAttribute('data-message', PATTERN_TITLE_url);
                return false;
            }
            break;
        case 'email':
            if (!PATTERN_email.test(value)) {
                format_is_ok = false;
                parent.setAttribute('data-message', PATTERN_TITLE_email);
            }
            break;
        case 'phone':
            if (!PATTERN_tel.test(value)) {
                format_is_ok = false;
                parent.setAttribute('data-message', PATTERN_TITLE_tel);
            }
            break;
        case 'zipcode':
            if (!PATTERN_zipcode.test(value)) {
                format_is_ok = false;
                parent.setAttribute('data-message', PATTERN_TITLE_zipcode);
            }
            break;
        case 'date':
            if (!PATTERN_date.test(value) && !PATTERN_date_alt.test(value))
            {
                format_is_ok = false;
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
            }
            break;
        case 'file':
            
            var extensions = element.getAttribute('accept').split(','),
                  split = value.split("."),
                  ext = "." + split[split.length - 1].toLowerCase();
            
            if (extensions.indexOf(ext) === -1) {
                format_is_ok = false;
                parent.setAttribute('data-message', PATTERN_TITLE_file);
            }
            break;
    }

    if(format_is_ok) {

        element.is_filled = true;
        window.setTimeout(() => {element.dispatchEvent(new Event('filled'));},100);
        clearTimeout(timeout_validation);
        return true;
        
    } else {
        element.is_filled = false;
        window.setTimeout(() => {element.dispatchEvent(new Event('filled'));},100);

        clearTimeout(timeout_validation);
        timeout_validation = window.setTimeout(() => {
            parent.classList.add('error');
        },1000);

        return false;
    }
}

async function ajax_submit(form) {
    const route = form.getAttribute('action'),
          wrapper = form.querySelector('.c-form_wrapper'),
          submit = form.querySelector('#submit'),
          text_success = form.dataset.success,
          text_error = form.dataset.error,
          response = await fetch(route, {
                method:'post',
                body: new FormData(form)
          });
    
    const text = await response.text(),
          json = JSON.parse(text);
    
    const overlay = document.createElement('div'),
          message = document.createElement('p');
    
    overlay.classList.add('c-form_overlay','close');
    message.classList.add('c-form_overlay_text');
    
    if(json.error)
    {
        message.innerHTML = text_error;
    }
    else
    {
        message.innerHTML = text_success;
        form.reset();
    }
    
    form.appendChild(overlay);
    overlay.appendChild(message);
    
    wrapper.style.opacity = '0.2';
    submit.setAttribute('disabled',true);

    const currentPos = window.scrollY;

    let wrapper_position = wrapper.getBoundingClientRect().top + window.scrollY - 100,
        time = 500,
        start = null;

    wrapper_position = +wrapper_position, time = +time;
    window.requestAnimationFrame(function step(currentTime) {
        start = !start ? currentTime : start;
        
        var progress = currentTime - start;

        if (currentPos < wrapper_position) {
            window.scrollTo(0, ((wrapper_position - currentPos) * progress / time) + currentPos);
        } else {
            window.scrollTo(0, currentPos - ((currentPos - wrapper_position) * progress / time));
        }
        if (progress < time) {
            window.requestAnimationFrame(step);
        } else {
            window.scrollTo(0, wrapper_position);
        }
    });
    
    setTimeout(function(){
        overlay.classList.remove('close');
        
        if(!json.error) {
            form.reset();
            const focus_items = form.querySelectorAll('.is_focus');
            for (item of focus_items) {
                item.classList.remove('is_focus');
            }
        }
        
        setTimeout(function(){
            overlay.classList.add('close');
            wrapper.style.opacity = '1';
            submit.removeAttribute('disabled');
            
            setTimeout(function(){
                form.removeChild(overlay);
            },500);
            
        },4500);
        
    },250);

}

function display_label() {
    const inputs = document.querySelectorAll('input,textarea,select');;
    
    for (input of inputs)
    {
        input.addEventListener('keyup', function(event) {
            
            const input_content = event.target.value;
            
            if(input_content == "")
            {
                event.target.classList.remove('is_focus');
            }
            else
            {
                event.target.classList.add('is_focus');
            }
        })
    }
}

function conditionnal_display() {
    const conditions = document.querySelectorAll('[condition-target]');

    if(!conditions.length) 
        return;

    for(const condition of conditions) {
        const target = condition.getAttribute('condition-target'),
              target_element = document.querySelector(`[data-condition="${target}"]`),
              target_inputs = target_element.querySelectorAll('input'),
              radio_buttons = condition.closest('[form-field]').querySelectorAll('input');
 
        target_element.classList.add('inactive');

        radio_buttons.forEach((radio) => {
            radio.addEventListener('change',conditionChangeHandler);
        });

        function conditionChangeHandler() {
            if(condition.checked) {
                target_inputs.forEach((input) => {
                    input.removeAttribute('disabled');
                });
                target_element.classList.remove('inactive');
            } else {
                target_inputs.forEach((input) => {
                    input.setAttribute('disabled',true);
                });
                target_element.classList.add('inactive');
            }
        }
    }
}

function input_range() {
    const ranges = document.querySelectorAll('input[type="range"]');

    if(!ranges) return;

    for(const range of ranges) {
        const parent = range.closest('[form-field]'),
              range_text = parent.querySelector('[js-range-value]');
              
        handleRangeChange()

        range.addEventListener('input',handleRangeChange);

        function handleRangeChange() {
            range.style.setProperty("--value", range.value);
            range.style.setProperty("--min", range.min === "" ? "0" : range.min);
            range.style.setProperty("--max", range.max === "" ? "100" : range.max);
            range_text.innerHTML = range.value;
        }
    }
}

window.addEventListener("load", function() {
    dropdown();
    form_checker();
    display_label();
    conditionnal_display();
    input_range();
}); 