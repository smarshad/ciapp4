<?= $this->extend('template/base');?>
<?= $this->section('title');?> 
<?= $title;?>
<?= $this->endSection();?> 

<?= $this->section('content');?>  <!-- This 'content' name must be same as we defined in base template-->
<div class="col-md-8">
    <h1>Welcome <?= $title;?></h2>
</div>
<div class="col-md-4">
    <?= $this->include('partials/sidebar')?>
</div>
<?= $this->endSection();?>
