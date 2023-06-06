<?php
    $database = connectToDB();

    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($email) || empty($password)){
        $error = "Enter your info";
    } 

    if(isset ($error)){
        $_SESSION['error'] = $error;
        header("Location: /login");
        exit;
    }

    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $database->prepare($sql);
    $query->execute([
        'email' => $email
    ]);
    $user = $query->fetch();
    if(empty($user)){
        $error = "This user doesnt exist";
    } else {
        if (password_verify($password, $user["password"])){
            $_SESSION["user"] = $user;

            header("Location: /");
            exit;
        }else{
            $error = "Incorrect password or email";
        }
    }