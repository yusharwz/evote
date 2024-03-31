<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Vote extends CI_Model {

  var $tabel = "tbl_vote";
  var $id_pk = "id_vote";

  public function get($id='',$level='')
	{
    if ($id!='') { $this->db->where("$this->id_pk","$id"); }
    if ($level!='') { $this->db->where("$this->level","$level"); }
    $v = $this->db->get($this->tabel);
    return $v;
	}

  public function get_un($un='',$un2='')
	{
    if ($un!='') { $this->db->where("username","$un"); }
    if ($un2!='') { $this->db->where("username!=","$un2"); }
    $v = $this->db->get($this->tabel);
    return $v;
	}

	public function view($data='')
	{
    $id_user = $this->session->userdata('id_user');
    if ($data!='') {
      $v = $this->get($id_user);
      if ($v->num_rows()==0) {
        $v = '';
      }else {
        $v = $v->row()->$data;
      }
    }else {
      $v = '';
    }
    return $v;
	}

  public function field($field,$id='')
	{
    $this->db->select($this->id_pk);
    $this->db->select($field);
    if ($id!='') { $this->db->where("$this->id_pk","$id"); }
    $v = $this->db->get($this->tabel);
    return $v;
	}

  public function get_field($id='')
	{
    $fields = $this->db->list_fields($this->tabel);
    $field_ar = array();
    foreach ($fields as $field)
    {
      $field_ar [$field] = '';
      if ($id!='') {
        $data=$this->field($field,$id);
        if ($data->num_rows()!=0) {
          $field_ar [$field] = $data->row()->$field;
        }
      }
    }
    return $field_ar;
  }

  public function save($data)
  {
    return $this->db->insert($this->tabel,$data);
  }

  public function update($data,$where)
  {
    return $this->db->update($this->tabel,$data,$where);
  }

  public function delete($where)
  {
    return $this->db->delete($this->tabel,$where);
  }


  public function hasil($id_vote,$stt='')
  {
    $jml_data = $this->db->get_where('tbl_perolehan', array('id_vote'=>$id_vote))->num_rows();
    $jml_yes  = $this->db->get_where('tbl_perolehan', array('id_vote'=>$id_vote,'vote'=>'yes'))->num_rows();
    if ($stt==1) {
      return $jml_yes;
    }else {
      return $jml_yes."%";
    }
  }

}
