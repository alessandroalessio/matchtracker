<?php
require 'bootstrap.php';
switch ($_POST['model']):
    case 'match':

        switch ($_POST['action']):
            case 'add':
                $result = $Match->add();
                if ( $result ) header('location: /');
            break;
        endswitch;

    break;
    case 'player':
        
        switch ($_POST['action']):
            case 'add':
                $result = $Player->add();
                if ( $result ) header('location: /');
            break;
        endswitch;
        
    break;
endswitch;
?>