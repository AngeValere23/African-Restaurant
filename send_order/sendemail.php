<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
require 'checkout.php';

$mail = new PHPMailer(true);

$alert = '';
$db = Database::connect(); 

if(isset($_POST['submit'])){
  $f_name = $_POST['firstname'];
  $l_name = $_POST['lastname'];
  $email = $_POST['email'];
  $mobile = $_POST['phone'];
  $address = $_POST['address'];
  $postalCode = $_POST['zipcode'];

  $ids = array_keys($_SESSION['panier']);
  $n=0;
  //unset($_SESSION['panier'][1]);
  if(empty($ids)){
    $products = array();
  }else{
    $products = $db->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
  }
  foreach($products as $product){
    $n++;
    $product_id = $product['id'];
    $product_name = $product['product_name'];
    $product_price =  $product['product_price'];
    $product_image = $product['product_image'];
    $total = number_format($panier->total(),2,',',' ');
    $qty = $_SESSION['panier'][$product['id']] ;
    $grand_total = number_format($panier->total() + 6.99 ,2,',',' ');

    try{
      $mail->isSMTP();
      $mail->Host = 'yoursmtp.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'youremail@example.com'; // Gmail address which you want to use as SMTP server
      $mail->Password = 'yourpasword'; // Gmail address Password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = '587';

      $mail->setFrom($email); // Gmail address which you used as SMTP server
      $mail->addAddress('the receive email'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    

      $mail->isHTML(true);
      $mail->Subject = 'your subject';
      $mail->Body = "
                  
                  
                  <tbody><tr>
                    <td valign='top' align='center'>                                    
                      <table id='m_259028632511559700template_header' style='background-color:#557da1;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif' width='600' cellspacing='0' cellpadding='0' border='0'><tbody><tr>
                        <td id='m_259028632511559700header_wrapper' style='padding:36px 48px;display:block'>
                            <h1 style='color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left'>Nouvelle commande de $f_name  $l_name </h1>
                              </td>
                                </tr></tbody></table>
                                </td>
                            </tr>
      <tr>
      <td valign='top' align='center'>
                                          
                                        <font color='#888888'>
                                              </font><table id='m_259028632511559700template_body' width='600' cellspacing='0' cellpadding='0' border='0'><tbody><tr>
      <td id='m_259028632511559700body_content' style='background-color:#fdfdfd' valign='top'>
                                                      
                                                      <font color='#888888'>
                                                          </font><table width='100%' cellspacing='0' cellpadding='20' border='0'><tbody><tr>
      <td style='padding:48px' valign='top'>
                                                                  <div id='m_259028632511559700body_content_inner' style='color:#737373;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left'>

      <p style='margin:0 0 16px'>Les détails de la commande sont affichés ci-dessous&nbsp;: </p>


      <table style='width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;border:1px solid #e4e4e4' cellspacing='0' cellpadding='6' border='1'>
      <thead><tr>
      <th scope='col' style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>No</th>
      <th scope='col' style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>Nom du plat</th>
      <th scope='col' style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>Prix</th>
            <th scope='col' style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>Quantité</th>            
          </tr></thead>
      <tbody><tr>
      <td style='text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word;color:#737373;padding:12px'>$n<br><small></small>
      </td>
      <td style='text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word;color:#737373;padding:12px'>$product_name<br><small></small>
      </td>
            <td style='text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px'>$product_price$</td>
            <td style='text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px'><span>$qty </span></td>
          </tr></tbody>
      <tfoot>
      <tr>
      <th scope='row' colspan='2' style='text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px'>Sous-total&nbsp;:</th>
                  <td style='text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px'><span>$total$</span></td>
                </tr>
      <tr>
      <th scope='row' colspan='2' style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>Livraison&nbsp;:</th>
                  <td style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>À confirmer</td>
                </tr>
      <tr>
      <th scope='row' colspan='2' style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>Frais de livraison:</th>
                  <td style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'><span>6.99$</span></td>
                </tr>
      <tr>
      <th scope='row' colspan='2' style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>Mode de paiement&nbsp;:</th>
                  <td style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>Argent comptant</td>
                </tr>
      <tr>
      <th scope='row' colspan='2' style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'>Total&nbsp;:</th>
                  <td style='text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px'><span>$grand_total$</span></td>
                </tr>
      </tfoot>
      </table>
      <h2 style='color:#557da1;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left'>Détails du client</h2>
      <ul>
      <li>
      <strong>Nom:</strong> <span style='color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif'>$l_name</span>
      </li>
      <li>
      <strong>Prenom:</strong> <span style='color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif'>$f_name</span>
      </li>
      <li>
      <strong>E-mail&nbsp;:</strong> <span style='color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif'><a href='mailto:$email' target='_blank'>$email</a></span>
      </li>
                  <li>
      <strong>Tél.:</strong> <span style='color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif'>$mobile</span>
      </li>
          </ul>
      <font color='#888888'>
            </font><table id='m_259028632511559700addresses' style='width:100%;vertical-align:top' cellspacing='0' cellpadding='0' border='0'><tbody><tr>
      <td width='50%' valign='top'>
            <h3 style='color:#557da1;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left'>Adresse de facturation</h3>

            <p style='color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;margin:0 0 16px'>$f_name  $l_name<br>$address
      <br>$postalCode</p>
          </td>
                <td width='50%' valign='top'>
              <h3 style='color:#557da1;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left'>Adresse de livraison</h3>

              <p style='color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;margin:0 0 16px'>$f_name  $l_name<br>$address
      <br>$postalCode</p><font color='#888888'>
            </font></td></tr></tbody></table><font color='#888888'>
      </font></div><font color='#888888'>
                                  </font></td></tr></tbody></table><font color='#888888'>

      </font></td></tr></tbody></table><font color='#888888'>

      </font></td></tr>
      <tr>
      <td valign='top' align='center'>
                                          
                                        <table id='m_259028632511559700template_footer' width='600' cellspacing='0' cellpadding='10' border='0'><tbody><tr>
      <td style='padding:0' valign='top'>
                                                      <table width='100%' cellspacing='0' cellpadding='10' border='0'><tbody><tr>
      <td colspan='2' id='m_259028632511559700credit' style='padding:0 48px 48px 48px;border:0;color:#99b1c7;font-family:Arial;font-size:12px;line-height:125%;text-align:center' valign='middle'>
                                                            
        <p>Alxmicperformance inc</p>
                                                              </td>
                                                          </tr></tbody></table>
      </td>
                                              </tr></tbody></table>

      </td>
                                  </tr>
      </tbody> ";      
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
      $mail->send();
      $alert = '<div class="alert-success">
                  <span>Message Sent! Thank you for contacting us.</span>
                  </div>';
    } catch (Exception $e){
      $alert = '<div class="alert-error">
                  <span>'.$e->getMessage().'</span>
                </div>';
    }
  }
}
?>
