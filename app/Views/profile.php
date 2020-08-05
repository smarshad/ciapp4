<?= $this->extend('template/base');?>
<?= $this->Section('title');?>
<?= $title;?>
<?= $this->endSection();?>
<?= $this->Section('content');?>

<div class="container emp-profile">
    <h3>User Profile</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="profile-img">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" class="img-fluid" />
                <div class="file btn btn-lg btn-primary">Change Photso
                    <input type="file" name="file" />
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <?php 
            // print_r($user);exit;

            if(session()->getFlashdata('message') != null):?>
                <p class="alert alert-success"><?= session()->getFlashdata('message');?></p>
            <?php endif;
            if(session()->getFlashdata('error') != null):?>
                <p class="alert alert-danger"><?= session()->getFlashdata('error');?></p>
            <?php endif;?>
            <div class="profile-head">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#changepassword" role="tab" aria-controls="profile" aria-selected="false">Change Password</a>
                    </li>
                </ul>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= $user['first_name'] ?? 'N/A' ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Last Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= $user['last_name'] ?? 'N/A' ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Username</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= session()->get('user')['username'] ?? 'N/A'?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= session()->get('user')['email'] ?? 'N/A'?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= $user['gender'] ?? 'N/A'?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= $user['address'] ?? 'N/A'?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Country</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= $user['country'] ?? 'N/A'?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>State</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= $user['state'] ?? 'N/A'?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>City</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= $user['city'] ?? 'N/A'?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Zipcode</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= $user['zipcode'] ?? 'N/A'?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(allowEdit(session()->get('user')['username'])):?>
                                    <?php 
                                        $errors = [];
                                        if(session()->getFlashData('errors') != null):
                                            $errors  = session()->getFlashData('errors');
                                        endif;
                                        
                                    ?>
                                    <form method="POST" action="<?= base_url();?>/user/<?= $user['id'];?>/profile">
                                        <?= csrf_field();?>
                                        <div class="form-group row">
                                            <label for="username" class="col-4 col-form-label">User Name</label>
                                            <div class="col-8">
                                                <input id="username" name="username" disabled class="form-control here" type="text" value="<?= session()->get('user')['username'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-4 col-form-label">First Name</label>
                                            <div class="col-8">
                                                <input id="first_name" name="first_name" placeholder="First Name" class="form-control here <?= isset($errors['first_name']) ? 'is-invalid' : '' ?>" type="text"  value="<?= $user['first_name'];?>">
                                                <?php if (isset($errors['first_name'])):?>
                                                    <p class="invalid-feedback">
                                                        <?= $errors['first_name'];?>
                                                    </p>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                            <div class="col-8">
                                                <input id="last_name" name="last_name" placeholder="Last Name" class="form-control here  <?= isset($errors['last_name']) ? 'is-invalid' : '' ?>" type="text" value="<?= $user['last_name'];?>">
                                                <?php if (isset($errors['last_name'])):?>
                                                    <p class="invalid-feedback">
                                                        <?= $errors['last_name'];?>
                                                    </p>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="gender" class="col-4 col-form-label">Gender</label>
                                            <div class="col-8">
                                                <select id="gender" name="gender" class="custom-select <?= isset($errors['gender']) ? 'is-invalid' : '' ?>">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male" <?php if($user['gender'] == 'Male'){?> selected <?php }?>>Male</option>
                                                    <option value="Female" <?php if($user['gender'] == 'Female'){?> selected <?php }?>>Female</option>
                                                </select>
                                                <?php if (isset($errors['gender'])):?>
                                                    <p class="invalid-feedback">
                                                        <?= $errors['gender'];?>
                                                    </p>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-4 col-form-label">Email*</label>
                                            <div class="col-8">
                                                <input id="email" name="email" placeholder="Email" class="form-control here" disabled type="text" value="<?= session()->get('user')['email']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="website" class="col-4 col-form-label">Country</label>
                                            <div class="col-8">
                                                <input id="country" name="country" placeholder="country" class="form-control here" type="text" value="<?= $user['country'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="website" class="col-4 col-form-label">State</label>
                                            <div class="col-8">
                                                <input id="state" name="state" placeholder="state" class="form-control here" type="text" value="<?= $user['state'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="website" class="col-4 col-form-label">City</label>
                                            <div class="col-8">
                                                <input id="city" name="city" placeholder="city" class="form-control here" type="text" value="<?= $user['city'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="website" class="col-4 col-form-label">Zipcode</label>
                                            <div class="col-8">
                                                <input id="zipcode" name="zipcode" placeholder="zipcode" class="form-control here" type="text" value="<?= $user['zipcode'];?>">                                              
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="publicinfo" class="col-4 col-form-label">Address</label>
                                            <div class="col-8">
                                                <textarea id="address" name="address" cols="40" rows="2" class="form-control"><?= $user['address'];?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="offset-3 col-6 text-center">
                                                <button name="submit" type="submit" class="btn btn-primary btn-sm">Update Profile</button>
                                                <button name="reset" type="reset" class="btn btn-danger btn-sm">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php else:?>
                                    <h2>Please Login To Edit</h2>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="changepassword" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(allowEdit(session()->get('user')['username'])):?>
                                <?php 
                                    $errors = [];
                                    if(session()->getFlashData('errors') != null):
                                        $errors  = session()->getFlashData('errors');
                                    endif;
                                ?>
                                    <form method="POST" action="<?= base_url();?>/user/password">
                                        <?= csrf_field();?>
                                        <div class="form-group row">
                                            <label for="oldpassword" class="col-4 col-form-label">Old Password</label>
                                            <div class="col-8">
                                                <input id="oldpassword" name="oldpassword" placeholder="New Password" class="form-control here <?= isset($errors['oldpassword']) ? 'is-invalid' : '' ?>" type="password">
                                                <?php if (isset($errors['oldpassword'])):?>
                                                    <p class="invalid-feedback">
                                                        <?= $errors['oldpassword'];?>
                                                    </p>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-4 col-form-label">New Password</label>
                                            <div class="col-8">
                                                <input id="password" name="password" placeholder="Old Password" class="form-control here <?= isset($errors['password']) ? 'is-invalid' : '' ?>" type="password">
                                                <?php if (isset($errors['password'])):?>
                                                    <p class="invalid-feedback">
                                                        <?= $errors['password'];?>
                                                    </p>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="confpassword" class="col-4 col-form-label">Confirm Password</label>
                                            <div class="col-8">
                                                <input id="confpassword" name="confpassword" placeholder="Confirm Password" class="form-control here <?= isset($errors['confpassword']) ? 'is-invalid' : '' ?>" type="password">
                                                <?php if (isset($errors['confpassword'])):?>
                                                    <p class="invalid-feedback">
                                                        <?= $errors['confpassword'];?>
                                                    </p>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-4 col-8">
                                                <button name="submit" type="submit" class="btn btn-primary btn-sm">Change Password</button>
                                                <button name="reset" type="reset" class="btn btn-danger btn-sm">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php else:?>
                                    <h2>Please Login To Change Password</h2>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-2">
            <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
        </div> -->
    </div>
</div>
<?= $this->endSection();?>