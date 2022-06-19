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

class reports_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function save($save)
	{
		$this->db->insert('acts',$save);
	}
	
	function get_earning_by_month()
	{
	$y= date("Y");
	$m= date("m");
	$d=@cal_days_in_month(CAL_GREGORIAN,$m,$y);
	
				   $this->db->where('date >=',date("Y-m-d", strtotime("-".$d." days")));
				   $this->db->group_by('date', 'ASC');
				   $this->db->select('date');
				   $this->db->select_sum('amount');
			return $this->db->get('fees')->result();
	}
	
	function get_earning_by_week()
	{
	
				   $this->db->where('date >=',date("Y-m-d", strtotime("- 7 days")));
				   $this->db->group_by('date', 'ASC');
				   $this->db->select('date');
				   $this->db->select_sum('amount');
			return $this->db->get('fees')->result();
	}
	
	function get_earning_by_year()
	{
	
				   $this->db->group_by('YEAR(date)');
				   $this->db->select('date');
				   $this->db->select_sum('amount');
			return $this->db->get('fees')->result();
	}
	
	function get_earning_by_client()
	{
	
				   $this->db->group_by('C.client_id');
				   $this->db->select('date,U.name');
				   $this->db->select_sum('amount');
				   $this->db->join('cases C', 'C.id = F.case_id', 'LEFT');
				   $this->db->join('users U', 'U.id = C.client_id', 'LEFT');
			return $this->db->get('fees F')->result();
	}
	
	

}