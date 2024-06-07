<?php
    session_start();
    include_once "config.php";
 
    // Adăugat: Verifică dacă utilizatorul este conectat
    if (!isset($_SESSION['unique_id'])) {
        echo "Studentii nu au acces la aceasta pagina";
        exit();
    }

    // Adăugat: Verifică dacă utilizatorul are permisiuni de administrator
    $unique_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT admin FROM users WHERE unique_id = '{$unique_id}'");
    $result = mysqli_fetch_assoc($sql);

    if ($result['admin'] != 1) {
        echo "Studentii nu au acces la aceasta pagina";
        exit();
    }

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //verifica daca mailul este valid
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //verifica daca mailul este in baza de date
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){ // daca mailul deja exista
                echo "$email - Mailul este deja existent!";
            }else{
                //verificam daca userul a pus vreun fisier sau nu
                if(isset($_FILES['image'])){ // daca fisierul este uploadat
                    $img_name = $_FILES['image']['name']; // luam numele imagini uploadate de user
                    $img_type = $_FILES['image']['type']; // luam tipul imaginii
                    $tmp_name = $_FILES['image']['tmp_name']; //asta e un nume temporar care este folosit sa salvam sau sa mutam fisierul in folder                    
                    // explodam imaginea si luam ultima extensie precum jpg png
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode); // aici luam extensiile unui img file uploadat de user
    
                    $extensions = ["jpeg", "png", "jpg"]; // astea sunt img ext valide si le stocam in array
                    if(in_array($img_ext, $extensions) === true){ //daca userul uploadeaza o img ext care este la fel cu o extensie din array
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();//ne va da timpul curent
                                            // avem nevoie de timp pentru ca atunci cand uplodam imaginea in folder o redenumim in timpul curent
                                            //asa toate imaginile vor avea un nume unic
                            //mutam imaginea uploadata in folderul nostru curent , nu se salveaza in baza de date
                             $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){ //daca userul uploadeaza cu succes imaginea
                                $ran_id = rand(time(), 100000000); //creeaza random id for user
                                $status = "Offline now"; // odata ce userul s-a conectat statusul sau va fi activ
                                $encrypt_pass = md5($password);
                                // inseram in baza de date toate datele userului
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status, admin)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', 0)");
                                if($insert_query){ //daca datele au fost inserate
                                    echo "success";
                    
                                }else{
                                    echo "Ceva nu a mers bine. Incearca din nou!";
                                }
                            }
                        }else{
                            echo "Te rog uploadeaza o imagine - jpeg, png, jpg";
                        }
                    }else{
                        echo "Te rog uploadeaza o imagine - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email nu este un mail valid!";
        }
    }else{
        echo "Toate campurile sunt obligatorii";
    }
?>