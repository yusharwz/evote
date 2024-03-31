<?php $this->M_Pesan->get('msg'); ?>
<div class="col-md-3"></div>
<div class="col-md-6">
  <form class="form-horizontal" action="" method="post" data-parsley-validate="true">
    <div class="form-group">
      <div class="col-md-12">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $query['nama_lengkap']; ?>" placeholder="Nama Lengkap" title="Nama Lengkap" required autofocus onfocus="this.value=this.value">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>NPP</label>
        <input type="text" name="npp" class="form-control" value="<?php echo $query['npp']; ?>" placeholder="NPP" title="NPP" required>
        <small>*NPP & Password</small>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="<?php echo $query['jabatan']; ?>" placeholder="Jabatan" title="Jabatan" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Unit</label>
        <input type="text" name="unit" class="form-control" value="<?php echo $query['unit']; ?>" placeholder="Unit" title="Unit" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6">
        <a href="users/view.html" class="btn btn-default"><i class="fa fa-angle-double-left"></i> </a>
      </div>
      <div class="col-md-6">
        <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right">Simpan</button>
      </div>
    </div>
  </form>
</div>
<div class="col-md-3"></div>
