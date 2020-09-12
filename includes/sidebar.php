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

    <div class="media-body pb-2 d-flex flex-column justify-content-between">
        <div class="chat-holder d-flex flex-column">

           <?php 
                $id  = '';
                if (isset($_GET['id'])) {
                    if (!empty(getUserById($_GET['id']))) {
                        $id = $_GET['id'];
                    }
                }
                searchChat($id); 
           ?>
            <!-- <div class="d-flex align-items-center btn btn-info rounded p-1 mt-2 ml-4">
                <div class="chat-img-overlay mr-2"><img class="search-img" src="asset/img/IMG_0759.JPG" alt="Asif"></div>
                <span class="search-name">Asif Mahmud</span>
                <span class="badge badge-danger ml-auto">1</span>
            </div>
            <div class="d-flex align-items-center btn btn-info rounded p-1 mt-2 ml-4">
                <div class="chat-img-overlay mr-2"><img class="search-img" src="asset/img/IMG_0759.JPG" alt="Asif"></div>
                <span class="search-name">Asif Mahmud</span>
                <span class="badge badge-danger ml-auto">5</span>
            </div>
            <div class="d-flex align-items-center btn btn-info rounded p-1 mt-2 ml-4">
                <div class="chat-img-overlay mr-2"><img class="search-img" src="asset/img/IMG_0759.JPG" alt="Asif"></div>
                <span class="search-name">Asif Mahmud</span>
                <span class="badge badge-danger ml-auto">3</span>
            </div> -->
        </div>
        <a class="btn btn-sm btn-secondary d-block ml-4 mb-4 mt-3" href="logout.php">Logout</a>
    </div>
</div>