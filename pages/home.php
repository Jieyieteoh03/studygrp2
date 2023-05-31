<?php
    if(isUserLoggedIn()){
        header("Location: /");
        exit;
    } 
    
    $database = connectToDB();
    $sql = "SELECT * FROM users";
    $query = $database->prepare($sql);
    $query->execute();
    $users = $query->fetchAll();

    require 'parts/header.php';

?>
<div class="container my-5 mx-auto" style="max-width: 700px;">
    <h1 class="h1 mb-4 text-center">Customer Service Feedback Form</h1>

    <div class="card p-4">
        <p class="text-center fs-4">Please login with your existing account or signup a new account to continue</p>
        <div class="d-flex justify-content-center gap-3"> 
            <a href="/login" class="btn btn-primary px-5">Login</a>
            <a href="/signup" class="btn btn-primary px-5">Signup</a>
        </div>
    </div>
        
</div>
<?php

    require 'parts/footer.php';