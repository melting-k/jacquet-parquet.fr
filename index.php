<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title>Baptiste Jacquet, parquet à Toulouse, pose & rénovation Haute-Garonne</title>
		<meta name='description' content="Baptise Jacquet, parquet à Toulouse, Haute-Garonne. Nous intervenons pour tous les besoins : parquet massif, parquets flottants, et également pour la création de terrasses bois"/>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

		<link rel="icon" href="images/icone.ico"/>
		<!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		
		<!-- Design -->
		<link rel="stylesheet" href="design.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="js/slick/slick.css"/>
	</head>
	
	<body>
		<header>
			<div class="carousel">
				<div class="slide-1"></div>
				<div class="slide-2"></div>
				<div class="slide-3"></div>
				<div class="slide-4"></div>
				<div class="slide-5"></div>
				<div class="slide-6"></div>
				<div class="slide-7"></div>
			</div>
			<nav>
				<div>
					<p id="logo">
						<a href="http://www.jacquet-parquet.fr" title="Baptise Jacquet, parquet à Toulouse, Merville"><img src="images/logo-jaquet-parquet-toulouse.png" alt="Logo Jacquet Parquet Toulouse" class="middle"/></a>
					</p><!--
				---><ul id="menu">
						<li class="active"><a href="http://www.jacquet-parquet.fr" title="Accueil Jacquet Parquet à Toulouse">ACCUEIL</a></li><!--
					---><li><button title="Nos prestations de parquet à Toulouse">NOS SERVICES</button>
							<ul id="s-menu">
								<li><a href="fourniture-vente-parquet-toulouse.php" title="Fourniture et vente de parquet à Toulouse">Fourniture de parquet</a></li>
								<li><a href="pose-renovation-parquet-toulouse.php" title="Pose et rénovation de parquet">Pose & rénovation de parquet</a></li>
								<li><a href="terrasses-bois-toulouse.php" title="Création de terrasses en bois">Terrasses en bois</a></li>
							</ul>
						</li><!--
					---><li><a href="realisations-parquet-terrasse-toulouse.php" title="Nos réalisations sur la région toulousaine">RÉALISATIONS</a></li><!--
					---><li><a href="references-et-clients-baptiste-jacquet.php" title="Nos principales références et clients">RÉFÉRENCES</a></li><!--
					---><li><a href="contacter-jacquet-parquet-a-toulouse.php" title="Contacter un parqueteur à Toulouse">CONTACT</a></li>
					</ul>
				</div>
			</nav>
			<div id="titre-page">
				<p class="center blanc">
					LES PARQUETS BAPTISTE JACQUET À TOULOUSE
					<br/><br/>
					<span class="font46 alright-sb">Artisan, Menuisier & Parqueteur</span>
					<br/><br/>
					<a href="fourniture-vente-parquet-toulouse.php" title="Notre gamme de parquets" class="bouton">NOS PARQUETS</a>
					<br/>
					<a href="#main-content" class="go-bottom"><img src="images/cursor.png" alt="Curseur"/></a>
				</p>
			</div>
		</header>
		<section id="main-content" class="accueil">
			<div>
				<h1 class="accueil">Les parquets Jacquet, modernité & tradition à Toulouse</h1>
				<p class="center blanc">
					<img src="images/picto-losange.png" alt="Losange"/>
					L’entreprise Baptiste Jacquet, spécialiste du parquet massif et de la pose de parquet à Toulouse est née en 2006. Baptiste Jacquet relève d’un savoir-faire unique lui permettant de répondre 
					à tous types de demandes, de la pose de parquet traditionnelle, collé, cloué ou flottant, à la création d’un sol sur mesure à base d’essences de bois nobles ou exotiques. Nous vous proposons 
					une large gamme de choix en fourniture de parquet pour répondre au mieux à vos attentes et à votre projet. Nous intervenons également pour la création de terrasses et de plages de piscines sur mesure, ou tout 
					espace extérieur en bois pour les particuliers comme les professionnels. N’hésitez pas à nous contacter au 05 61 99 84 79 ou via la page contact, pour toute demande de renseignements supplémentaires ou de devis, bonne visite !
				</p>
				<nav id="accelerateurs">
					<div class="parquets">
						<a href="fourniture-vente-parquet-toulouse.php" title="Fourniture et vente de parquet">
							<span>Nos parquets</span>
						</a>
						<img src="images/parquets-toulouse.png" alt="Parquets à Toulouse"/>
					</div>
					<div class="pose">
						<a href="pose-renovation-parquet-toulouse.php" title="Pose et rénovation de parquet">
							<span>Pose & Rénovation</span>
						</a>
						<img src="images/pose-renovation-parquet-toulouse.png" alt="Parquets à Toulouse"/>
					</div>
					<div class="terrasses">
						<a href="terrasses-bois-toulouse.php" title="Création de terrasses en bois">
							<span>Création Terrasses</span>
						</a>
						<img src="images/terrasses-bois-toulouse.png" alt="Terrasses bois"/>
					</div>
					<div class="realisations">
						<a href="realisations-parquet-terrasse-toulouse.php" title="Nos réalisations sur la région toulousaine">
							<span>Nos Réalisations</span>
						</a>
						<img src="images/realisations-parquet-toulouse.png" alt="Nos réalisations à Toulouse"/>
					</div>
					<div class="contact">
						<a href="contacter-jacquet-parquet-a-toulouse.php" title="Contacter un parqueteur à Toulouse">
							<span>Nous Contacter</span>
						</a>
						<img src="images/contacter-jacquet-parquet.png" alt="Nous contacter"/>
					</div>
				</nav>
			</div>
		</section>
		<aside id="actualites">
			<div>
				<p class="center blanc"><b>ACTUALITÉS</b><br/><img src="images/picto-losange.png" alt="Losange"/></p>
				<div id="txt-actus" class="center blanc">
					<?php
						$fp = fopen ("docs/news.txt", "r");
						$contenu_du_fichier = fgets ($fp, 50000);
						fclose ($fp);
						echo $contenu_du_fichier;
					?> 
				</div>
			</div>
		</aside>
		<footer>
			<div>
				<nav>
					<a href="http://www.jacquet-parquet.fr" title="Accueil Jacquet Parquet à Toulouse" class="active">ACCUEIL</a>
					<a href="fourniture-vente-parquet-toulouse.php" title="Fourniture et vente de parquet à Toulouse">NOS PARQUETS</a>
					<a href="pose-renovation-parquet-toulouse.php" title="Pose et rénovation de parquet">POSE & RÉNOVATION DE PARQUET</a>
					<a href="terrasses-bois-toulouse.php" title="Création de terrasses en bois">TERRASSES</a>
					<a href="realisations-parquet-terrasse-toulouse.php" title="Nos réalisations sur la région toulousaine">RÉALISATIONS</a>
					<a href="references-et-clients-baptiste-jacquet.php" title="Nos principales références et clients">RÉFÉRENCES</a>
					<a href="contacter-jacquet-parquet-a-toulouse.php" title="Contacter un parqueteur à Toulouse">CONTACT</a>
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
					<br/><br/><br/>

					Une <a href="http://www.melting-k.fr" title="Création de sites internet à Toulouse" target="_blank">création web Melting K</a>
				</p><!--
			---><p class="right">
					<img src="images/logo-footer-jacquet-parquet.jpg" alt="Logo Jacquet Parquet" class="middle"/>
				</p>
			</div>
		</footer>
		
		<!-- SCRIPTS -->
		<script type="text/javascript" src="js/prefixfree.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>  
		<script src="js/smoothscroll.js"></script>
		
		<!-- CARROUSEL -->
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="js/slick/slick.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.carousel').slick({
				  arrows:false,
				  autoplay:true,
				  autoplaySpeed:3500,
				  speed:2500,
				  fade:true,
				  draggable:false
				});
			});
		</script> 
		
	</body>
</html>