<?php require_once 'includes/header.php'; ?>

<div class="profile-wrapper">

    <?php require_once 'includes/navbar.php'; ?>

    <div class="row media-body">

        <?php require_once 'includes/sidebar.php'; ?>

        <div class="col h-100" id="body">
            <?php
                if (isset($_GET['id'])) {
                    require_once 'includes/messages.php';
                } else {
                    require_once 'includes/about.php';
                }
            ?>
        </div> 

    </div>
</div>
<?php require_once 'includes/footer.php'; ?>