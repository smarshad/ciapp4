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
	<h1>Session name <?= $name;?> </h1>
	<h4>Session name <?= session('name');?> </h4>
	<h4>Session Default  <?= session()->has('name') ? session()->get('name') : 'Default';?> </h4>
	
	<?= $c_f['form_open'];?>
	<div class="form-group"><?= form_label('Enter Your Name','name',['class' =>'text-center']);?><?= $c_f['name'];?>
		<?php if ($validator != null && $validator->hasError('name')): ?>
			<small class=""><i><?= $validator->getError('name','my_single')?></i></small>
		<?php endif;?>
	</div>

	<div class="form-group"><?= form_label('Enter Your Email','email',['class' =>'text-center']);?><?= $c_f['email'];?>
		<?php if ($validator != null && $validator->hasError('email')): ?>
		<?= $validator->showError('email','my_single')?>
		<?php endif;?>
	</div>

	<div class="form-group"><?= form_label('Enter Your Mesaage','mesage',['class' =>'text-center']);?><?= $c_f['message'];?>
		<?php if ($validator != null && $validator->hasError('message')): ?>
		<?= $validator->showError('message','my_single')?>
		<?php endif;?>
	</div>
	<div class="form-group">
		<?= $c_f['form_submit'];?>	
	</div>
	<?= $c_f['form_close'];?>	

</div>

<div class="col-md-3">
	<?= $this->include('partials/sidebar');?>
</div>
<?= $this->endSection();?>