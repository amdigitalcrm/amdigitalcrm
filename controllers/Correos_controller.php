<?php
      require URLFW . 'phpmailer/PHPMailerAutoload.php';

class Correos_controller extends Controller {
    public function __construct() {
        parent::__construct();
    }
function enviarcorreo($correo,$nombre,$asunto,$cuerpo) {
        
        
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'mail.hardmachineaqp.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'crm@hardmachineaqp.com'; // SMTP username
        $mail->Password   = 'kassandra@2015'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465; // TCP port to connect to
        $mail->setFrom('crm@hardmachineaqp.com', 'CRM HARDMACHINE');
        $mail->addAddress($correo,$nombre); // Add a recipient
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->MsgHTML($cuerpo);
        $mail->CharSet = 'UTF-8';
        if (!$mail->send()) {
           echo 'No se pudo enviar el mensaje.<br>';
           echo 'Mailer Error: ' . $mail->ErrorInfo.'<br>';
           
        } else {
          echo 'El mensaje ha sido enviado<br>';
        }
    }
    function EmailBienvenida($correo,$empresa){
        
         $nombre=$empresa;
        $asunto="Bienvenid@ a CRM AMDDIGITAL";
        $cuerpo="Le damos la bienvenid@  a CRM AMDDIGITAL";
        Correos_controller::enviarcorreo($correo, $nombre, $asunto, $cuerpo);
        
    }
     function mensaje2(){
       $correo="marcorodriguez2013@outlook.com";
        $nombre="Marco Antonio Rodriguez Salinas";
        $asunto="bienvenidos a bussinex";
        $cuerpo="
Ha solicitado unirse a nuestro equipo de trabajo Bussinex, confirme su registro en el siguiente link:
https://bussinex.com/activationaccount
";
        $this->enviarcorreo($correo, $nombre, $asunto, $cuerpo);        
    }
     function mensaje3($id){
       
         $usuario= Usuario::getById($id);
       $usuario->getUser_usuario();
      
       $correo="alejandrakassandra@gmail.com";
        $nombre="Marco Antonio Rodriguez Salinas";
        $asunto="compra plan de inversion";
        $cuerpo='<div style="
background: url(http://moneyites.com/wp-content/uploads/layerslider/Homepage-Slider/broker_slide_man_a.jpg);width: 60%; margin: auto;
background-position: 300px;

">
    <div class="header_bussi" style="background-color:rgba(26,156,220,0.8);
	color:#fff;
	text-align: center;
	padding: 20px 0;">
        <img alt="" src="http://www.bussinex.com/public/img/logo.png" style="height: 65px;">
            <br>
                Una forma diferente de hacer negocios
            </br>
        </img>
    </div>
    <div class="body_bussi" style="color:#fff; width: 90%; margin: auto;">
        <h2 style="text-align: center;">
            Compra de Plan de Inversión
        </h2>
        <p>
            Estimado Socio, ha solicitado invertir en el PLAN DE INVERSIÓN DE US$ 5,000, se confirmará su transacción en las siguientes horas y le enviaremos un correo de confirmación.
        </p>
        <p>
            Gracias por confiar en nosotros.
        </p>
        <p>
            Saludos,
            <br>
                Bussinex
            </br>
        </p>
    </div>
    <div class="footer_bussi" style="background-color:rgba(26,156,220,0.8);
	color:#fff;
	text-align: center;
	padding: 20px 0;
	height: 80px;">
        <a href="https://www.bussinex.com" style="color: #fff;">
            https://www.bussinex.com
        </a>
    </div>
</div>
';
        $this->enviarcorreo($correo, $nombre, $asunto, $cuerpo);
    }
    function mensaje_diasavencer($data){
       $correo="marcorodriguez2013@outlook.com";
        $nombre="Marco Antonio Rodriguez Salinas";
        $asunto="dias faltantes";
        $cuerpo=' '.$data;
       
        Correos_controller::enviarcorreo($correo, $nombre, $asunto, $cuerpo);        
    }
    function ejemplo(){
       $correo = new mail_reader("{mail.hardmachineaqp.com:993/imap/ssl}INBOX", "mrodriguez@hardmachineaqp.com", "kassandra@2015");
       
        for ($i = 18; $i <= 21; $i++) {
         $correo->email($i);
        echo $correo->message($i);
        echo '<hr>';
}
    }
    
}