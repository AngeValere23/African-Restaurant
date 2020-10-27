<?php
/*---------------------------------------------------------------*/
/*
    Titre : Formulaire complet d'envoi de mail                                                                            
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=57
    Auteur           : Mathieu                                                                                            
    Date édition     : 01 Sept 2004                                                                                       
    Date mise à jour : 13 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - refactoring du code en PHP 7                                                                                        
    - fonctionnement du code vérifié                                                                                    
    - correction du code                                                                                                  
    - amélioration du code                                                                                               
    - modification de la description                                                                                      
*/
/*---------------------------------------------------------------?>
     <form name="contact_form" method="post" action="">
    <table width="500">
    <tr>
     <td valign="top">
      <label for="nom">Nom *</label>
     </td>
     <td valign="top">
      <input  type="text" name="nom" maxlength="50" size="30" value="<?php if (
isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']);?>">
     </td>
    </tr>
    <tr>
     <td valign="top"">
      <label for="prenom">Prénom *</label>
     </td>
     <td valign="top">
      <input  type="text" name="prenom" maxlength="50" size="30" value="<?php if
 (isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']);?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="email">Email Addresse *</label>
     </td>
     <td valign="top">
      <input  type="text" name="email" maxlength="80" size="30" value="<?php if 
(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="telephone">Téléphone</label>
     </td>
     <td valign="top">
      <input  type="text" name="telephone" maxlength="30" size="30" value="
<?php if (isset($_POST['telephone'])) echo htmlspecialchars($_POST['telephone'])
;?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="commentaire">Commentaire *</label>
     </td>
     <td valign="top">
      <textarea  name="commentaire" cols="28" rows="10"><?php if (isset($_POST[
'commentaire'])) echo htmlspecialchars($_POST['commentaire']);?></textarea>
     </td>
    </tr>
    <tr>
     <td colspan="2" style="text-align:center">
      <input type="submit" value=" Envoyer ">
     </td>
    </tr>
    </table>
    </form>

<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "zambleangevalere@gmail.com";
    $email_subject = "Pour un test";
 
    function died($error) {
        // your error code can go here
        echo 
"Nous sommes désolés, mais des erreurs ont été détectées dans le" .
" formulaire que vous avez envoyé. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Merci de corriger ces erreurs.<br /><br />";
        die();
    }
 
 
    // si la validation des données attendues existe
     if(!isset($_POST['nom']) ||
        !isset($_POST['prenom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['commentaire'])) {
        died(
'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
' problème.');
    }
 
     
 
    $nom = $_POST['nom']; // required
    $prenom = $_POST['prenom']; // required
    $email = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $commentaire = $_POST['commentaire']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email)) {
      $error_message .= 
'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
    }
   
      // Prend les caractères alphanumériques + le point et le tiret 6
      $string_exp = "/^[A-Za-z0-9 .'-]+$/";
   
    if(!preg_match($string_exp,$nom)) {
      $error_message .= 
'Le nom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(!preg_match($string_exp,$prenom)) {
      $error_message .= 
'Le prénom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($commentaire) < 2) {
      $error_message .= 
'Le commentaire que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($error_message) > 0) {
      died($error_message);
    }
 
    $email_message = "Détail.\n\n";
    $email_message .= "Nom: ".$nom."\n";
    $email_message .= "Prenom: ".$prenom."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "Telephone: ".$telephone."\n";
    $email_message .= "Commentaire: ".$commentaire."\n";
 
    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    ini_set('SMTP', "smtp.gmail.com");
    ini_set('smtp_port', "25");
    ini_set('sendmail_from', "zambleangevalere@gmail.com");
    ?>
     
    <!-- mettez ici votre propre message de succès en html -->
     
    Merci de nous avoir contacter. Nous vous contacterons très bientôt.
     
    <?php

    }


$email = "zambleangevalere@gmail.com"; // required
$name = "Valdodo Z."; // required
$body = "Hello, bosoir madame comment vas-tu? je t'ai envoyé une commande sur votre site <br/><a href='http://localhost:8090/Resto-Africain/profile.php#themenu'>restaurant mere anto</a>"; // required
$subject = "Je vous contacte pour ma commande";

$headers = array(
  'Authorization: Bearer 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',
  'Content-Type: application/json'
);

$data = array(
  "personalizations" => array(
      array(
          "to" => array(
              array(
                  "email" => $email,
                  "name" => $name
              )
          )
      )
  ),
  "from" => array(
      "email" => "zamblebizambleangevalere@yahoo.fr"
  ),
  "subject" => $subject,
  "content" => array(
      array(
          "type" => "text/html",
          "value" => $body
      )
  )
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
*/

require 'vendor/autoload.php'; // If you're using Composer (recommended)

// Comment out the above line if not using Composer

// require("/sendgrid-php.php");

// If not using Composer, uncomment the above line and

// download sendgrid-php.zip from the latest release here,

// replacing  with the path to the sendgrid-php.php file,

// which is included in the download:

// https://github.com/sendgrid/sendgrid-php/releases



$email = new \SendGrid\Mail\Mail(); 

$email->setFrom("test@example.com", "Example User");

$email->setSubject("Sending with SendGrid is Fun");

$email->addTo("test@example.com", "Example User");

$email->addContent("text/plain", "and easy to do anywhere, even with PHP");

$email->addContent(

    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"

);

$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

try {

    $response = $sendgrid->send($email);

    print $response->statusCode() . "\n";

    print_r($response->headers());

    print $response->body() . "\n";

} catch (Exception $e) {

    echo 'Caught exception: '. $e->getMessage() ."\n";

}
?>