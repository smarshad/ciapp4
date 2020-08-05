<?= $this->extend('template/base');?>
<?= $this->section('title');?> 
<?= $title;?>
<?= $this->endSection();?> 

<?= $this->section('content');?> <!-- This 'content' name must be same as we defined in base template-->


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 col-lg-offset-2">
            <form role="form" method="POST" action="<?= base_url('login');?>">
                <?php if(session()->getFlashdata('error') != null):?>
                    <p class="alert alert-success"><?= session()->getFlashdata('error');?></p>
                <?php endif;?>
                <?= csrf_field();?>
                <h2>Please Login</h2>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group input-group">
                            <span class="has-float-label">
                                <input class="form-control" id="email" name="email"type="text" placeholder="Name" value="<?=old('email');?>" />
                                <label for="email">Email *</label>
                            </span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group input-group">
                            <span class="has-float-label">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Name" value="<?=old('password');?>" />
                                <label for="password">Password *</label>
                            </span>
                        </div>
                    </div>
                </div>
                
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <a class="btn btn-primary btn-block btn-lg" href="<?= base_url('register');?>"> Register</a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <input type="submit" value="Sign In" class="btn btn-success btn-block btn-lg" tabindex="7">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 

<div class="container register">




    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <a href="<?= base_url();?>/register" class="signibtn">Register</a>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <form method="post" action="<?= base_url('login');?>">
                    <?php if(session()->getFlashdata('error') != null):?>
                        <p class="alert alert-success"><?= session()->getFlashdata('error');?></p>
                    <?php endif;?>
                    <?= csrf_field();?>
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Please Login</h3>
                        <hr class="colorgraph">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group input-group">
                                    <span class="has-float-label">
                                        <input class="form-control" id="email" name="email"type="text" placeholder="Name" value="<?=old('email');?>" />
                                        <label for="email">Email *</label>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group input-group">
                                    <span class="has-float-label">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Name" value="<?=old('password');?>" />
                                        <label for="password">Password *</label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <input type="submit" class="btnRegister" value="Login"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<?= $this->endSection();?>