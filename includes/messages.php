<div class="p-4 h-100">

        <div class="h-100 d-flex flex-column justify-content-between">
                <?php 
                        if (empty(getUserById($_GET['id']))) {
                                echo '<div class="d-flex justify-content-center"><span class="lead">User Unavailable </span></div>';
                        } else {
                ?>

                <div class="mr-2" id="msg-body">
                        <div id="msg-msg"></div>

                        <?php echo fetchMessages($_GET['id']); ?>
                        <!-- <span class="lead">Start conversation </span> -->

                        <!-- <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2">
                                        <img class="search-img" src="asset/img/mypic2.PNG" alt="Ashik">
                                </div>
                               <div class="d-flex flex-column col-lg-8">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>Asif mahmud</small> <small>1 day ago</small>
                                        </div>
                                        <div class="bg-info text-white rounded p-2">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea labore in, odit qui doloribus quasi dolore eaque animi enim at et error iste, nostrum placeat, eos voluptas consequatur commodi eius.
                                        </div>
                               </div>
                        </div>

                        <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2">
                                        <img class="search-img" src="asset/img/mypic2.PNG" alt="Ashik">
                                </div>
                               <div class="d-flex flex-column col-lg-8">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>Asif mahmud</small> <small>1 day ago</small>
                                        </div>
                                        <div class="bg-info text-white rounded p-2">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea labore in, odit qui doloribus quasi dolore eaque animi enim at et error iste, nostrum placeat, eos voluptas consequatur commodi eius.
                                        </div>
                               </div>
                        </div>

                        <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2">
                                        <img class="search-img" src="asset/img/mypic2.PNG" alt="Ashik">
                                </div>
                               <div class="d-flex flex-column col-lg-8">
                                        <div class="d-flex justify-content-between col-lg-6 text-muted">
                                                <small>Asif mahmud</small> <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2">
                                        <img src="asset/img/IMG_0436.JPG" class="msg-image" alt="">
                                        </div>
                               </div>
                        </div>
                
                        <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2">
                                        <img class="search-img" src="asset/img/mypic2.PNG" alt="Ashik">
                                </div>
                        <div class="d-flex flex-column col-lg-6">
                                <div class="d-flex justify-content-between text-muted">
                                        <small>Asif mahmud</small> <small>1 day ago</small>
                                </div>
                                        <div class="rounded p-2 bg-light">
                                        <a href="asset/pdf/Belal sir's assignment group.pdf">Belal sir's assignment group.pdf</a> <i class="far fa-file-pdf customlabel ml-2 text-warning"></i>
                                        </div>
                                </div>
                        </div>

                        <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2">
                                        <img class="search-img" src="asset/img/mypic2.PNG" alt="Ashik">
                                </div>
                                <div class="d-flex flex-column col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>Asif mahmud</small> <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2 bg-light">
                                        <a href="asset\doc\CSTE_12 batch.docx">CSTE_12 batch.docx</a> <i class="far fa-file-word customlabel ml-2 text-primary"></i>
                                        </div>
                                </div>
                        </div>

                        <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2">
                                        <img class="search-img" src="asset/img/mypic2.PNG" alt="Ashik">
                                </div>
                                <div class="d-flex flex-column col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                        <small>Asif mahmud</small> <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2 bg-light">
                                                <a href="asset\excel\September Mess Meal.xlsx">September Mess Meal.xlsx</a> <i class="far fa-file-excel customlabel ml-2 text-success"></i>
                                        </div>
                                </div>
                        </div>

                        <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2">
                                        <img class="search-img" src="asset/img/mypic2.PNG" alt="Ashik">
                                </div>
                                <div class="d-flex flex-column col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>Asif mahmud</small> <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2 bg-light">
                                        <a href="asset\ppt\Group-1 (Ashik,Tuhin,Towhid).pptx">Group-1 (Ashik,Tuhin,Towhid).pptx</a> <i class="far fa-file-powerpoint customlabel ml-2 text-danger"></i>
                                        </div>
                                </div>
                       </div>

                        <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2">
                                        <img class="search-img" src="asset/img/mypic2.PNG" alt="Ashik">
                                </div>
                               <div class="d-flex flex-column col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>Asif mahmud</small> <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2 bg-dark">
                                                <audio class="w-100" controls>
                                                        <source src="asset/audio/Every Night In My Dreams See You And Feel You.mp3" 
                                                        type="audio/mp3">
                                                </audio>
                                        </div>
                               </div>
                        </div>

                        <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2">
                                        <img class="search-img" src="asset/img/mypic2.PNG" alt="Ashik">
                                </div>
                               <div class="d-flex flex-column col-md-6 col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>Asif mahmud</small> <small>1 day ago</small>
                                        </div>
                                        <div class="rounded mt-2 bg-light">
                                                <video class="img-fluid" controls>
                                                        <source src="asset/video/Tahsan_Kona_Chhuye_Dile_Mon.mp4"
                                                                type="video/mp4">
                                                </video>
                                        </div>
                               </div>
                        </div>




                        

                        <div class="d-flex justify-content-end p-2">
                               <div class="d-flex flex-column col-lg-8">
                                        <small class="text-muted">1 day ago</small>
                                        <div class="bg-light rounded p-2">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea labore in, odit qui doloribus quasi dolore eaque animi enim at et error iste, nostrum placeat, eos voluptas consequatur commodi eius.
                                        </div>
                               </div>
                        </div>

                        <div class="d-flex justify-content-end p-2">
                               <div class="d-flex flex-column msg-image">
                                        <small class="text-muted">1 day ago</small>
                                        <div class="rounded p-2">
                                        <img src="asset/img/IMG_0436.JPG" class="msg-image" alt="">
                                        </div>
                               </div>
                        </div>

                        <div class="d-flex justify-content-end p-2">
                                <div class="d-flex flex-column col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2 bg-light">
                                        <a href="asset/pdf/Belal sir's assignment group.pdf">Belal sir's assignment group.pdf</a> <i class="far fa-file-pdf customlabel ml-2 text-warning"></i>
                                        </div>
                                </div>
                        </div>

                        <div class="d-flex justify-content-end p-2">
                                <div class="d-flex flex-column col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2 bg-light">
                                        <a href="asset\doc\CSTE_12 batch.docx">CSTE_12 batch.docx</a> <i class="far fa-file-word customlabel ml-2 text-primary"></i>
                                        </div>
                                </div>
                        </div>

                        <div class="d-flex justify-content-end p-2">
                                <div class="d-flex flex-column col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2 bg-light">
                                        <a href="asset\excel\September Mess Meal.xlsx">September Mess Meal.xlsx</a> <i class="far fa-file-excel customlabel ml-2 text-success"></i>
                                        </div>
                                </div>
                        </div>

                        <div class="d-flex justify-content-end p-2">
                                <div class="d-flex flex-column col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2 bg-light">
                                        <a href="asset\ppt\Group-1 (Ashik,Tuhin,Towhid).pptx">Group-1 (Ashik,Tuhin,Towhid).pptx</a> <i class="far fa-file-powerpoint customlabel ml-2 text-danger"></i>
                                        </div>
                                </div>
                        </div>

                        <div class="d-flex justify-content-end p-2">
                               <div class="d-flex flex-column col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>1 day ago</small>
                                        </div>
                                        <div class="rounded p-2 bg-dark">
                                                <audio class="w-100" controls>
                                                        <source src="asset/audio/Every Night In My Dreams See You And Feel You.mp3" 
                                                        type="audio/mp3">
                                                </audio>
                                        </div>
                               </div>
                        </div>

                        <div class="d-flex justify-content-end p-2">
                               <div class="d-flex flex-column col-md-6 col-lg-6">
                                        <div class="d-flex justify-content-between text-muted">
                                                <small>1 day ago</small>
                                        </div>
                                        <div class="rounded mt-2 bg-light">
                                                <video class="img-fluid" controls>
                                                        <source src="asset/video/Tahsan_Kona_Chhuye_Dile_Mon.mp4"
                                                                type="video/mp4">
                                                </video>
                                        </div>
                               </div>
                        </div> -->




                </div>

                <div class="message-sender border-top mb-3">
                        <div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                        <input type="text" class="form-control" id="text-msg">
                                        <form id="image-form">
                                                <label for="send-image" title="Add image" class="p-2 m-2 customlabel"><i class="far fa-image"></i></label>
                                                <input id="send-image" class="customFile" name="image" type="file">
                                                <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                                        </form>
                                        <form id="file-form">
                                                <label for="send-file" title="Atach file" class="p-2 m-2 customlabel"><i class="fas fa-link"></i></label>
                                                <input id="send-file" class="customFile" name="file" type="file">
                                                <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                                        </form>
                                </div>
                                <div class="emojis d-flex justify-content-between align-items-center pr-3 flex-wrap">
                                        <img src="asset/imoji/emoji-1.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-2.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-3.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-4.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-5.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-6.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-7.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-8.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-9.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-10.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-11.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-12.png" alt="imoji-1" class="emoji">
                                        <img src="asset/imoji/emoji-13.png" alt="imoji-1" class="emoji">
                                </div>
                        </div>
                </div>
        </div>

        <?php }?>
</div>