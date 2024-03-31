<table class="table table-striped table-bordered" width="100%">
  <tbody>
<?php foreach ($query->result() as $key => $value): ?>
    <tr>
      <td width="10%" class="text-center">
        <img src="<?php echo $value->foto; ?>" alt="" width="50">
      </td>
      <td class="text-center" style="padding-top:25px;">
        <?php $jml  = $this->M_Vote->hasil($value->id_vote,'1');
        $persentase = $this->M_Vote->hasil($value->id_vote);
        if ($jml <= 25) {
          $warna = "danger";
        }elseif ($jml <= 50) {
          $warna = "warning";
        }elseif ($jml <= 75) {
          $warna = "info";
        }elseif ($jml <= 100) {
          $warna = "success";
        }else {
          $warna = "danger";
        }?>
        <div class="progress">
          <div class="progress-bar progress-bar-<?php echo $warna; ?> progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $jml; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $persentase; ?>;">
            <b><?php echo $persentase; ?></b>
          </div>
        </div>
      </td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
