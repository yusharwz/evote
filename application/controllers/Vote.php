<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {

	var $view 	= "users";
	var $re_log = "web/login";
	var $folder = "vote";
	var $judul  = "Data Vote";

  public function index()
	{
		$id_user = $this->session->userdata('id_user');
		if(!isset($id_user)) { redirect("$this->re_log"); }else {
      redirect("$this->folder/v");
    }
	}

	public function v($aksi='',$id='')
	{
		$id = hashids_decrypt($id);
		$id_user = $this->session->userdata('id_user');
		$level 	 = $this->session->userdata('level');
		if(!isset($id_user)) { redirect("$this->re_log"); }
		if ($level!='admin') {
			redirect('404');
		}
    $query = $this->M_Vote->get_field($id);
    if ($aksi=='t' || $aksi=='e') {
      $p = "form";
      if ($aksi=='t') {
        $judul = "Tambah ";
      }elseif ($aksi=='e') {
        $judul = "Edit ";
      }
      $judul .= $this->judul;
    }elseif ($aksi=='h') {
      $cek = $this->M_Vote->get($id);
			if ($cek->num_rows()!=0) {
					$foto = $cek->row()->foto;
					if (file_exists($foto)) {
						unlink($foto);
					}
					$this->M_Vote->delete(array('id_vote'=>$id));
					$this->M_Pesan->add('success','msg','Sukses!',"Data berhasil dihapus","$this->folder/v");
	     }else {
	     		redirect('404');
	     }
			redirect('404');
    }else {
      $judul = $this->judul;
      $p = "tabel";
			$this->db->order_by('id_vote','DESC');
      $query = $this->M_Vote->get($id);
    }

		$data = array(
			'judul_web' => $judul,
			'content'		=> "$this->view/$this->folder/index",
      'view'      => "$this->view/$this->folder/$p",
			'query'		  => $query
		);
		$this->load->view("$this->view/index", $data);

    if (isset($_POST['btnsimpan'])) {
			$nama 			 = htmlentities(strip_tags($this->input->post('nama')));
			$batas_waktu = date('Y-m-d H:i:s',strtotime(htmlentities(strip_tags($this->input->post('batas_waktu')))));
			$lokasi_foto = 'img/user/';
			$foto_size = '3'; //mb
			$fotoname  = $_FILES['foto']['name'];
			$foto_tipe = "jpg|jpeg|png|gif|bmp";
			$this->upload->initialize($this->M_Web->set_upload_options($lokasi_foto,$foto_size,$fotoname,$foto_tipe));
			if ($aksi=='e') {
				$cek = $this->M_Vote->get($id);
				if ($cek->num_rows()==0) {
				  $foto_lama = "";
				}else {
				  $foto_lama = $cek->row()->foto;
				}
			}
			if ($_FILES['foto']['error'] <> 4) {
				if ( ! $this->upload->do_upload('foto'))
				{
						$error = htmlentities(strip_tags($this->upload->display_errors()));
						$up_size = $_FILES['foto']['size']/1024;
						$pesan  = $this->M_Web->cek_error_upload($up_size,$foto_size,$error);
						$simpan=0;
				}
				 else
				{
					if ($aksi=='e') {
						if (file_exists($foto_lama)) {
							if ($foto_lama!='') {
								if (file_exists($foto_lama)) {
									unlink($foto_lama);
								}
							}
						}
					}
						$gbr = $this->upload->data();
						$foto = $lokasi_foto.$gbr['file_name'];
						$simpan=1;
				}
			}else {
				$foto=$foto_lama;
				$simpan=1;
			}

			$data = array('nama'=>$nama,'foto'=>$foto,'batas_waktu'=>$batas_waktu,'tgl_vote'=>$this->M_Web->tgl_now());
      if ($simpan=='1') {
				if ($aksi=='t') {
					$this->M_Vote->save($data);
	      }else {
					$this->M_Vote->update($data, array('id_vote'=>$id));
	      }
				$this->M_Pesan->add('success','msg','Sukses!',"Data berhasil disimpan","$this->folder/v");
      }else {
        $this->M_Pesan->add('danger','msg','Gagal!',"$pesan","$this->folder/v/$aksi/".hashids_encrypt($id));
      }
    }

	}


	public function add()
	{
		$id_user = $this->session->userdata('id_user');
		$level 	 = $this->session->userdata('level');
		if(!isset($id_user)) { redirect("$this->re_log"); }
		if ($level=='admin') {
			redirect('404');
		}
		$query = $this->M_Vote->get();
    $judul = "Vote";
    $p = "add";

		$data = array(
			'judul_web' => $judul,
			'content'		=> "$this->view/$this->folder/index",
      'view'      => "$this->view/$this->folder/$p",
			'query'		  => $query
		);
		$this->load->view("$this->view/index", $data);

    if (isset($_POST['yes'])) {
			$id_vote = htmlentities(strip_tags($this->input->post('id')));
      $vote = 'yes';
			$data = array('id_user'=>$id_user,'id_vote'=>$id_vote,'vote'=>$vote,'tgl_perolehan'=>$this->M_Web->tgl_now());
			$simpan = $this->db->insert('tbl_perolehan',$data);
      if ($simpan) {
				$this->M_Pesan->add('success','msg_beranda','Sukses!',"Berhasil melakukan vote","beranda");
      }else {
        $this->M_Pesan->add('danger','msg','Gagal!',"Silahkan coba lagi...","$this->folder/add");
      }
    }

		if (isset($_POST['no'])) {
			$id_vote = htmlentities(strip_tags($this->input->post('id')));
      $vote = 'no';
			$data = array('id_user'=>$id_user,'id_vote'=>$id_vote,'vote'=>$vote,'tgl_perolehan'=>$this->M_Web->tgl_now());
			$simpan = $this->db->insert('tbl_perolehan',$data);
      if ($simpan) {
				$this->M_Pesan->add('success','msg_beranda','Sukses!',"Berhasil melakukan vote","beranda");
      }else {
        $this->M_Pesan->add('danger','msg','Gagal!',"Silahkan coba lagi...","$this->folder/add");
      }
    }

	}


	public function perolehan($aksi='',$id='')
	{
		$id = hashids_decrypt($id);
		$id_user = $this->session->userdata('id_user');
		$level 	 = $this->session->userdata('level');
		if(!isset($id_user)) { redirect("$this->re_log"); }
		if ($level!='admin') {
			redirect('404');
		}

		$query = $this->M_Vote->get();
		$judul = "Perolehan Vote";
		$p = "grafik";

		$data = array(
			'judul_web' => $judul,
			'content'		=> "$this->view/$this->folder/index",
      'view'      => "$this->view/$this->folder/$p",
			'query'		  => $query
		);
		$this->load->view("$this->view/index", $data);
	}

}
