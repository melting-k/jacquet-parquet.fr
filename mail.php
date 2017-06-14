<?php
	if(isset($_POST['host']) && $_POST['host']=='OK') //Si "host" est égal à OK
    {
		$page = $_POST['page'];
		$TO = "baptiste.jacquet@club.fr";
		$entete = "From: Jacquet Parquet <contact@jacquet-parquet.fr> \r\n";
		$entete .= "Content-Type: text/plain; charset=\"UTF-8\"; DelSp=\"Yes\"; format=flowed \r\n";
		$entete .= "Content-Disposition: inline \r\n";
		$entete .= "Content-Transfer-Encoding: 8bit \r\n";
		$entete .= "MIME-Version: 1.0";
		$message = "";
		$subject = "Nouveau message de votre site [JACQUET-PARQUET.FR]";
		$message = "Vous avez reçu un message envoyé par le biais de votre site internet.\n\nVoici les coordonnées laissées par votre client :\n\n";
		while (list($key, $val) = each($_POST)) {
			if ($key=='host' || $key=='page')
			{
		
			}
			else
			{
			$message .="$key : $val\n";
			$message = stripslashes($message);
			}
		}
		$message .= "\nAttention, pour répondre à votre client, utilisez l'adresse mail qu'il vous a communiqué.";
		mail($TO, $subject, utf8_decode(utf8_encode($message)), $entete);
		Header("Location:".$page."?message=sent#main-content");
	}
	else
	{
		Header("Location:".$page);
	}
?>
