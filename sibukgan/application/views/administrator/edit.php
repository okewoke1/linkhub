<div class="container-fluid">

    <?php if ($this->session->flashdata('message')): ?>
        <div role="alert">
            <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>
        <div class="card mb-3">
<div class="card-header">
        <a href="<?php echo site_url('administrator/dashboard/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
    <form action="<?php echo base_url('administrator/edit') ?>" method="post" class="row g-3">

        <div class="col-md-6">
            <label for="password_lama" class="form-label" >Password Lama</label>
            <input type="password" class="form-control <?php echo form_error('password_lama') ? 'is-invalid':'' ?> mb-3"
             name="password_lama"/>
            <div class="invalid-feedback">
            <?php echo form_error('password_lama') ?>
            </div>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label" >Email</label>
            <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?> mb-3"
             name="email" value="<?php echo $user[] = $email;?>" readonly/>
            <div class="invalid-feedback">
            <?php echo form_error('email') ?>
            </div>
        </div>


        


<!--         <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input name="email" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?> mb-3" readonly>
            <div class="invalid-feedback">
            <?php echo form_error('email') ?>
            </div>
        </div> -->

        <div class="col-md-6">
            <label for="password_baru" class="form-label" >Password Baru</label>
            <input type="password" class="form-control <?php echo form_error('password_baru') ? 'is-invalid':'' ?> mb-3"
             name="password_baru"/>
            <div class="invalid-feedback">
            <?php echo form_error('password_baru') ?>
            </div>
        </div>

        <div class="col-md-6">
            <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </div>

    </form>
    
    
</div> 