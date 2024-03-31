<?php $this->M_Pesan->get('msg');
$cek = $this->db->get_where('tbl_vote', array('id_vote'=>$query['id_vote']));
if ($cek->num_rows()==0) {
  $batas_waktu = '';
  $foto = "img/logo.png";
}else {
  $batas_waktu = date('d-m-Y H:i:s',strtotime($cek->row()->batas_waktu));
  $foto = $cek->row()->foto;
}
?>
<div class="col-md-3"></div>
<div class="col-md-6">
  <center>
    <img src="<?php echo $this->M_Web->cek_file($foto); ?>" alt="" width="100">
    <hr>
  </center>
  <form class="form-horizontal" action="" method="post" data-parsley-validate="true" enctype="multipart/form-data">
    <div class="form-group">
      <div class="col-md-12">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $query['nama']; ?>" placeholder="Nama Lengkap" title="Nama Lengkap" required autofocus onfocus="this.value=this.value">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Upload Foto</label>
        <input type="file" name="foto" class="form-control" value="" <?php if($query['id_vote']==''){echo "required";} ?>>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Batas Waktu</label>
        <input type="text" name="batas_waktu" id="tgl_3" class="form-control" value="<?php echo $batas_waktu; ?>" placeholder="Batas Waktu" title="Batas Waktu" required style="background:#fff;cursor:pointer">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6">
        <a href="vote/v.html" class="btn btn-default"><i class="fa fa-angle-double-left"></i> </a>
      </div>
      <div class="col-md-6">
        <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right">Simpan</button>
      </div>
    </div>
  </form>
</div>
<div class="col-md-3"></div>
