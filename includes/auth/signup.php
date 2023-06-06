<?php
    $database=connectToDB();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // make sure when the user sign up, they are not using the same email that already exist in the database
    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $database->prepare($sql);
    $query->execute([
        'email' => $email
    ]);
    $user = $query->fetch();

    if(empty($name) || empty($email) || empty($password) || empty($confirm_password)){
        $error = "Please enter your info";
    } else if ($password !== $confirm_password) {
        $error = "Incorrect password";
    } else if (strlen($password) < 8 ) {
        $error = "Must be 8 characters";
    } else if ($user) {
        $error = "The email provided is already exist.";
    }

    if(isset($error)){
        $_SESSION["error"]=$error;
        header("Location: /signup");
        exit;
    }

    // create the account
    $sql = "INSERT INTO users (`name`,`email`,`password`) VALUES (:name, :email, :password)";
    $query = $database->prepare($sql);
    $query->execute([
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    // retrieve the user that is just created
    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $database->prepare($sql);
    $query->execute([
        'email' => $email
    ]);
    $user = $query->fetch();

    // to login the user
    $_SESSION["user"] = $user;

    header("Location: /");
    exit;