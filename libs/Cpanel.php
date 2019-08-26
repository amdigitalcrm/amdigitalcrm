<?php

require URLFW . 'xmlapi/xmlapi.php';

class Cpanel {

    public function Iniciar($email, $password ,$action = '') {
        $ip = '167.86.97.118';
        $account = "gingercat";
        $domain = "gingercat.ml";
        $account_pass = "ginger_2019";
        $xmlapi = new xmlapi($ip);
        $xmlapi->password_auth($account, $account_pass);
        $xmlapi->set_output('json');
        $xmlapi->set_port('2083');
        $xmlapi->set_debug(1);
        if ($action == '') {
            $results = json_decode($xmlapi->api2_query("serverusername", "Email", "addpop", array('domain' => $domain, 'email' => $email, 'password' => $password, 'quota' => 'Unlimited')), true);
        } else {
            $results = json_decode($xmlapi->api2_query("serverusername", "Email", "delpop", array('domain' => $domain, 'email' => $email, 'password' => $password, 'quota' => 'Unlimited')), true);
        }
       
        if ($results['cpanelresult']['data'][0]['result']) {
            echo 'Creado correctamente';
        } else {
            echo "Error creating email account:\n" . $results['cpanelresult']['data'][0]['reason'];
        }
    }

   

}
