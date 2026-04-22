<div class="container-fluid">

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
        <div class="card mb-3">
<div class="card-header">
        <a href="<?php echo site_url('simakand/administrator/dashboard/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">

    
    <?php echo anchor('simakand/administrator/edit/edit/','<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>


