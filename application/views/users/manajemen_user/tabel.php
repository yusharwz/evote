<a href="users/view/t" class="btn btn-primary">+ <?php echo $judul_web; ?></a>
<hr>
<?php $this->M_Pesan->get('msg'); ?>
<table id="data_tables" class="table table-bordered table-striped table-hover" width="100%">
  <thead>
    <tr>
      <th width="1%">No.</th>
      <th width="30%">Nama Lengkap</th>
      <th width="10%">NPP</th>
      <th width="15%">Password</th>
      <th width="19%">Jabatan</th>
      <th width="15%">Unit</th>
      <th width="10%">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach ($query->result() as $key => $value) {?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $value->nama_lengkap; ?></td>
        <td><?php echo $value->npp; ?></td>
        <td><?php echo $value->password; ?></td>
        <td><?php echo $value->jabatan; ?></td>
        <td><?php echo $value->unit; ?></td>
        <td class="text-center">
          <a href="users/view/e/<?php echo hashids_encrypt($value->id_user); ?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
          <a href="users/view/h/<?php echo hashids_encrypt($value->id_user); ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
    <?php
    } ?>
  </tbody>
</table>
