<div class="panel panel-default">
  <div class="panel-heading">
    <b><i class="fa fa-user"></i> Profile</b>
  </div>
  <div class="panel-body">
    <?php $this->M_Pesan->get('msg');
    $level = $this->session->userdata('level');?>

    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form class="form-horizontal" action="" method="post" data-parsley-validate="true">
          <div class="form-group">
            <div class="col-md-12">
              <label>Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $this->M_User->view('nama_lengkap'); ?>" placeholder="Nama Lengkap" title="Nama Lengkap" required autofocus onfocus="this.value=this.value">
            </div>
          </div>
        <?php if ($level=='user'): ?>
          <div class="form-group">
            <div class="col-md-12">
              <label>NPP</label>
              <input type="text" name="npp" class="form-control" value="<?php echo $this->M_User->view('npp'); ?>" placeholder="NPP" title="NPP" required readonly>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label>Jabatan</label>
              <input type="text" name="jabatan" class="form-control" value="<?php echo $this->M_User->view('jabatan'); ?>" placeholder="Jabatan" title="Jabatan" required readonly>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label>Unit</label>
              <input type="text" name="unit" class="form-control" value="<?php echo $this->M_User->view('unit'); ?>" placeholder="Unit" title="Unit" required readonly>
            </div>
          </div>
        <?php endif; ?>
        <div class="form-group">
          <div class="col-md-12">
            <div class="input-group input-group">
              <span class="input-group-addon">&nbsp;<i class="fa fa-map-marker"></i>&nbsp;</span>
              <input type="text" name="level" class="form-control" value="<?php echo ucwords($this->M_User->view('level')); ?>" placeholder="Level" title="Level" readonly>
            </div>
          </div>
        </div>
        <button type="submit" name="btnsimpan" class="btn btn-primary" style="width:100%">Update</button>
      </form>
    </div>

  </div>
</div>
