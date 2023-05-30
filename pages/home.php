<?php

    require 'parts/header.php';

?>
<div class="container my-5 mx-auto" style="max-width: 700px;">
    <h1 class="h1 mb-4 text-center">Customer Service Feedback Form</h1>

    <div class="card p-4">
        <?php require dirname(__DIR__) .  '/parts/message_error.php'; ?>
        <?php require dirname(__DIR__) .  '/parts/message_success.php'; ?>
        <?php require dirname(__DIR__) .  '/parts/questions.php'; ?>
    </div>

    <div class="text-center mt-4">
        <a href="/results" class="btn btn-inverse">View Results</a>    

</div>
<?php

    require 'parts/footer.php';