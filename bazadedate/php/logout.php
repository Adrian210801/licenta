<?php
    session_start();
    if(isset($_SESSION['unique_id'])){ //daca userul este logat atunci are voie pe pagina asta daca nu atunci la login
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){ // daca id-ul de logout este setat
            $status = "Offline now";
            //odata ce userul s-a delogat ii modificam statusul in offline si in form de login
            //ii updatam statusul la activ daca userul s-a logat cu succes
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>