<?= $this->extend('template/base');?>
<?= $this->section('title');?> 
<?= $title;?>
<?= $this->endSection();?> 

<?= $this->section('content');?>  <!-- This 'content' name must be same as we defined in base template-->

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <!-- <p>You are 30 seconds away from earning your own money!</p> -->
            <a href="<?= base_url();?>/login" class="signibtn">Login</a>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Register Here</h3>
                    <?php 
                    // var_dump(session()->getFlashData('errors'));
                        $errors = [];
                        if(session()->getFlashData('errors') != null):
                            $errors  = session()->getFlashData('errors');
                        endif;
                        
                    ?>
                    <form method="POST" action="<?=base_url('register');?>">
                        <?= csrf_field();?>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid' : '' ?>" name="first_name" placeholder="First Name *" value="<?= old('first_name');?>" />
                                
                                    <?php if (isset($errors['first_name'])):?>
                                        <p class="invalid-feedback">
                                            <?= $errors['first_name'];?>
                                        </p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid' : '' ?>" name="last_name" placeholder="Last Name *" value="<?= old('last_name');?>" />
                                
                                    <?php if (isset($errors['last_name'])):?>
                                        <p class="invalid-feedback">
                                            <?= $errors['last_name'];?>
                                        </p>
                                    <?php endif;?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" name="password" placeholder="Password *" value="<?= old('password');?>" />
                                
                                    <?php if (isset($errors['password'])):?>
                                        <p class="invalid-feedback">
                                            <?= $errors['password'];?>
                                        </p>
                                    <?php endif;?>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="male">
                                            <span> Male </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span> 
                                        </label>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" name="username" placeholder="Your Username *" value="<?= old('username');?>" />
                                
                                    <?php if (isset($errors['username'])):?>
                                        <p class="invalid-feedback">
                                            <?= $errors['username'];?>
                                        </p>
                                    <?php endif;?>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" placeholder="Your Email *" value="<?= old('email');?>" />
                                
                                    <?php if (isset($errors['email'])):?>
                                        <p class="invalid-feedback">
                                            <?= $errors['email'];?>
                                        </p>
                                    <?php endif;?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control <?= isset($errors['confpassword']) ? 'is-invalid' : '' ?>" name="confpassword" placeholder="Confirm Password *" value="<?= old('confpassword');?>" />
                                
                                    <?php if (isset($errors['confpassword'])):?>
                                        <p class="invalid-feedback">
                                            <?= $errors['confpassword'];?>
                                        </p>
                                    <?php endif;?>
                                </div>
                                <input type="submit" class="btnRegister" value="Register"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();?>