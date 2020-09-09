<div class="col-sm-5 col-md-4 col-lg-3 bg-dark text-white h-100 d-flex flex-column" id="sidebar">
    <div class="d-sm-none close-div"> <button type="button" class="close text-white" data-dismiss="alert"><span>&times;</span></button></div>
    <a href="profile" class="user btn btn-dark d-flex mt-3 ml-3 align-items-center justify-content-center">
        <div class="user-img position-relative">
            <div class="d-flex justify-content-center">
                <div class="img-overlay"> <img src="asset/img/<?php echo $_SESSION['image'] ?  $_SESSION['image'] : 'user.png'; ?>" class="user-image" alt="<?php echo $_SESSION['name']; ?>"></div>
            </div>
        </div>
        <div class="user-about pl-3">
            <span class="d-block text-white user-name"><?php echo $_SESSION['name']; ?></span>
        </div>
    </a>
    <div class="ml-3 mt-3 border-bottom"></div>

    <div class="media-body d-flex flex-column justify-content-between">
        <div class="chat-holder">
        </div>
        <a class="btn btn-sm btn-secondary d-block ml-4 mt-3 mb-2" href="logout.php">Logout</a>
    </div>
</div>