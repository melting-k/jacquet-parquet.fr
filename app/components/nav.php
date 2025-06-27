<nav class="c-nav">
    <a href="<?=$NAV->home->url?>" title="<?=$NAV->home->title?>" class="c-nav_logo">
        <?php
            include 'img/logo-baptiste-jacquet.svg';
        ?>
    </a>

    <button class="u-burger hidden-lg--min" data-action="open_nav">
        <span class="u-burger_bar"></span>
        <span class="u-burger_bar"></span>
        <span class="u-burger_bar"></span>
    </button>

    <ul class="c-nav_menu" data-role="nav">
<?php
    foreach($NAV as $key => $item) {
        if($item->is_nav) {
?>
        <li class="c-nav_menu_item <?=$PAGE_name==$key ? "active" : ""?>">
            <a href="<?=$item->url?>" title="<?=$item->title?>"><?=$item->label?></a>
        </li>
<?php
        }
    }
?>
    </ul>

    <button class="c-nav_contact_button" data-action="open_contact">
        <?=$icons->contact?>
    </button>

    <div class="c-nav_contact" data-role="contact">
        <h2 class="c-nav_contact_title">
            <?=$header->contact->title?>
        </h2>
        <form class="c-form" is-checked action="<?=$header->contact->form->action?>" method="post" id="<?=$header->contact->form->id?>" data-error="Une erreur est survenue lors de l'envoi du formulaire.<br/>Veuillez ré-essayer" data-success="Nous vous remercions pour votre message, celui-ci vient de nous être transmis. <br/><br/>Nous reviendrons vers vous dans les meilleurs délais.">
            <div class="c-form_wrapper">
                <div class="grid">
<?php
foreach($header->contact->form->fields as $field)
{
if($field->type !== "intro") {
    $field_name = '';
    $field_name.= $field->required ? 'required_' : '';
    $field_name.= $field->format ? $field->format.'_' : '';
    $field_name.= $field->name;

    $field->placeholder .= $field->required ? ' *' : '';
}
?>
                    <div class="c-form_field<?=$field->class ?? ""?>" form-field>
<?php    
switch($field->type) {
    case 'text' :
    case 'email'
?>
                    
                        <input name="<?=$field_name?>" <?=$field->required ? 'data-required="Ce champ est obligatoire"' : ''?> type="<?=$field->type?>" placeholder="<?=$field->placeholder?>">
<?php
    break;

    case 'select' :
?>
                        <div class="custom-select_cursor"><?=$icons->arrow?></div>
                        <select name="<?=$field_name?>" <?=$field->multiple ?? ''?> <?=$field->required ? 'data-required="Ce champ est obligatoire"' : ''?> class="custom-select">
                            <option value="" selected disabled hidden><?=$field->placeholder?></option>
<?php
        foreach($field->options as $option) {
?>
                            <option value="<?=$option?>"><?=$option?></option>
<?php            
        }
?>
                        </select>
<?php                            
    break;

    case 'textarea' :
        ?>
                        <textarea name="<?=$field_name?>" <?=$field->required ? 'data-required="Ce champ est obligatoire"' : ''?> placeholder="<?=$field->placeholder?>"></textarea>
        <?php                            
    break;
    case 'intro' :
        ?>
                        <?=$field->content?>
        <?php                            
    break;
}
?>
                    </div>
<?php
}
?>
                    <div class="c-form_field--consent" form-field>
                        <div class="c-form_radio">
                            <input id="consentement" name="required_consentement" data-required="Vous devez cocher cette case pour soumettre le formulaire" type="checkbox" value="Oui"/><label for="consentement"><?=$header->contact->form->consent?></label>
                        </div>
                        <button type="submit" class="u-button--small" id="submit"><?=$header->contact->form->send?></button>
                        <input type="hidden" name="form" value="<?=$header->contact->form->id?>"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</nav>