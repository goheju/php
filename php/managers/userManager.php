<?php
require('../services/secureAdmAccess.php');
require_once('../dao/common.php');

$op = $_REQUEST['op'];

switch ($op) {
    case 'new':
        $link = getLink();
        $user = $_POST['mail'];
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $query = "INSERT INTO users (user, pass, name, type) VALUES ('$user', '$pass', '$name', 'U')";
        try {
           mysqli_query($link, $query);
        } catch (Exception $e) {

        } finally {
            $numRows = mysqli_affected_rows($link);
            mysqli_close($link);
            $url = 'admin.php';
            $msg = ($numRows==1)? 'Usuario registrado correctamente':$e->getMessage();            
        }
        break;
        
        case 'del':
            $link = getLink();
            $user = $_REQUEST['id'];
            $query = "DELETE FROM users WHERE users.user='$user'";
            try {
               mysqli_query($link, $query);
            } catch (Exception $e) {
    
            } finally {
                $numRows = mysqli_affected_rows($link);
                mysqli_close($link);
                $url = 'admin.php';
                $msg = ($numRows==1)? 'Usuario borrado':$e->getMessage();            
            }
            break;

                    
        case 'edt':
            $link = getLink();
            $user = $_REQUEST['mail'];
            $newuser = $_REQUEST['newmail'];
            $name = $_REQUEST['name'];
            $query = "UPDATE users SET users.user = '$newuser', users.name = '$name' WHERE users.user='$user'";
            try {
               mysqli_query($link, $query);
            } catch (Exception $e) {
    
            } finally {
                $numRows = mysqli_affected_rows($link);
                mysqli_close($link);
                $url = 'admin.php';
                $msg = ($numRows==1)? 'Usuario editao':$e->getMessage();            
            }
            break;

            case 'cpre':
                $link = getLink();
                $user = $_REQUEST['mail'];
                $capital = $_REQUEST['capital'];
                $interes = $_REQUEST['interes'];
                $meses = $_REQUEST['meses'];
                $years=1;
                $query = "INSERT INTO loans (user, capital, interes, years, periodicity) VALUES ('$user', '$capital', '$interes', '$years','$meses')";
                try {
                   mysqli_query($link, $query);
                } catch (Exception $e) {
        
                } finally {
                    $numRows = mysqli_affected_rows($link);
                    mysqli_close($link);
                    $url = 'admin.php';
                    $msg = ($numRows==1)? 'Prestamo registrado correctamente':$e->getMessage();            
                }
                break;
                    
        case 'depre':
            $link = getLink();
            $user = $_REQUEST['id'];
            $query = "DELETE FROM loans WHERE loans.idloan='$user'";
            try {
               mysqli_query($link, $query);
            } catch (Exception $e) {
    
            } finally {
                $numRows = mysqli_affected_rows($link);
                mysqli_close($link);
                $url = 'admin.php';
                $msg = ($numRows==1)? 'Prestamo borrado':$e->getMessage();            
            }
            break;

            case 'epre':
                $link = getLink();
                $id = $_REQUEST['id'];
                $mail = $_REQUEST['mail'];
                $capital = $_REQUEST['capital'];
                $interes = $_REQUEST['interes'];
                $meses = $_REQUEST['meses'];
                $query = "UPDATE loans SET loans.user = '$mail', loans.capital = '$capital', loans.interes = '$interes', loans.periodicity = '$meses' WHERE loans.idloan='$id'";
                try {
                   mysqli_query($link, $query);
                } catch (Exception $e) {
        
                } finally {
                    $numRows = mysqli_affected_rows($link);
                    mysqli_close($link);
                    $url = 'admin.php';
                    $msg = ($numRows==1)? 'prestamo editao':$e->getMessage();            
                }
                break;

    default:
        sessionClose();
        $url = 'index.php';
        $msg = 'Sesión cerrada con éxito';
}
goToURL($url,$msg);

?>