<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="format-detection" content="telephone=no">
		<title>Contactez nous à Toulouse pour vos questions ou demandes de devis</title>
		<meta name='description' content="Retrouvez les coordonnées de l'entreprise Jacquet Parquet à Toulouse, afin de nous soumettre vos interrogations ou vos demandes de devis, ou pour plus de détail sur nos prestations"/>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

		<link rel="icon" href="images/icone.ico"/>
		<!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

		<!-- Design -->
		<link rel="stylesheet" href="design.css?v=1" type="text/css" media="screen" />
		<link rel="stylesheet" href="design-mobile.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="js/slick/slick.css"/>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-93006386-2"></script>
	</head>

	<body>
		<header class="contact">
			<nav>
				<button id="bt-menu"> <span class="barre-menu"></span> </button>
				<div>
					<p id="logo">
						<a href="http://www.jacquet-parquet.fr" title="Baptise Jacquet, parquet à Toulouse, Merville"><img src="images/logo-jaquet-parquet-toulouse.png" alt="Logo Jacquet Parquet Toulouse" class="middle"/></a>
					</p><!--
				---><ul id="menu">
						<li><a href="http://www.jacquet-parquet.fr" title="Accueil Jacquet Parquet à Toulouse">ACCUEIL</a></li><!--
					---><li><button title="Nos prestations de parquet à Toulouse">NOS SERVICES</button>
							<ul id="s-menu">
								<li><a href="fourniture-vente-parquet-toulouse.php" title="Fourniture et vente de parquet à Toulouse">Fourniture de parquet</a></li>
								<li><a href="pose-renovation-parquet-toulouse.php" title="Pose et rénovation de parquet">Pose & rénovation de parquet</a></li>
								<li><a href="terrasses-bois-toulouse.php" title="Création de terrasses en bois">Terrasses en bois</a></li>
							</ul>
						</li><!--
					---><li><a href="realisations-parquet-terrasse-toulouse.php" title="Nos réalisations sur la région toulousaine">RÉALISATIONS</a></li><!--
					---><li><a href="references-et-clients-baptiste-jacquet.php" title="Nos principales références et clients">RÉFÉRENCES</a></li><!--
					---><li class="active"><a href="contacter-jacquet-parquet-a-toulouse.php" title="Contacter un parqueteur à Toulouse">CONTACT</a></li>
					</ul>
				</div>
			</nav>
			<div id="titre-page">
				<p class="center blanc">
					LES PARQUETS BAPTISTE JACQUET À TOULOUSE
					<br/><br/>
					<span class="font46 alright-sb">Contacter notre société à Toulouse</span>
					<br/><br/><br/>
					<a href="http://www.jacquet-parquet.fr" title="Retour à l'accueil du site internet" class="bouton">RETOUR ACCUEIL</a>
				</p>
			</div>
		</header>
		<section id="main-content" class="contact">
			<div>
				<section class="contact">
					<div class="column-big left">
						<h1 class="center">Un projet ? Une question ?<br/><span></span></h1>
						<p class="center references">
							Jacquet Parquet assure la gestion globale de vos projets de parquet et terrasse bois à Toulouse et alentours (Blagnac, Colomiers, Tournefeuille, Muret, Saint-Orens, Quint-Fonsegrives, Balma, L’Union, Saint-Jean…).<br/>
								Pour toute demande de renseignements, n’hésitez pas à nous contacter. <br/>
								Nous nous déplaçons chez vous pour établir une estimation de votre projet, puis un devis détaillé et personnalisé.. <br/>
								A très vite !
							<br/><br/><br/>
							<b class="font24">
								Tél. : 05 61 99 84 79<br/>
								Port. : 06 62 35 05 43
							</b>
							<br/>
							contact@jacquet-parquet.fr
						</p>
					</div><!--
				---><div class="column-small right">
						<form id="formcontact" method="POST" action="mail.php" onsubmit="return valider();">
							<?php
							if (isset($_GET['message']) && $_GET['message']=="sent")
							{
							?>
							<p class="blanc">
								<br/><br/>
								Merci pour votre message, celui-ci vient de nous être transmis.
								<br/><br/>
								Nous allons en prendre connaissance et nous vous apporterons une réponse sous les meilleurs délais.
							</p>
							<?php
								}
								else
								{
							?>
								<input type="text" name="Nom" id="Nom" tabindex="10" onfocus="inputFocus(this);" onblur="inputBlur(this);" value="Nom * :"/><br/>
								<input type="text" name="Email" id="Email" tabindex="20" onfocus="inputFocus(this);" onblur="inputBlur(this);" value="Email * :"/><br/>
								<input type="text" name="Telephone" id="Telephone" tabindex="30" onfocus="inputFocus(this);" onblur="inputBlur(this);" value="Téléphone :"/><br/>
								<input type="text" name="Adresse" id="Adresse" tabindex="40" onfocus="inputFocus(this);" onblur="inputBlur(this);" value="Adresse :"/><br/>
								<input type="text" name="Demande" id="Demande" tabindex="50" onfocus="inputFocus(this);" onblur="inputBlur(this);" value="Demande :"/><br/>
								<input type="text" name="host" id="host" value="OK" style="display:none;" tabindex="55"/>
								<input type="hidden" name="page" value="contacter-jacquet-parquet-a-toulouse.php" tabindex="56"/>
								<textarea name="Message" id="Message" tabindex="60" onfocus="inputFocus(this);" onblur="inputBlur(this);">Message :</textarea><br/>
								<div id="field-consentement" class="input-field">
                            <div class="form-radio">
                                <input id="consentement" name="consentement" type="checkbox" value="Oui"><label for="consentement">En soumettant ce formulaire, j'accepte que les données transmises soient exploitées par Ballon Bleu Horizon dans le cadre de ma prise de contact.*</label>
                            </div>
                        </div>
								<button
								class="g-recaptcha bouton"
								data-sitekey="6LfTYHcUAAAAAMKnErcexIT2taocOmOwC4vVfaYP"
								data-callback="onSubmit">
								Envoyer
								</button>
							<?php
								}
							?>
						</form>
					</div>
				</section>
			</div>
		</section>
		<footer>
			<div>
				<nav>
					<a href="http://www.jacquet-parquet.fr" title="Accueil Jacquet Parquet à Toulouse">ACCUEIL</a>
					<a href="fourniture-vente-parquet-toulouse.php" title="Fourniture et vente de parquet à Toulouse">NOS PARQUETS</a>
					<a href="pose-renovation-parquet-toulouse.php" title="Pose et rénovation de parquet">POSE & RÉNOVATION DE PARQUET</a>
					<a href="terrasses-bois-toulouse.php" title="Création de terrasses en bois">TERRASSES</a>
					<a href="realisations-parquet-terrasse-toulouse.php" title="Nos réalisations sur la région toulousaine">RÉALISATIONS</a>
					<a href="references-et-clients-baptiste-jacquet.php" title="Nos principales références et clients">RÉFÉRENCES</a>
					<a href="contacter-jacquet-parquet-a-toulouse.php" title="Contacter un parqueteur à Toulouse" class="active">CONTACT</a>
				</nav>
				<p>
					SARL Baptiste Jacquet<br/>
					474 Chemin Teoulets<br/>
					31330 Merville
					<br/><br/>
					Tél. : 05 61 99 84 79<br/>
					Port. : 06 62 35 05 43<br/>
					contact@jacquet-parquet.fr
				</p><!--
			---><p class="middle">
					Copyright 2015 - <a href="http://www.jacquet-parquet.fr" title="Accueil Jacquet Parquet à Toulouse">Parquets Baptiste Jacquet</a> - Tous droits réservés<br/>
					<a href="fourniture-vente-parquet-toulouse.php" title="Fourniture et vente de parquet à Toulouse">Parquet - Parquet massif - Parquet contrecollé</a><br/>
					<a href="terrasses-bois-toulouse.php" title="Création de terrasses en bois">Terrasse bois exotique</a> - Composite - Pose collée - Clouée - Flottant<br/>
					<a href="pose-renovation-parquet-toulouse.php" title="Pose et rénovation de parquet">Fourniture & Pose à Toulouse</a> - Haute Garonne (31)
					<br/><br/>
					<a href="mentions-legales.php" title="mentions légales droneperspectives.fr" class="js-closeCookies">Mentions Légales</a><br>
					Une <a href="http://www.melting-k.fr" title="Création de sites internet à Toulouse" target="_blank">création web Melting K</a>
				</p><!--
			---><p class="right">
					<img src="images/logo-footer-jacquet-parquet.jpg" alt="Logo Jacquet Parquet" class="middle"/>
				</p>
			</div>
		</footer>
		<div class="u-banner-cookies">
		<div class="width940">
						<p class="u-banner-cookies_texte">
								En poursuivant votre navigation sur ce site, vous acceptez que nous utilisions des cookies pour mesurer l'audience de notre site. Pour en savoir plus et paramétrer vos cookies, <a href="mentions-legales.php" title="mentions légales droneperspectives.fr" class="js-closeCookies">cliquez ici</a>.
						</p>
						<div class="u-banner-cookies_button">
							<a class="u-banner-cookies_close js-closeCookies">J'accepte</a>
						</div>
		</div>
	</div>
		<!-- SCRIPTS -->
		<script type="text/javascript" src="js/prefixfree.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="js/js.js"></script>
		<script type="text/javascript" src="js/analyticstracking.js"></script>
		<script src="js/smoothscroll.js"></script>

		<!-- FORMULAIRE -->
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script type="text/javascript">

				function onSubmit(token) {

					var checkBox = document.getElementById("consentement");
					if (formcontact.Nom.value == "" || formcontact.Nom.value == "Nom * :")
					{
						alert ( "Vous devez renseigner votre Nom !" );
						grecaptcha.reset();
						return false;
					} else if (checkBox.checked == false)
					{
						alert ( "Vous devez cocher la case consentement !" );
						grecaptcha.reset();
						return false;
					} else if (formcontact.Email.value == "" || formcontact.Email.value == "Email * :")
					{
						alert ( "Vous devez renseigner votre adresse email pour être recontacté !" );
						grecaptcha.reset();
						return false;
					} else {
						document.getElementById("formcontact").submit();
					}

				}

		</script>

		<script type="text/javascript">
			function inputFocus(input) {
			if(input.value==input.defaultValue) {
			input.value = '';
			}
			}
			function inputBlur(input) {
			  if(input.value=='') {
				input.value = input.defaultValue;
			  }
			}
		</script>
	</body>
</html>
