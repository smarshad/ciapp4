<?= $this->extend('template/base');?>
<?= $this->section('title');?> 
<?= $title;?>
<?= $this->endSection();?> 

<?= $this->section('content');?>  <!-- This 'content' name must be same as we defined in base template-->
<div class="col-md-3">
	<?= $this->include('partials/sidebar');?>
</div>

<div class="col-md-6">
	<h1>Contact us Via <?= $email;?> </h1>
	<?php if($validator != NULL):?>
		<?= $validator;?>
	<?php endif;?>
	<?= $c_f['form_open'];?>
	<div class="form-group"><?= form_label('Enter Your Name','name',['class' =>'text-center']);?><?= $c_f['name'];?></div>
	<div class="form-group"><?= form_label('Enter Your Email','email',['class' =>'text-center']);?><?= $c_f['email'];?></div>
	<div class="form-group"><?= form_label('Enter Your Mesaage','mesage',['class' =>'text-center']);?><?= $c_f['message'];?></div>
	<?= $c_f['form_submit'];?>	
</div>

<div class="col-md-3">
	<?= $this->include('partials/sidebar');?>
</div>
<?= $this->endSection();?>