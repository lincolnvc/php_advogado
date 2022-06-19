<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2011 Wiredesignz
 * @version 	5.4
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller extends CI_Controller
{
	public $autoload = array();
	
	public function __construct() 
	{
		$this->load->helper('language');
			//echo '<pre>'; print_r($this->session->all_userdata());die;
		
		if($this->uri->segment(2)!="login" && $this->uri->segment(1)!="register" && $this->uri->segment(1)!="forgot"){
			$this->auth->check_session();
		}
		if($this->session->userdata('lang')!="")
		{
			$this->lang->load('admin',$this->session->userdata('lang'));
		}else{
			$this->lang->load('admin', 'english');
		}
		
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		$this->load->model("setting_model");
		
		
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
		$this->settings = $this->setting_model->get_setting();
		if(!empty($this->settings->timezone)){
			date_default_timezone_set($this->settings->timezone);
		}
		if (!function_exists('check_user_role'))
		{
				
				function check_user_role($action_id){
					$CI = &get_instance();
                    $ci_admin=$CI->session->userdata('admin');
					$access	= $ci_admin['user_role'];
                    
                    if($access!=1){    
						$CI->db->where('action_id',$action_id);
						$CI->db->where('role_id',$access);
					    $result = $CI->db->get('rel_role_action')->row();
						if(count($result) > 0){
							return 1;
						}else{
							return 0;
						}
					}else{
						return 1;
					}
				}
		}	
		
		
	
	}


	public function _remap($action, $arguments)
	{	
		$this->load->helper('url');
		$this->load->model("user_role_model");
		$allowed = false;
        $ci_admin=$this->session->userdata('admin');
			if($ci_admin['user_role'] != 1 OR $ci_admin['user_role'] !=2){
			
				$controller = strtolower($this->router->class);
				$parent_id = $this->user_role_model->get_action_parent_id($controller);
				$depart_id = $ci_admin['user_role'];
				$user_id = $ci_admin['id'];	
				//echo $depart_id.'/'.$user_id.'/'.$parent_id ;exit;
				if(empty($depart_id)){
					$allowed=true;
				}elseif($depart_id==1){
					$allowed=true;	
				}elseif(!is_array($parent_id) && $parent_id!=''){
					if($action=='index'){
						$res = $this->user_role_model->get_action_id_by_name_parent($controller); 
						//echo '<pre>'; print_r($res);die;
						$always_allowed = $res->row('always_allowed');
						$action_id = $res->row('id');
						
						if(!$always_allowed) {
						 $is_allowed = $this->user_role_model->check_is_allowed($depart_id, $action_id);
							if($is_allowed){
								$allowed=true;
							}else{
								$allowed=false;
							
							
							}
						}else{
						
							$allowed=true;
						}
						
					}elseif($res = $this->user_role_model->get_action_id_by_name_parent($action, $parent_id)) {
						
						$always_allowed = $res->row('always_allowed');
					
						$action_id = $res->row('id');
						if(!$always_allowed) {
							$is_allowed = $this->user_role_model->check_is_allowed($depart_id, $action_id);
							if($is_allowed){
								$allowed=true;
							}else{
									
								$allowed=false;
							}
						}else{
							$allowed=true;
						}
					}
				}else{
					$allowed=true;
				}
				

                if(@$this->session->userdata['admin']['user_role']==2 && $action=='send_message') 
                    $allowed=true;
                
				if($allowed){
					if (method_exists($this, $action))
					{
						call_user_func_array(array($controller, $action), $arguments);
					} else {
						show_404();
					}
				} else {					
					$this->session->set_flashdata('error', lang('no_access'));
					redirect('admin/dashboard', 'refresh');
				}
                
            }//END USSER ROLE FOR != 1/2
	}	
	
	
	
	public function __get($class) {
		return CI::$APP->$class;
	}
	
	function hello(){
		echo "helo";die;
	}
}