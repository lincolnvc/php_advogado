<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class document_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function save($save)
	{
		$this->db->insert('documents',$save);
	}
	
	function save_document($save)
	{
		$this->db->insert('rel_document_files',$save);
	}
	
	function get_all()
	{
				   $this->db->select('D.*,C.case_no,C.title case_title,C.id c_id');	
				   $this->db->join('cases C', 'C.id = D.case_id', 'LEFT');
			return $this->db->get('documents D')->result();
	}
	
	function get_all_documents($id){
	
				 $this->db->where('document_id',$id);	
				 $this->db->where('user_id IS NULL');	
		return $this->db->get('rel_document_files')->result();
	}
	
	function get_document($id){
	
				 $this->db->where('id',$id);	
		return $this->db->get('rel_document_files')->row();
	}
	
	function get($id)
	{
			   $this->db->where('id',$id);
		return $this->db->get('documents')->row();
	}
	
	function update($save,$id)
	{
			   $this->db->where('id',$id);
		       $this->db->update('documents',$save);
	}
	
	
	function delete($id)//delte documents
	{
			   $this->db->where('id',$id);
		       $this->db->delete('documents');
	}
	
	
	function delete_document($id)//delte documents
	{
			   $this->db->where('id',$id);
		       $this->db->delete('rel_document_files');
	}
	
	
	
}