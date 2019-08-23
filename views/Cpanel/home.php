<?php 
require URLINC.'nav_dash.php';
require URLINC.'check_session.php';
?>

<h1 class="titulo"> Webmail BETA </h1>
 
<?php
$imap = imap_open ("{mail.hardmachineaqp.com:993/imap/ssl}INBOX", "mrodriguez@hardmachineaqp.com", "kassandra@2015") or die("No Se Pudo Conectar Al Servidor:" . imap_last_error());
$checar = imap_check($imap);
 
// Detalles generales de todos los mensajes del usuario.
$resultados = imap_fetch_overview($imap,"1:{$checar->Nmsgs}",0);
// Ordenamos los mensajes arriba los más nuevos y abajo los más antiguos
krsort($resultados);
$cont = 0;
 
// Informacion del mailbox
$check = imap_mailboxmsginfo($imap);
 
echo "<div class='estadisticas'>";
if ($check) {
    echo "Fecha: "     . $check->Date    . "<br/>" ;
    //echo "Driver: "   . $check->Driver  . "<br />\n" ;
    //echo "Mailbox: "  . $check->Mailbox . "<br />\n" ;
    echo "Total Mensajes: $check->Nmsgs | Sin Leer: $check->Unread | Recientes: $check->Recent | Eliminados: $check->Deleted <br/>";
    echo "Tamaño buzón: " . $check->Size . "<br/><br/>" ;
} else {
    echo "imap_check() failed: " . imap_last_error() . "<br />\n";
}
echo "</div>";
 
// MOSTRAMOS EL MENSAJE
echo "-------------------------------------------------------<br />";
if (isset($_GET['num'])){
    $num_mensaje=$_GET['num'];
    echo "Mostrando cuerpo del mensaje #$num_mensaje<br/>";
    $cont=0;
    foreach ($resultados as $detalles) {
        $cont = $cont + 1;
        if ($cont == $num_mensaje){
            $asunto=$detalles->subject;
            echo "<p class='asunto'>$asunto</p>";}
    }
 
    $section = 1;
    $mensaje = imap_fetchbody($imap, $num_mensaje, $section);
    echo nl2br(strip_tags($mensaje,'<p>')); // Util para los mensajes HTML, los transforma en texto plano
    
}else{
    echo "Mensaje no encontrado<br/>";
}
echo "<br />-------------------------------------------------------<br />";
 
?>
<table class='tabla1'>
<thead>
    <tr>
        <th scope="col" title="Mensaje">Msj</th>
        <th scope="col" title="Remitente">Remitente</th>
        <th scope="col" title="Asunto">Asunto</th>
        <th scope="col" title="Tamaño">Tamaño</th>
        <th scope="col" title="Fecha">Fecha</th>
        <th scope="col" title="Leido">Leido</th>
    </tr>
</thead>    
<?php
//$i=0;
foreach ($resultados as $detalles) {
    echo "<tr>";
        //echo "Para: $detalles->to <br>";
        
        // Ponemos 'Sin asunto' en caso que no tenga.
        if ($detalles->subject == ''){$subject='Sin asunto';}
        else{
            //Evita asuntos tipo =?ISO-8859-1?Q?B=F8lla?=
            $subject = utf8_decode(imap_utf8($detalles->subject));
        }
        $from = utf8_decode(imap_utf8($detalles->from));
        
        echo "<td><b>#$detalles->msgno</b></td>";
        echo "<td><b>$from</b></td>";
        echo "<td><a href='correo_imap.php?num=$detalles->msgno'><b>$subject</b></a></td>";
        echo "<td><b>$detalles->size bytes</b></td>";
        echo "<td><b>$detalles->date</b></td>";
    if($detalles->seen == "0") {
        echo "<td><b>Sin leer</b></td>";
        $cont = $cont + 1;
    } else {
        echo "<td>Leido</td>";
    }
    
        
    //$servidorenvia = strstr($detalles->message_id, '@');
    //echo "Dominio Que Envia: $servidorenvia<br><hr>";
    echo "</tr>";
    
//  $i=$i+1;
//  $mi_array=array($i=>$detalles->msgno,$from,$subject,$detalles->size,$detalles->date);
}
echo "</table>";
 
//foreach ($mi_array as $indice=>$actual)
//    echo $actual . "<br>"; 
    
 
imap_close($imap);
?>
<div id="footer"> <p>Tratamiento de correo via IMAP - BETA 1.0</p></div>