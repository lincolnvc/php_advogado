<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
    {
        parent::__construct();

        //load in some helpers
        $this->load->helper(array('form', 'file', 'url'));
		 if(file_exists(FCPATH.'application/config/setup.php'))
			{
				redirect(site_url().'admin/login');
			}else{
			
				redirect(site_url().'install');
				
			}

      
    }
	 
	public function index()
	{
		 
	}
}
