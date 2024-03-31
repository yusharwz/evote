<a href="vote/v/t" class="btn btn-primary">+ <?php echo $judul_web; ?></a>
<hr>
<?php $this->M_Pesan->get('msg'); ?>
<table id="data_tables" class="table table-bordered table-striped table-hover" width="100%">
  <thead>
    <tr>
      <th width="1%">No.</th>
      <th width="10%">FOTO</th>
      <th width="59%">Nama Lengkap</th>
      <th width="20%">Batas&nbsp;Waktu</th>
      <th width="10%">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach ($query->result() as $key => $value) { ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-center">
          <img src="<?php echo $this->M_Web->cek_file($value->foto); ?>" alt="" width="50">
        </td>
        <td><?php echo $value->nama; ?></td>
        <td><?php echo date('d-m-Y H:i:s',strtotime($value->batas_waktu)); ?></td>
        <td class="text-center">
          <a href="vote/v/e/<?php echo hashids_encrypt($value->id_vote); ?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
          <a href="vote/v/h/<?php echo hashids_encrypt($value->id_vote); ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda yakin?')"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
    <?php
    } ?>
  </tbody>
</table>
