<?php $this->M_Pesan->get('msg');
$id_user = $this->session->userdata('id_user');
$no=0;
foreach ($query->result() as $key => $value) {
  if ($this->M_Web->tgl_now() >= $value->batas_waktu) {
    // echo "Masa waktu vote sudah berakhir!";
  }else{
    if ($this->db->get_where('tbl_perolehan', array('id_user'=>$id_user, 'id_vote'=>$value->id_vote))->num_rows()!=0) {
      // echo "Anda sudah melakukan vote";
    }else {
      $no++;
?>
<div class="col-md-4" style="margin:10px;padding:0px;">
  <center>
    <img src="<?php echo $this->M_Web->cek_file($value->foto); ?>" alt="" style="width:220px;"> <br>
    <b><?php echo $value->nama; ?></b>
    <hr style="margin:0px;padding:5px;">
  </center>
  <form class="form-horizontal" action="" method="post" data-parsley-validate="true" enctype="multipart/form-data">
    <center>
      <input type="hidden" name="id" value="<?php echo $value->id_vote; ?>">
      <div class="col-md-6" style="margin-bottom:7px;">
        <button type="submit" name="yes" class="btn btn-success" onclick="return confirm('Anda yakin?');" style="width:100%">YES</button>
      </div>
      <div class="col-md-6">
        <button type="submit" name="no" class="btn btn-warning" onclick="return confirm('Anda yakin?');" style="width:100%">NO</button>
      </div>
    </center>
  </form>
  <div class="row">
    <div class="col-md-12">
      <hr style="border:1px solid #ddd;">
    </div>
  </div>
</div>

<?php
    }
  }
}
if ($no==0) {
  echo "Belum ada vote";
}
?>
