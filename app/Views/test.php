<?= $this->extend('template/base');?>
<?= $this->section('title');?> 
<?= $title;?>
<?= $this->endSection();?> 

<?= $this->section('content');?>  <!-- This 'content' name must be same as we defined in base template-->
<h1>Welcome <?= $pagename;?></h2>
<?= $this->endSection();?>
