<!-- Display the success message here if available -->
<?php if(isset($_SESSION['success'])) : ?>
    <div class="alert alert-success" role="alert">
    <?= $_SESSION['success']; ?>
    <?php
        unset($_SESSION['success']);
    ?>
    </div>
<?php endif; ?>