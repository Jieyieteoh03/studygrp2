<!-- if error found, display the error message here -->
<?php if(isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger" role="alert">
    <?= $_SESSION['error']; ?>
    <?php
        unset($_SESSION['error']);
    ?>
    </div>
<?php endif; ?>