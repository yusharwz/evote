<div class="wrap">
<?php
$level = $this->session->userdata('level');
if ($level=='admin'): ?>
  <div class="col-md-4">
    <a href="vote/v.html">
      <div class="box bg-blue">
        <div class="bg-icon"><i class="fa fa-clipboard"></i></div>
        <label>Data Vote</label>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="users/view.html">
      <div class="box bg-cyan">
        <div class="bg-icon"><i class="fa fa-file"></i></div>
        <label>Manejemen User</label>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="vote/perolehan.html">
      <div class="box bg-green">
        <div class="bg-icon"><i class="glyphicon glyphicon-briefcase"></i></div>
        <label>Perolehan Vote</label>
      </div>
    </a>
  </div>

<?php endif; ?>

<?php if ($level=='user'): ?>
  <div class="col-md-12">
    <a href="vote/add.html">
      <div class="box bg-green">
        <div class="bg-icon"><i class="fa fa-clipboard"></i></div>
        <label>Vote</label>
      </div>
    </a>
  </div>
<?php endif; ?>

  <div class="col-md-4">
    <a href="users/profile.html">
      <div class="box bg-purple">
        <div class="bg-icon"><i class="fa fa-user"></i></div>
        <label>My Profile</label>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="users/ubah_pass.html">
      <div class="box bg-yellow">
        <div class="bg-icon"><i class="fa fa-key"></i></div>
        <label>Ubah Password</label>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="web/logout" onclick="return confirm('Anda Yakin?');">
      <div class="box bg-black">
        <div class="bg-icon"><i class="fa fa-sign-out"></i></div>
        <label>Logout</label>
      </div>
    </a>
  </div>

</div>
