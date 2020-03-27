<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_topik extends CI_Model
{
		private $_table = "t_absen";
	public $topik;
	
	function __construct()
	{
		parent::__construct();		
	}

	public function get_topik($id)
	{
		$this->db->select('topik');
		$this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function update($id)
	{
		$post = $this->input->post();		
		$this->db->set('topik', $post["topik"]);
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}

}