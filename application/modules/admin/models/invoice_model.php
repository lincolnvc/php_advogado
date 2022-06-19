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

class invoice_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	
	function get_detail($id)
	{
			$this->db->where('F.id',$id);
			$this->db->select('F.*,U.name client,PM.name mode,C.case_no,U.email,U.contact,U.address');
			$this->db->join('cases C', 'C.id = F.case_id', 'LEFT');
			$this->db->join('users U', 'U.id = C.client_id', 'LEFT');
			$this->db->join('payment_modes PM', 'PM.id = F.payment_mode_id', 'LEFT');
			return $this->db->get('fees F')->row();
	}
	
	
	function get_taxes($id)
	{
			$this->db->where('F.id',$id);
			$this->db->select('T.*,');
			$this->db->join('rel_fees_tax R', 'R.fees_id = F.id', 'LEFT');
			$this->db->join('tax T', 'T.id = R.tax_id', 'LEFT');
			return $this->db->get('fees F')->result();
	}
	
	
}