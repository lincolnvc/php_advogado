<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Memento admin_model model
 *
 * This class handles admin_model management related functionality
 *
 * @package		Admin
 * @subpackage	admin_model
 * @author		propertyjar
 * @link		#
 */

class message_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function save_message($save)
	{
		$this->db->insert('message',$save);
	}
	
	function get_all()
	{
			return $this->db->get('message')->result();
	}
	function get_all_clients()
	{
		$admin = $this->session->userdata('admin');
		
					$this->db->where('id !=',$admin['id']);
					
			return $this->db->get('users')->result();
	}
	
	function get_client_by_id($id)
	{
			   $this->db->where('id',$id);
		return $this->db->get('users')->row();
	}
	
	function get_message_by_id($id)
	{
		$admin = $this->session->userdata('admin');
                $this->db->where("(M.to_id = ".$admin['id']." OR M.from_id = ".$id.")");
                    //->or_where('M.from_id',$admin['id']);
                $this->db->select('M.*,U1.name from_user,U2.name to_user,U1.image');
                $this->db->join('users U2', 'U2.id = M.to_id', 'LEFT');
                $this->db->join('users U1', 'U1.id = M.from_id', 'LEFT');
		return $this->db->get('message M')->result();
	}
	
	function get_message_count_by_id()
	{
	    $admin = $this->session->userdata('admin');
        
        $this->db->where('M.to_id',$admin['id']);
        $this->db->where('M.is_view_to',1);
        $this->db->select('M.*,U1.name from_user,U2.name to_user,U1.image');
        $this->db->join('users U2', 'U2.id = M.to_id', 'LEFT');
        $this->db->join('users U1', 'U1.id = M.from_id', 'LEFT');
		return $this->db->get('message M')->result();
	}
	
	function message_is_view_by_user()
	{
	    $admin = $this->session->userdata('admin');
		$this->db->where('M.to_id',$admin['id']);
		$this->db->set('M.is_view_to',0);
		$this->db->update('message M');
	}
	
	function message_is_view_by_admin($id)
	{
		$this->db->where('M.from_id',$id);
		$this->db->set('M.is_view_to',0);
		 $this->db->update('message M');
	}
	function update($save,$id)
	{
			   $this->db->where('id',$id);
		       $this->db->update('acts',$save);
	}
	
	
	function delete($id)//delte
	{
			   $this->db->where('id',$id);
		       $this->db->delete('acts');
	}
}