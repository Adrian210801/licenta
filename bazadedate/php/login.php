<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        // sa verificam daca mailul si parola introuse sunt la fel ca cele din baza de date
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){ // daca ce a introdus userul este bun
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                //ii schimbam statusul in activ, pentru ca este stat pe offline
                $status = "Active now";
                // daca login este cu succes atunci ii schimbam statusul
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }else{
                    echo "Ceva a mers gresit. Incearca din nou!";
                }
            }else{
                echo "Email sau Parola incorecte!";
            }
        }else{
            echo "$email - Emailul nu exista!";
        }
    }else{
        echo "Completati toate caracterele!";
    }
?>