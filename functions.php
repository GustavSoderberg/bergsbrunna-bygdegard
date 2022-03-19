<?php

//Function to add custom CSS for the block editor
function custom_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );
add_theme_support('editor-styles');
add_editor_style( 'editor-style.css' );

//Creates a menu for the Header
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

// Function to redirect the user to a specific location
function redirectUser($url){
    wp_redirect(home_url($url));
    exit;
}

//Function to handle POST requests -> wp_mail -> thank-you page
function prefix_send_email_to_admin() {
	$ToEmail = 'kontakt@bergsbrunnabygdegard.se';
	switch ($_POST['type']) {
			
  		case 1:
			
			$EmailSubject = 'Bokningsförfrågan från '.$_POST["name"];
			$mailheader = "Reply-To: ".$_POST["email"]."\r\n"; 
			$MESSAGE_BODY ='<!DOCTYPE html>';
			$MESSAGE_BODY .='<html>';
			$MESSAGE_BODY .='  <head>';
			$MESSAGE_BODY .='    <meta charset="UTF-8">';
			$MESSAGE_BODY .='    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
			$MESSAGE_BODY .='    <style>';
			$MESSAGE_BODY .='@import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,300italic,400italic");';
			$MESSAGE_BODY .='body {';
			$MESSAGE_BODY .='    font-family: Source Sans Pro;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.title-container {';
			$MESSAGE_BODY .='    margin-top: 1em;';
			$MESSAGE_BODY .='    display: grid;';
			$MESSAGE_BODY .='    grid-template-columns: auto';
			$MESSAGE_BODY .='    padding: 10px;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.title-item {';
			$MESSAGE_BODY .='    background-color: white;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.others-container {';
			$MESSAGE_BODY .='    margin-top: 1em;';
			$MESSAGE_BODY .='    display: grid;';
			$MESSAGE_BODY .='    grid-template-columns: auto auto;';
			$MESSAGE_BODY .='    padding: 10px;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.others-item {';
			$MESSAGE_BODY .='    background-color: white;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='p {';
			$MESSAGE_BODY .='    font-size: 1.25em;';
			$MESSAGE_BODY .='    color: #aaaaaa;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='#darker {';
			$MESSAGE_BODY .='    color: #818181;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='    </style>';
			$MESSAGE_BODY .='  </head>';
			$MESSAGE_BODY .='  <body>';
			$MESSAGE_BODY .='      <section class="title-container">';
			$MESSAGE_BODY .='        <div class="title-item">';
			$MESSAGE_BODY .='          <p id="darker">Det finns en ny bokningsförfrågan från '.$_POST["name"].'</p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='      </section>';
			$MESSAGE_BODY .='      <section class="others-container">';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>E-postadress:<br /><span id="darker">'.$_POST["email"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Telefonnummer:<br /><span id="darker">'.$_POST["tel"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Person/organisationsnummer:<br /><span id="darker">'.$_POST["nummer"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Adress:<br /><span id="darker">'.$_POST["adress"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Lokal:<br /><span id="darker">'.$_POST["lokal"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Medlem:<br /><span id="darker">'.$_POST["medlem"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Datum:<br /><span id="darker">'.$_POST["sdate"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Tid:<br /><span id="darker">'.$_POST["stime"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Till den:<br /><span id="darker">'.$_POST["edate"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Tid:<br /><span id="darker">'.$_POST["etime"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p> <br /><span id="darker">'.$_POST["projektor"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p> <br /><span id="darker">'.$_POST["mikrofon"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='      </section>';
			$MESSAGE_BODY .='      <section class="title-container">';
			$MESSAGE_BODY .='        <div class="title-item">';
			$MESSAGE_BODY .='          <p>Meddelande:<br /><span id="darker">'.nl2br($_POST["desc"]).'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='      </section>';
			$MESSAGE_BODY .='  </body>';
			$MESSAGE_BODY .='</html>';
			
    		break;
			
  		case 2:
			
			$EmailSubject = 'Meddelande från '.$_POST["name"];
			$mailheader = "Reply-To: ".$_POST["email"]."\r\n"; 
			$MESSAGE_BODY ='<!DOCTYPE html>';
			$MESSAGE_BODY .='<html>';
			$MESSAGE_BODY .='  <head>';
			$MESSAGE_BODY .='    <meta charset="UTF-8">';
			$MESSAGE_BODY .='    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
			$MESSAGE_BODY .='    <style>';
			$MESSAGE_BODY .='@import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,300italic,400italic");';
			$MESSAGE_BODY .='body {';
			$MESSAGE_BODY .='    font-family: Source Sans Pro;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.others-container {';
			$MESSAGE_BODY .='    margin-top: 1em;';
			$MESSAGE_BODY .='    display: grid;';
			$MESSAGE_BODY .='    grid-template-columns: auto;';
			$MESSAGE_BODY .='    padding: 10px;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.others-item {';
			$MESSAGE_BODY .='    background-color: white;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='p {';
			$MESSAGE_BODY .='    font-size: 1.25em;';
			$MESSAGE_BODY .='    color: #aaaaaa;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='#darker {';
			$MESSAGE_BODY .='    color: #818181;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='    </style>';
			$MESSAGE_BODY .='  </head>';
			$MESSAGE_BODY .='  <body>';
			$MESSAGE_BODY .='      <section class="others-container">';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p id="darker">Nytt meddelande från '.$_POST["name"].'<br />'.$_POST["email"].'</p>';
			$MESSAGE_BODY .='          <p>Meddelande:<br /><span id="darker">'.nl2br($_POST["comment"]).'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='      </section>';
			$MESSAGE_BODY .='  </body>';
			$MESSAGE_BODY .='</html>';
			
    		break;
			
  		case 3:
			
			$EmailSubject = 'Jag vill vara medlem hos Bergsbrunna Bygdegård';
			$mailheader = "Reply-To: ".$_POST["email"]."\r\n"; 
			$MESSAGE_BODY ='<!DOCTYPE html>';
			$MESSAGE_BODY .='<html>';
			$MESSAGE_BODY .='  <head>';
			$MESSAGE_BODY .='    <meta charset="UTF-8">';
			$MESSAGE_BODY .='    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
			$MESSAGE_BODY .='    <style>';
			$MESSAGE_BODY .='@import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,300italic,400italic");';
			$MESSAGE_BODY .='body {';
			$MESSAGE_BODY .='    font-family: Source Sans Pro;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.title-container {';
			$MESSAGE_BODY .='    margin-top: 1em;';
			$MESSAGE_BODY .='    display: grid;';
			$MESSAGE_BODY .='    grid-template-columns: auto';
			$MESSAGE_BODY .='    padding: 10px;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.title-item {';
			$MESSAGE_BODY .='    background-color: white;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.others-container {';
			$MESSAGE_BODY .='    margin-top: 1em;';
			$MESSAGE_BODY .='    display: grid;';
			$MESSAGE_BODY .='    grid-template-columns: auto auto;';
			$MESSAGE_BODY .='    padding: 10px;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='.others-item {';
			$MESSAGE_BODY .='    background-color: white;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='p {';
			$MESSAGE_BODY .='    font-size: 1.25em;';
			$MESSAGE_BODY .='    color: #aaaaaa;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='#darker {';
			$MESSAGE_BODY .='    color: #818181;';
			$MESSAGE_BODY .='}';
			$MESSAGE_BODY .='    </style>';
			$MESSAGE_BODY .='  </head>';
			$MESSAGE_BODY .='  <body>';
			$MESSAGE_BODY .='      <section class="title-container">';
			$MESSAGE_BODY .='        <div class="title-item">';
			$MESSAGE_BODY .='          <p id="darker">Jag vill vara medlem hos Bergsbrunna Bygdegård</p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='      </section>';
			$MESSAGE_BODY .='      <section class="others-container">';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Namn:<br /><span id="darker">'.$_POST["name"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>E-postadress:<br /><span id="darker">'.$_POST["email"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Adress:<br /><span id="darker">'.$_POST["adress"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Postnummer:<br /><span id="darker">'.$_POST["pnr"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='        <div class="others-item">';
			$MESSAGE_BODY .='          <p>Stad:<br /><span id="darker">'.$_POST["stad"].'</span></p>';
			$MESSAGE_BODY .='        </div>';
			$MESSAGE_BODY .='  </body>';
			$MESSAGE_BODY .='</html>';
			
    		break;
			
  		default:
			
			echo "Failed to catch / unknown value of from-type";
			
	}
	
	//Adds HTML parameter to the email instead of the default text/plain
			add_filter('wp_mail_content_type', function( $content_type ) {
            return 'text/html';
			});
	
	//Sends the email
			if (wp_mail( $ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) ) {
			 redirectUser(home_url('/tack/'));
     		}
			
			else echo "Failed to send the request and I am now unfortunately dead. Please go back and try again";
	
}
add_action( 'admin_post_nopriv_contact_form', 'prefix_send_email_to_admin' );
add_action( 'admin_post_contact_form', 'prefix_send_email_to_admin' );

