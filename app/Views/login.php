<?= $this->extend('template/base');?>
<?= $this->section('title');?> 
<?= $title;?>
<?= $this->endSection();?> 

<?= $this->section('content');?> <!-- This 'content' name must be same as we defined in base template-->

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-6 col-sm-offset-2 col-md-offset-3 offset-3">
            <form role="form" method="POST" action="<?= base_url('login');?>" style="padding: 50px 0; ">
                <?php if(session()->getFlashdata('message') != null):?>
                    <p class="alert alert-danger"><?= session()->getFlashdata('message');?></p>
                <?php endif;?>

                <?php if(session()->getFlashdata('error') != null):?>
                    <p class="alert alert-danger"><?= session()->getFlashdata('error');?></p>
                <?php endif;?>
                <?= csrf_field();?>
                <h2>Please Login</h2>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group input-group">
                            <span class="has-float-label">
                                <input class="form-control" id="email" name="email"type="text" placeholder="Name" value="<?=old('email');?>" autocomplete="off">
                                <label for="email">Email *</label>
                            </span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group input-group">
                            <span class="has-float-label">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Name" value="<?=old('password');?>" autocomplete="off">
                                <label for="password">Password *</label>
                            </span>
                        </div>
                    </div>
                </div>
                
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <a class="btn btn-primary btn-block btn-xs" href="<?= base_url('register');?>"> Register</a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <input type="submit" value="Sign In" class="btn btn-success btn-block btn-xs" tabindex="7">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection();?>