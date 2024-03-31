<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	var $view = "web";

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		if(isset($id_user)) {
			redirect("beranda");
		}else {
			redirect("$this->view/login");
		}
	}

	public function login()
	{
		$id_user = $this->session->userdata('id_user');
		if(isset($id_user)) { redirect("beranda"); }

		$data = array(
			'judul_web' => $this->M_Web->view('judul_web')." ".$this->M_Web->view('judul_web2'),
			'content'		=> "$this->view/login"
		);
		$this->load->view("$this->view/index", $data);

		if (isset($_POST['btnlogin'])) {
			$username = htmlentities(strip_tags($this->input->post('username')));
			$password = htmlentities(strip_tags($this->input->post('password')));
			$cek_data = $this->M_User->get_un($username);
			if ($cek_data->num_rows()==0) {
				$this->M_Pesan->add('danger','msg','Gagal!',"Username <b>'$username'</b> belum terdaftar","$this->view/login");
			}else {
				$row = $cek_data->row();
				if ($password <> $row->password) {
					$this->M_Pesan->add('warning','msg','Gagal!',"Username atau Password salah","$this->view/login");
				}else {
					$this->session->set_userdata('id_user', "$row->id_user");
					$this->session->set_userdata('username', "$row->username");
					$this->session->set_userdata('level', "$row->level");
					$this->M_Pesan->add('success','msg_beranda',"Selamat Datang ".$this->M_User->view('nama_lengkap').",","Selamat beraktifitas :)",'beranda');
				}
			}
		}

	}

	public function logout()
	{
     if ($this->session->has_userdata('username') and $this->session->has_userdata('id_user')) {
         $this->session->sess_destroy();
     }
		 redirect("$this->view/login");
  }

	function error_not_found(){
		$id_user = $this->session->userdata('id_user');
		if(!isset($id_user)) { redirect("$this->view/login"); }
		$data = array(
			'judul_web' => "404 Page Not Found",
			'content'		=> "404_content"
		);
		$this->load->view("users/index", $data);
	}

}
