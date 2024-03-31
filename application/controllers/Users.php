<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	var $view 	= "users";
	var $re_log = "web/login";

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		if(!isset($id_user)) { redirect("$this->re_log"); }

		$data = array(
			'judul_web' => $this->M_Web->view('judul_web')." ".$this->M_Web->view('judul_web2'),
			'content'		=> "$this->view/beranda"
		);
		$this->load->view("$this->view/index", $data);
	}

	public function view($aksi='',$id='')
	{
    $id = hashids_decrypt($id);
		$id_user = $this->session->userdata('id_user');
		$level 	 = $this->session->userdata('level');
		if(!isset($id_user)) { redirect("$this->re_log"); }
		if ($level!='admin') {
			redirect('404');
		}
    $query = $this->M_User->get_field($id);
    if ($aksi=='t' or $aksi=='e') {
      $p = "form";
      if ($aksi=='t') {
        $judul = "Tambah ";
      }elseif ($aksi=='e') {
        $judul = "Edit ";
      }
      $judul .= "Manajemen User";
    }elseif ($aksi=='h') {
			$cek_user = $this->M_User->get($id);
      if ($cek_user->num_rows()!=0) {
				$cek = $this->db->get_where('tbl_vote', array('id_user'=>$id));
				if ($cek->num_rows()!=0) {
					$foto = $cek->row()->foto;
					if (file_exists($foto)) {
						unlink($foto);
					}
					$this->db->delete('tbl_vote', array('id_user'=>$id));
				}
        $this->M_User->delete(array('id_user'=>$id));
        $this->M_Pesan->add('success','msg','Sukses!',"Data berhasil dihapus","$this->view/view");
      }else {
        redirect('404');
      }
    }else {
      $judul = "Manajemen User";
      $p = "tabel";
			$this->db->where('level!=','admin');
      $query = $this->M_User->get($id);
    }

		$data = array(
			'judul_web' => $judul,
			'content'		=> "$this->view/manajemen_user/index",
      'view'      => "$this->view/manajemen_user/$p",
			'query'		  => $query
		);
		$this->load->view("$this->view/index", $data);

    if (isset($_POST['btnsimpan'])) {
			if ($query['level']=='admin') {
				redirect('404');
			}
      $nama_lengkap = htmlentities(strip_tags($this->input->post('nama_lengkap')));
			$npp  				= htmlentities(strip_tags($this->input->post('npp')));
			$jabatan  		= htmlentities(strip_tags($this->input->post('jabatan')));
			$unit  				= htmlentities(strip_tags($this->input->post('unit')));
			if ($aksi=='t') {
				$cek_npp = $this->M_User->get_un($npp);
			}else {
				$cek_npp = $this->M_User->get_un($npp,$query['username']);
			}
			if ($cek_npp->num_rows()!=0) {
				$this->M_Pesan->add('danger','msg','Gagal!',"NPP <b>'$npp'</b> sudah ada","$this->view/view/$aksi/".hashids_encrypt($id));
				exit;
			}
			$data = array('nama_lengkap'=>$nama_lengkap,'npp'=>$npp,'jabatan'=>$jabatan,'unit'=>$unit,'username'=>$npp,'password'=>$npp,'level'=>'user');
			if ($aksi=='t') {
      	$simpan = $this->M_User->save($data);
				$data2 = array('tgl_user'=>$this->M_Web->tgl_now());
				$this->M_User->update($data2, array('id_user'=>$this->db->insert_id()));
			}elseif ($aksi=='e') {
				$simpan = $this->M_User->update($data, array('id_user'=>$id));
      }else {
        redirect('404');
      }
      if ($simpan) {
        $this->M_Pesan->add('success','msg','Sukses!',"Data berhasil disimpan","$this->view/view");
      }else {
        $this->M_Pesan->add('danger','msg','Gagal!',"Silahkan coba lagi","$this->view/view/$aksi/".hashids_encrypt($id));
      }
    }

	}

	public function profile()
	{
		$id_user = $this->session->userdata('id_user');
		$un 		 = $this->session->userdata('username');
		$level 	 = $this->session->userdata('level');
		if(!isset($id_user)) { redirect("$this->re_log"); }

		$data = array(
			'judul_web' => "Profile",
			'content'		=> "$this->view/profile"
		);
		$this->load->view("$this->view/index", $data);

		if (isset($_POST['btnsimpan'])) {
			$nama_lengkap = htmlentities(strip_tags($this->input->post('nama_lengkap')));
			if ($level=='admin') {
				$username = htmlentities(strip_tags($this->input->post('username')));
			}else {
				$username = $un;
			}
			$cek_data = $this->M_User->get_un($username,$un);
			if ($cek_data->num_rows()!=0) {
				$this->M_Pesan->add('danger','msg','Gagal!',"Username <b>'$username'</b> sudah ada","$this->view/profile");
			}else {
				$this->session->set_userdata('username', "$username");
				$data = array('nama_lengkap'=>$nama_lengkap, 'username'=>$username);
				$this->M_User->update($data, array('id_user'=>$id_user));
				$this->M_Pesan->add('success','msg','Sukses!',"Berhasil disimpan","$this->view/profile");
			}
		}

	}

	public function ubah_pass()
	{
		$id_user = $this->session->userdata('id_user');
		$un 		 = $this->session->userdata('username');
		if(!isset($id_user)) { redirect("$this->re_log"); }

		$data = array(
			'judul_web' => "Ubah Password",
			'content'		=> "$this->view/ubah_pass"
		);
		$this->load->view("$this->view/index", $data);

		if (isset($_POST['btnsimpan'])) {
			$password1 = htmlentities(strip_tags($this->input->post('password1')));
			$password2 = htmlentities(strip_tags($this->input->post('password2')));
			$password3 = htmlentities(strip_tags($this->input->post('password3')));

			$cek_data = $this->M_User->get_un($un)->row();
			if ($cek_data->password <> $password1) {
				$this->M_Pesan->add('danger','msg','Gagal!',"Password Lama tidak cocok","$this->view/ubah_pass");
			}else {
				if ($password2 <> $password3) {
					$this->M_Pesan->add('warning','msg','Gagal!',"Konfirmasi Password Baru tidak cocok","$this->view/ubah_pass");
				}
				$data = array('password'=>$password2);
				$this->M_User->update($data, array('id_user'=>$id_user));
				$this->M_Pesan->add('success','msg','Sukses!',"Berhasil disimpan","$this->view/ubah_pass");
			}
		}

	}

}
