<div class="py-4 h-100">
       <div class="about">
              <div class="row px-4 mb-5">
              <div class="col-md-6 col-lg-4">
                     <img src="asset/img/<?php echo $_SESSION['image'] ?  $_SESSION['image'] : 'user.png'; ?>" class="img-fluid p-3 p-md-0 user-image" alt="<?php echo $_SESSION['name']; ?>">
                     <form id="user-image" class="mt-2">
                            <div class="input-group mb-3">
                                   <div class="custom-file">
                                   <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                                   <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                   <button class="btn btn-info" type="button" id="Upload">Upload</button>
                            </div>
                            </div>
                     </form>
              </div>
              <div class="col">
                     <div class="update-msg"></div>
                     <div class="row mt-3 pr-2">
                            <div class="col-4"><h6>Name</h6></div>
                            <div class="col-6 user-name"><?php echo $_SESSION['name']; ?></div>

                            <div class="col-2"><a title="Edit name" class="text-info pointer" data-toggle="collapse" data-target="#collapseName" role="button" aria-expanded="false" aria-controls="collapseName"><i class="far fa-edit"></i></a></div>

                           <div class="col-12">
                                   <div class="collapse p-2" id="collapseName">
                                          <div class="d-flex w-75"><input type="text" class="form-control form-control-sm mr-2" placeholder="Enter name" id="input-name"> <button class="btn btn-sm" id="edit-name">Edit</button></div>
                                          <small class="name-error text-danger"></small>                                 
                                   </div>
                           </div>

                            <div class="col-4"><h6>Email</h6></div>
                            <div class="col-6"><?php echo $_SESSION['email']; ?></div>
                     </div>
                     <button class="btn btn-info mt-2" id="edit-password" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="false" aria-controls="collapsePassword">Change password</button>

                    <div class="row">
                            <div class="col">
                                   <div class="collapse" id="collapsePassword">
                                          <div class="row mt-3">
                                                 <div class="col-sm-10 col-lg-8">
                                                        <div class="form-group">
                                                               <input type="password" class="form-control form-control-sm" name="password" placeholder="Current password" id="current-pass">
                                                               <small class="pass-error text-danger"></small>
                                                        </div>
                                                        <div class="form-group">
                                                               <input type="password" class="form-control form-control-sm mb-1" name="new_password" placeholder="New password" id="new-pass">
                                                               <small class="new-pass-error text-danger"></small>
                                                        </div>
                                                        <button class="btn btn-light btn-block" id="edit-pass">Submit</button>
                                                 </div>
                                          </div>                                
                                   </div>
                            </div>
                    </div>
              </div>
              </div>
       </div>
</div>