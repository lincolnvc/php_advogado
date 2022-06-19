<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install extends CI_Migration {
    
    public function up()
    {
       
	    $this->_table_actions();
	    $this->_table_acts();
		$this->_table_appointments();
		$this->_table_attendance();
		$this->_table_archived_cases();
		$this->_table_bank_details();
		$this->_table_days();
		$this->_table_canned_messages();
		$this->_table_cases();
		$this->_table_case_categories();
        $this->_table_case_stages();
		$this->_table_case_study();
        $this->_table_contacts();
		$this->_table_courts();
		$this->_table_court_categories();
		$this->_table_custom_fields();
		$this->_table_departments();
		$this->_table_documents();
		$this->_table_extended_case();
		$this->_table_holidays();
		$this->_table_fees();
		$this->_table_language();
		$this->_table_leaves();
		$this->_table_leave_types();
		$this->_table_locations();
		$this->_table_message();
		$this->_table_months();
		$this->_table_notification_setting();
		$this->_table_notice();
		$this->_table_payment_modes();
		$this->_table_receipt();
		$this->_table_rel_case_study_attachments();
		$this->_table_rel_document_files();
		$this->_table_rel_department_designation();
		$this->_table_rel_form_custom_fields();
		$this->_table_rel_fees_tax();
		$this->_table_rel_role_action();
		$this->_table_settings();
		$this->_table_to_do_list();
		$this->_table_tasks();
		$this->_table_task_comments();
		$this->_table_task_assigned();
		$this->_table_tax();
		$this->_table_user_role();
		$this->_table_users();
	}
    
    public function down()
    {
        // Migration 1 has no rollback 
    }
    
	
	private function _table_actions()
    {
        if(!$this->db->table_exists('actions'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
				 'parent_id' => array(
                          'type' => 'int',
                            'constraint' => 11,
                            ),			
				 'always_allowed' => array(
                            'type' => 'tinyint',
							'constraint' => 1,
							'default' => 1,
                            ),
				'alias' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),	
				 'is_hidden' => array(
                            'type' => 'tinyint',
							'constraint' => 4,
							'default' => 0,
                            ),					
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('actions', true);

            //add the default user
			
			$records = array( 
                    array('id'=>'1', 
                    'name'=>'login',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Authentication',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'2', 
                    'name'=>'login',
                    'parent_id'=>'1',
					'always_allowed'=>'1',
					'alias'=>'Login',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'3', 
                    'name'=>'logout',
                    'parent_id'=>'1',
					'always_allowed'=>'1',
					'alias'=>'Logout',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'4', 
                    'name'=>'cases',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'All Case',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'5', 
                    'name'=>'add',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'6', 
                    'name'=>'edit',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'7', 
                    'name'=>'view_case',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'View Case',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'8', 
                    'name'=>'fees',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Fees',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'9', 
                    'name'=>'archived',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Archived',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'10', 
                    'name'=>'starred_cases',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Starred Cases',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'11', 
                    'name'=>'archived_cases',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Archived Cases',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'12', 
                    'name'=>'view_archived_case',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'View Archived Case',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'13', 
                    'name'=>'restore',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Restore',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'14', 
                    'name'=>'reports',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Reports',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'15', 
                    'name'=>'message',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Message',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'16', 
                    'name'=>'to_do_list',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'To Do List',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'17', 
                    'name'=>'add',
                    'parent_id'=>'16',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'18', 
                    'name'=>'edit',
                    'parent_id'=>'16',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'19', 
                    'name'=>'view_to_do',
                    'parent_id'=>'16',
					'always_allowed'=>'0',
					'alias'=>'View',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'20', 
                    'name'=>'delete',
                    'parent_id'=>'16',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	), 
					array('id'=>'21', 
                    'name'=>'contacts',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Contacts',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'22', 
                    'name'=>'add',
                    'parent_id'=>'21',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	), 
					array('id'=>'23', 
                    'name'=>'edit',
                    'parent_id'=>'21',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'24', 
                    'name'=>'delete',
                    'parent_id'=>'21',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'25', 
                    'name'=>'appointments',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Appointments',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'26', 
                    'name'=>'add',
                    'parent_id'=>'25',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'27', 
                    'name'=>'edit',
                    'parent_id'=>'25',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'28', 
                    'name'=>'delete',
                    'parent_id'=>'25',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'29', 
                    'name'=>'view_appointment',
                    'parent_id'=>'25',
					'always_allowed'=>'0',
					'alias'=>'View',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'30', 
                    'name'=>'custom_fields',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Custom Fields',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'31', 
                    'name'=>'delete',
                    'parent_id'=>'30',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'32', 
                    'name'=>'clients',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Clients',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'33', 
                    'name'=>'add',
                    'parent_id'=>'32',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'34', 
                    'name'=>'edit',
                    'parent_id'=>'32',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'35', 
                    'name'=>'delete',
                    'parent_id'=>'32',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'36', 
                    'name'=>'view_client',
                    'parent_id'=>'32',
					'always_allowed'=>'0',
					'alias'=>'View',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'37', 
                    'name'=>'employees',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Employees',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'38', 
                    'name'=>'add',
                    'parent_id'=>'37',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'39', 
                    'name'=>'edit',
                    'parent_id'=>'37',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'40', 
                    'name'=>'delete',
                    'parent_id'=>'37',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'41', 
                    'name'=>'view',
                    'parent_id'=>'37',
					'always_allowed'=>'0',
					'alias'=>'View',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'42', 
                    'name'=>'user_role',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'User Role',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'43', 
                    'name'=>'add',
                    'parent_id'=>'42',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'44', 
                    'name'=>'edit',
                    'parent_id'=>'42',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	), array('id'=>'45', 
                    'name'=>'delete',
                    'parent_id'=>'42',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'46', 
                    'name'=>'departments',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Departments',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'47', 
                    'name'=>'add',
                    'parent_id'=>'46',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'48', 
                    'name'=>'edit',
                    'parent_id'=>'46',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'49', 
                    'name'=>'delete',
                    'parent_id'=>'46',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'50', 
                    'name'=>'permissions',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Permissions',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'51', 
                    'name'=>'location',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Location',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'52', 
                    'name'=>'add',
                    'parent_id'=>'51',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'53', 
                    'name'=>'edit',
                    'parent_id'=>'51',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'54', 
                    'name'=>'delete',
                    'parent_id'=>'51',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'55', 
                    'name'=>'case_category',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Case Category',
					'is_hidden'=>'0', 
                  	), array('id'=>'56', 
                    'name'=>'add',
                    'parent_id'=>'55',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'57', 
                    'name'=>'edit',
                    'parent_id'=>'55',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'58', 
                    'name'=>'delete',
                    'parent_id'=>'57',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'59', 
                    'name'=>'court_category',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Court Category',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'60', 
                    'name'=>'add',
                    'parent_id'=>'59',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'61', 
                    'name'=>'edit',
                    'parent_id'=>'59',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'62', 
                    'name'=>'delete',
                    'parent_id'=>'59',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'63', 
                    'name'=>'act',
                    'parent_id'=>'0',
					'always_allowed'=>'',
					'alias'=>'Act',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'64', 
                    'name'=>'add',
                    'parent_id'=>'63',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'65', 
                    'name'=>'edit',
                    'parent_id'=>'63',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'66', 
                    'name'=>'delete',
                    'parent_id'=>'63',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'67', 
                    'name'=>'court',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Court',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'68', 
                    'name'=>'add',
                    'parent_id'=>'67',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'69', 
                    'name'=>'edit',
                    'parent_id'=>'67',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'70', 
                    'name'=>'delete',
                    'parent_id'=>'67',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'71', 
                    'name'=>'case_stage',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Case Stages',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'72', 
                    'name'=>'add',
                    'parent_id'=>'71',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'73', 
                    'name'=>'edit',
                    'parent_id'=>'71',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'74', 
                    'name'=>'delete',
                    'parent_id'=>'71',
					'always_allowed'=>'0',
					'alias'=>'Delte',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'75', 
                    'name'=>'payment_mode',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Payment Modes',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'76', 
                    'name'=>'add',
                    'parent_id'=>'75',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'77', 
                    'name'=>'edit',
                    'parent_id'=>'75',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'', 
                  	),
					 array('id'=>'78', 
                    'name'=>'delete',
                    'parent_id'=>'75',
					'always_allowed'=>'',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'79', 
                    'name'=>'settings',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Settings',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'80', 
                    'name'=>'notification',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Notification',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'81', 
                    'name'=>'languages',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Languages',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'82', 
                    'name'=>'edit',
                    'parent_id'=>'81',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'83', 
                    'name'=>'delete',
                    'parent_id'=>'81',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'84', 
                    'name'=>'dates',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Hearing Date',
					'is_hidden'=>'0', 
                  	),
					 array('id'=>'85', 
                    'name'=>'get_court_categories',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'get_court_categories',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'86', 
                    'name'=>'get_courts',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'get_courts',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'87', 
                    'name'=>'get_case_by_client',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'88', 
                    'name'=>'get_case_by_court',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'89', 
                    'name'=>'get_case_by_location',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'90', 
                    'name'=>'get_case_by_case_stage_id',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'91', 
                    'name'=>'get_case_by_case_filing_date',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'92', 
                    'name'=>'get_case_by_case_hearing_date',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'93', 
                    'name'=>'get_case_by_client_starred',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'94', 
                    'name'=>'get_case_by_court_starred',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'95', 
                    'name'=>'get_case_by_location_starred',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'96', 
                    'name'=>'get_case_by_case_stage_id_starred',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'97', 
                    'name'=>'get_case_by_case_filing_date_starred',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'98', 
                    'name'=>'get_case_by_case_hearing_date_starred',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'99', 
                    'name'=>'get_archive_case_by_client',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'100', 
                    'name'=>'get_archive_case_by_court',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'101', 
                    'name'=>'get_archive_case_by_location',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	), 
					array('id'=>'102', 
                    'name'=>'get_archive_case_by_case_stage_id',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'103', 
                    'name'=>'get_archive_case_by_case_filing_date',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	),
					 array('id'=>'104', 
                    'name'=>'get_archive_case_by_case_hearing_date',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'',
					'is_hidden'=>'1', 
                  	), 
					
					 array('id'=>'105', 
                    'name'=>'view_all',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Case Alert',
					'is_hidden'=>'0', 
                  	), 
					 array('id'=>'106', 
                    'name'=>'view_all',
                    'parent_id'=>'25',
					'always_allowed'=>'0',
					'alias'=>'Appointment Alert',
					'is_hidden'=>'0', 
                  	), 
					 array('id'=>'107', 
                    'name'=>'view_all',
                    'parent_id'=>'16',
					'always_allowed'=>'0',
					'alias'=>'To Do Alert',
					'is_hidden'=>'0', 
                  	), 
					array('id'=>'108', 
                    'name'=>'invoice',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Invoice',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'109', 
                    'name'=>'mail',
                    'parent_id'=>'108',
					'always_allowed'=>'0',
					'alias'=>'Mail',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'110', 
                    'name'=>'pdf',
                    'parent_id'=>'108',
					'always_allowed'=>'0',
					'alias'=>'Pdf',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'111', 
                    'name'=>'send',
                    'parent_id'=>'15',
					'always_allowed'=>'0',
					'alias'=>'Send Message',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'112', 
                    'name'=>'tasks',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Tasks',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'113', 
                    'name'=>'add',
                    'parent_id'=>'112',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'114', 
                    'name'=>'edit',
                    'parent_id'=>'112',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'115', 
                    'name'=>'view',
                    'parent_id'=>'112',
					'always_allowed'=>'0',
					'alias'=>'View',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'116', 
                    'name'=>'delete',
                    'parent_id'=>'112',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'117', 
                    'name'=>'comments',
                    'parent_id'=>'112',
					'always_allowed'=>'0',
					'alias'=>'Comments',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'118', 
                    'name'=>'documents',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Documents',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'119', 
                    'name'=>'add',
                    'parent_id'=>'118',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'120', 
                    'name'=>'edit',
                    'parent_id'=>'118',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'121', 
                    'name'=>'delete',
                    'parent_id'=>'118',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'122', 
                    'name'=>'manage',
                    'parent_id'=>'118',
					'always_allowed'=>'0',
					'alias'=>'Manage',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'123', 
                    'name'=>'bank_details',
                    'parent_id'=>'37',
					'always_allowed'=>'0',
					'alias'=>'Bank Details',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'124', 
                    'name'=>'add_bank_details',
                    'parent_id'=>'37',
					'always_allowed'=>'0',
					'alias'=>'Add Bank Details',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'125', 
                    'name'=>'delete_bank_details',
                    'parent_id'=>'37',
					'always_allowed'=>'0',
					'alias'=>'Delete Bank Details',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'126', 
                    'name'=>'documents',
                    'parent_id'=>'37',
					'always_allowed'=>'0',
					'alias'=>'Documents',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'127', 
                    'name'=>'delete_document',
                    'parent_id'=>'37',
					'always_allowed'=>'0',
					'alias'=>'Delete Documents',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'128', 
                    'name'=>'download',
                    'parent_id'=>'118',
					'always_allowed'=>'1',
					'alias'=>'Download',
					'is_hidden'=>'1', 
                  	),
					array('id'=>'129', 
                    'name'=>'attendance',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Attendance',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'130', 
                    'name'=>'leave_notification',
                    'parent_id'=>'129',
					'always_allowed'=>'0',
					'alias'=>'Leave Notification',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'131', 
                    'name'=>'update_leave',
                    'parent_id'=>'129',
					'always_allowed'=>'0',
					'alias'=>'Pending /Approve Leave',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'132', 
                    'name'=>'delete_leave',
                    'parent_id'=>'129',
					'always_allowed'=>'0',
					'alias'=>'Delete Leave',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'133', 
                    'name'=>'mark_in',
                    'parent_id'=>'129',
					'always_allowed'=>'0',
					'alias'=>'Mark In',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'134', 
                    'name'=>'mark_out',
                    'parent_id'=>'129',
					'always_allowed'=>'0',
					'alias'=>'Mark Out',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'135', 
                    'name'=>'my_attendance',
                    'parent_id'=>'129',
					'always_allowed'=>'0',
					'alias'=>'My Attendance',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'136', 
                    'name'=>'my_leaves',
                    'parent_id'=>'129',
					'always_allowed'=>'0',
					'alias'=>'My Leaves',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'137', 
                    'name'=>'apply_leave',
                    'parent_id'=>'129',
					'always_allowed'=>'0',
					'alias'=>'Apply Leave',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'138', 
                    'name'=>'delete_my_leave',
                    'parent_id'=>'129',
					'always_allowed'=>'0',
					'alias'=>'Delete My Leave',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'139', 
                    'name'=>'leave_types',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Leave Types',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'140', 
                    'name'=>'add',
                    'parent_id'=>'139',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'141', 
                    'name'=>'edit',
                    'parent_id'=>'139',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'142', 
                    'name'=>'delete',
                    'parent_id'=>'139',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'143', 
                    'name'=>'holidays',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Holidays',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'144', 
                    'name'=>'add',
                    'parent_id'=>'143',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'145', 
                    'name'=>'delete',
                    'parent_id'=>'143',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'146', 
                    'name'=>'notice',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Notice',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'147', 
                    'name'=>'add',
                    'parent_id'=>'146',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'148', 
                    'name'=>'edit',
                    'parent_id'=>'146',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'149', 
                    'name'=>'Delete',
                    'parent_id'=>'146',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'150', 
                    'name'=>'view',
                    'parent_id'=>'146',
					'always_allowed'=>'0',
					'alias'=>'View',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'151', 
                    'name'=>'switch_language',
                    'parent_id'=>'81',
					'always_allowed'=>'1',
					'alias'=>'Change Language',
					'is_hidden'=>'1', 
                  	),
					array('id'=>'152', 
                    'name'=>'my_tasks',
                    'parent_id'=>'112',
					'always_allowed'=>'0',
					'alias'=>'My Tasks',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'153', 
                    'name'=>'delete_document',
                    'parent_id'=>'118',
					'always_allowed'=>'0',
					'alias'=>'My Delete DOcument',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'154', 
                    'name'=>'get_degi',
                    'parent_id'=>'37',
					'always_allowed'=>'1',
					'alias'=>'Get Employees Degination By Ajax',
					'is_hidden'=>'1', 
                  	),
					array('id'=>'155', 
                    'name'=>'view',
                    'parent_id'=>'21',
					'always_allowed'=>'0',
					'alias'=>'Contact',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'156', 
                    'name'=>'notes',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Notes',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'157', 
                    'name'=>'tax',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Tax',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'158', 
                    'name'=>'add',
                    'parent_id'=>'157',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'159', 
                    'name'=>'edit',
                    'parent_id'=>'157',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'160', 
                    'name'=>'delete',
                    'parent_id'=>'157',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'161', 
                    'name'=>'case_study',
                    'parent_id'=>'0',
					'always_allowed'=>'0',
					'alias'=>'Case Study',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'162', 
                    'name'=>'add',
                    'parent_id'=>'161',
					'always_allowed'=>'0',
					'alias'=>'Add',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'163', 
                    'name'=>'edit',
                    'parent_id'=>'161',
					'always_allowed'=>'0',
					'alias'=>'Edit',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'164', 
                    'name'=>'delete',
                    'parent_id'=>'161',
					'always_allowed'=>'0',
					'alias'=>'Delete',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'165', 
                    'name'=>'view',
                    'parent_id'=>'161',
					'always_allowed'=>'0',
					'alias'=>'View',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'166', 
                    'name'=>'delete_fees',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Delete Fees',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'167', 
                    'name'=>'view_receipt',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'View Receipt',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'168', 
                    'name'=>'print_receipt',
                    'parent_id'=>'4',
					'always_allowed'=>'1',
					'alias'=>'Print Receipt',
					'is_hidden'=>'1', 
                  	),
					array('id'=>'169', 
                    'name'=>'delete_receipt',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Delete Receipt',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'170', 
                    'name'=>'dates_detail',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'View Case Extended Date Details',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'171', 
                    'name'=>'delete_history',
                    'parent_id'=>'4',
					'always_allowed'=>'0',
					'alias'=>'Delete Case Extended Dates',
					'is_hidden'=>'0', 
                  	),
					array('id'=>'172', 
                    'name'=>'attachments',
                    'parent_id'=>'161',
					'always_allowed'=>'0',
					'alias'=>'Attachments',
					'is_hidden'=>'0', 
                  	),
					
            );

            $this->db->insert_batch('actions', $records);

        }
    }
	
	private function _table_acts()
    {
        if(!$this->db->table_exists('acts'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
                'description' => array(
                            'type' => 'text',
                            'constraint' => 255
                            )
				
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('acts', true);

        }
    }
	
	
	private function _table_appointments()
    {
        if(!$this->db->table_exists('appointments'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
                'contact_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
				'motive' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),	
							
				'date_time' => array(
                            'type' => 'datetime',
                              ),	
				'notes' => array(
                            'type' => 'text',
                            ),	
				'is_view' => array(
                            'type' => 'int',
                            'constraint' => 10,
							 'default' => 0
                            ),							  					
				
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('appointments', true);

        }
    }
	

	
	
	private function _table_attendance()
    {
        if(!$this->db->table_exists('attendance'))
        {

            // create the table
			/*
            $this->db->query(" CREATE TABLE IF NOT EXISTS `attendance` (
`id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `mark_in` timestamp NULL DEFAULT NULL,
  `mark_out` timestamp NULL DEFAULT NULL,
  `mark_in_notes` text NOT NULL,
  `mark_out_notes` text NOT NULL,
  `mark_in_ip` varchar(255) NOT NULL,
  `mark_out_ip` varchar(255) NOT NULL,
  `current_status` tinyint(1) DEFAULT NULL COMMENT '0 for Out , 1 For In'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
ALTER TABLE `attendance` ADD PRIMARY KEY (`id`)");
			*/
			$this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'user_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),
				'mark_in timestamp NULL DEFAULT NULL',
				'mark_out timestamp NULL DEFAULT NULL',
				 'mark_in_notes' => array(
                            'type' => 'text',
                            ),	
				 'mark_out_notes' => array(
                            'type' => 'text',
                            ),	
				 'mark_in_ip' => array(
                            'type' => 'varchar',
							'constraint' => 32,
                            ),
				'mark_out_ip' => array(
                            'type' => 'varchar',
							'constraint' => 32,
                            ),
				 'current_status' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
                           'null' => true,
						  
                            ),														
				
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('attendance', true);
		
        }
    }
	
	private function _table_archived_cases()
    {
        if(!$this->db->table_exists('archived_cases'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'case_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
							
				
				'notes' => array(
                            'type' => 'text',
                            ),
				'close_date' => array(
                            'type' => 'date',
                              ),					
				
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('archived_cases', true);

        }
    }
	
	
	private function _table_bank_details()
    {
        if(!$this->db->table_exists('bank_details'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'user_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),			
				'account_holder_name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'bank_name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'ifsc' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'pan' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'branch' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'account_number' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),								
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('bank_details', true);

        }
    }
	
	
	private function _table_canned_messages()
    {
        if(!$this->db->table_exists('canned_messages'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'deletable' => array(
                                'type' => 'tinyint',
                                'constraint' => 1,
                                'null' => false,
                                'default' => 1
                                ),
                    'type' => array(
                                'type' => 'varchar',
                                'constraint' => 255,
                                'null' => false
                                ),
                    'name' => array(
                                'type' => 'varchar',
                                'constraint' => 50,
                                'null' => true
                                ),
                    'subject' => array(
                                'type' => 'varchar',
                                'constraint' => 100,
                                'null' => true
                                ),
                    'content' => array(
                                'type' => 'text'
                                )								
				
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('canned_messages', true);
			
			$this->db->insert('canned_messages', array('type'=>'order', 'name'=>'Forgot Password Message', 'subject'=>'Password Reset Link at {site_name}!' ,'content'=>'<p>Dear {customer_name},</p><p>If you forget your password, on the login page, click the Following link and you can change your account password</p><p>Username - {username}</p><p>{reset_link}</p><p>Thanks,<br>{site_name}</p>')); 
        }
    }
	
	
/*
			
            $records = array( 
                   'id'=>'1', 
                    'deletable'=>'1',
                    'type'=>'order', 
                    'name'=>'Forgot Password Message',
                    'subject'=>'Password Reset Link at {site_name}!',
                    'content'=>"<p>Dear {customer_name},</p><p>If you forget your password, on the login page, click the Following link and you can change your account password</p><p>Username - {username}</p><p>{reset_link}</p><p>Thanks,<br>{site_name}</p>", 
             
            );
				
           
			
			*/	
	
	
	
	private function _table_cases()
    {
        if(!$this->db->table_exists('cases'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'case_no' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),						
                'client_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
							
				'location_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),			
				'court_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),			
				'court_category_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
				'case_category_id' => array(
                            'type' => 'text',
                            ),			
				'case_stage_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),
				'act_id' => array(
                            'type' => 'text',
                            ),						
				'description' => array(
                            'type' => 'text',
                            ),
				'start_date' => array(
                            'type' => 'date',
                              ),
				'hearing_date' => array(
                            'type' => 'date',
                              ),
				'o_lawyer' => array(
                            'type' => 'varchar',
                            'constraint' => 32,
                            ),		
							
				'fees' => array(
                          'type' => 'decimal(10,2)',
                            ),
				'is_starred' => array(
                            'type' => 'int',
                            'constraint' => 11,
                            'default' => 0,
                            ),	
				'is_archived' => array(
                            'type' => 'int',
                            'constraint' => 11,
                            'default' => 0,
                            ),
				'notes' => array(
                            'type' => 'text',
                            ),															  			  					
				
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('cases', true);

        }
    }
	
	
	
	private function _table_case_categories()
    {
        if(!$this->db->table_exists('case_categories'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'parent_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('case_categories', true);

        }
    }
	
	
	private function _table_case_stages()
    {
        if(!$this->db->table_exists('case_stages'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('case_stages', true);

        }
    }
	
	
	
	private function _table_case_study()
    {
        if(!$this->db->table_exists('case_study'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'case_categories' => array(
                            'type' => 'text',
                            ),	
				'notes' => array(
                            'type' => 'text',
                            ),
				'result' => array(
                            'type' => 'text',
                            ),										
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('case_study', true);

        }
    }
	
	
	private function _table_contacts()
    {
        if(!$this->db->table_exists('contacts'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'contact' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'email' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'address' => array(
                            'type' => 'text',
                            ),									
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('contacts', true);

        }
    }
	
	
	private function _table_courts()
    {
        if(!$this->db->table_exists('courts'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'location_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),			
				'court_category_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
				'description' => array(
                            'type' => 'text',
                            ),									
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('courts', true);

        }
    }
	
	private function _table_court_categories()
    {
        if(!$this->db->table_exists('court_categories'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            )	
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('court_categories', true);

        }
    }
	
	
	private function _table_custom_fields()
    {
        if(!$this->db->table_exists('custom_fields'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'field_type' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            ),
				'form' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            ),
				'values' => array(
                            'type' => 'text',
                            ),										
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('custom_fields', true);

        }
    }
	
	private function _table_days()
    {
        if(!$this->db->table_exists('days'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
							
				'working_day' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
							'default' => 0,
                            ),			
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('days', true);
		
			//add the default Days
			
			$records = array( 
                    array('id'=>'1', 
                    'name'=>'Sunday',
                    ),
					array('id'=>'2', 
                    'name'=>'Monday',
                    ),
					array('id'=>'3', 
                    'name'=>'Tuesday',
                    ),
					array('id'=>'4', 
                    'name'=>'Wednusday',
                    ),
					array('id'=>'5', 
                    'name'=>'Thursday',
                    ),
					array('id'=>'6', 
                    'name'=>'Friday',
                    ),
					array('id'=>'7', 
                    'name'=>'Saturday',
                    )
					
					
            );

            $this->db->insert_batch('days', $records);
		
        }
    }
	
	
	private function _table_departments()
    {
        if(!$this->db->table_exists('departments'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'description' => array(
                            'type' => 'text',
                            ),										
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('departments', true);

        }
    }
	
		private function _table_documents()
    {
        if(!$this->db->table_exists('documents'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'title' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            ),
				'is_case' => array(
                            'type' => 'tinyint',
							'constraint' => 1,
							'default' => 0,
                            ),		
				'case_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),				
			
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('documents', true);

        }
    }
	
		private function _table_extended_case()
    {
        if(!$this->db->table_exists('extended_case'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'case_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),			
				'next_date' => array(
                            'type' => 'date',
                            ),
				'last_date' => array(
                            'type' => 'date',
                            ),
				'note' => array(
                            'type' => 'text',
                            ),
				'document' => array(
                            'type' => 'text',
                            ),
				'is_view' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'default' => 0,
                            ),	
				'is_view_client' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'default' => 0,
                            ),'added TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',																	
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('extended_case', true);

        }
    }
	
	private function _table_fees()
    {
        if(!$this->db->table_exists('fees'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'case_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
				'payment_mode_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),						
				'amount' => array(
                           'type' => 'decimal(10,2)',
                            ),
				'total' => array(
                           'type' => 'decimal(10,2)',
                            ),			
				'date' => array(
                            'type' => 'date',
                            ),
				'invoice' => array(
                             'type' => 'int',
                            'constraint' => 10,
                            ),														
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('fees', true);

        }
    }
	
	
	private function _table_holidays()
    {
        if(!$this->db->table_exists('holidays'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'date' => array(
                            'type' => 'date',
                            )														
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('holidays', true);

        }
    }
	
	
	private function _table_language()
    {
        if(!$this->db->table_exists('language'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'name' => array(
                            'type' => 'varchar',
                            'constraint' => 32,
                            'null' => true
                            ),
                'flag' => array(
                            'type' => 'text'
                            ),
				'file' => array(
                            'type' => 'text'
                            )			
             
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('language', true);

            //add the default user
            $this->db->insert('language', array('name'=>'french', 'flag'=>'french-flag4.jpeg', 'file'=>'admin_lang.php'));
        }
    }
	
	private function _table_leaves()
    {
        if(!$this->db->table_exists('leaves'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'user_id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),			
                'date' => array(
                            'type' => 'date',
							'null' => true,
                            ),
				'leave_type_id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),				
				'reason' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'status' => array(  
                            'type' => 'tinyint',
                            'constraint' => 1,
                            'default' => 0,
                            ),				
             
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('leaves', true);

		}
    }
	
	private function _table_leave_types()
    {
        if(!$this->db->table_exists('leave_types'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(  
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),			
                'description' => array(
                            'type' => 'text'
                            ),
				'leaves' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            )				
             
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('leave_types', true);

		}
    }
	
	private function _table_locations()
    {
        if(!$this->db->table_exists('locations'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            )								
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('locations', true);

        }
    }
	
	private function _table_message()
    {
        if(!$this->db->table_exists('message'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'message' => array(
                            'type' => 'text',
                            ),
				'from_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
				'to_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),				
				'is_view_from' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'default' => 0,
                            ),
				'is_view_to' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'default' => 0,
                            ),	'date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP',					
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('message', true);

        }
    }
	
	
	private function _table_months()
    {
        if(!$this->db->table_exists('months'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 2,
                            'UNSIGNED ZEROFILL' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            )
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('months', true);
		
			//add the default months
			
			$records = array( 
                    array('id'=>'01', 
                    'name'=>'January',
                    ),
					array('id'=>'02', 
                    'name'=>'February',
                    ),
					array('id'=>'03', 
                    'name'=>'March',
                    ),
					array('id'=>'04', 
                    'name'=>'April',
                    ),
					array('id'=>'05', 
                    'name'=>'May',
                    ),
					array('id'=>'06', 
                    'name'=>'June',
                    ),
					array('id'=>'07', 
                    'name'=>'July',
                    ),
					array('id'=>'08', 
                    'name'=>'August',
                    ),
					array('id'=>'09', 
                    'name'=>'September',
                    ),
					array('id'=>'10', 
                    'name'=>'Octomber',
                    ),
					array('id'=>'11', 
                    'name'=>'November',
                    ),
					array('id'=>'12', 
                    'name'=>'December',
                    )
					
					
            );

            $this->db->insert_batch('months', $records);
		
        }
    }
	
		private function _table_notification_setting()
    {
        if(!$this->db->table_exists('notification_setting'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'case_alert' => array(
                            'type' => 'int',
                            'constraint' => 10
                            ),
				'to_do_alert' => array(
                            'type' => 'int',
                            'constraint' => 10
                            ),
				'appointment_alert' => array(
                            'type' => 'int',
                            'constraint' => 10
                            ),						
              		
             
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('notification_setting', true);

            //add the default user
          $this->db->insert('notification_setting', array('case_alert'=>'1', 'to_do_alert'=>'1','appointment_alert'=>'1'));
        
		}
    }
	
	private function _table_notice()
    {
        if(!$this->db->table_exists('notice'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'description' => array(
                            'type' => 'text',
                            ),'date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',						
              		
             
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('notice', true);

		}
    }
	
	private function _table_receipt()
    {
        if(!$this->db->table_exists('receipt'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'fees_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),	
				'case_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
				'amount' => array(
                           'type' => 'decimal(10,2)',
                            ),
					
				'date' => array(
                            'type' => 'date',
                            ),
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('receipt', true);

        }
    }
	
	private function _table_rel_department_designation()
    {
        if(!$this->db->table_exists('rel_department_designation'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'department_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),			
				'designation' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('rel_department_designation', true);

        }
    }
	private function _table_rel_case_study_attachments()
    {
        if(!$this->db->table_exists('rel_case_study_attachments'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'case_study_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),			
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),		
				'file_name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            )												
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('rel_case_study_attachments', true);

        }
    }
	
	private function _table_rel_document_files()
    {
        if(!$this->db->table_exists('rel_document_files'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'user_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),			
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'document_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),			
				'file_name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            )												
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('rel_document_files', true);

        }
    }
	
	
	
	private function _table_payment_modes()
    {
        if(!$this->db->table_exists('payment_modes'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            )								
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('payment_modes', true);

        }
    }
	
	
	
	private function _table_rel_fees_tax()
    {
        if(!$this->db->table_exists('rel_fees_tax'))
        {

            // create the table
            $this->dbforge->add_field(array(
             
				'tax_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
				'fees_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            )
            ));

            $this->dbforge->create_table('rel_fees_tax', true);

        }
    }
	
	private function _table_rel_role_action()
    {
        if(!$this->db->table_exists('rel_role_action'))
        {

            // create the table
            $this->dbforge->add_field(array(
               'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'role_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
				'action_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            )
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('rel_role_action', true);

        }
    }
	
	
	
	
	private function _table_rel_form_custom_fields()
    {
        if(!$this->db->table_exists('rel_form_custom_fields'))
        {

            // create the table
            $this->dbforge->add_field(array(
               'custom_field_id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'reply' => array(
                            'type' => 'text',
                            ),
				'table_id' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            ),
				'form' => array(
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            )
            ));

            $this->dbforge->add_key('custom_field_id', true);
            $this->dbforge->create_table('rel_form_custom_fields', true);

        }
    }

	
	
	private function _table_settings()
    {
        if(!$this->db->table_exists('settings'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
				 'image' => array(
                            'type' => 'text',
                            ),
				'header_setting' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
							'default' => 0,
                            ),			
				 'address' => array(
                            'type' => 'text'
                            ),
				 'contact' => array(
                            'type' => 'varchar',
                            'constraint' => 32
                            ),	
				 'email' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
				'employee_id' => array(
                            'type' => 'int',
                            'constraint' => 11
                            ),			
							
				 'date_format' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
							
				 'timezone' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
				'smtp_host' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
				'smtp_user' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
							
				'smtp_pass' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
							
				'smtp_port' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),	
				'mark_out_time' => array(
                            'type' => 'time',
                            ),	
				'invoice_no' => array(
                            'type' => 'int',
							'constraint' => 10,
							'default' => 1,
                            ),																								
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('settings', true);

            //add the default user
            $this->db->insert('settings', array('name'=>'Advocate', 'email'=>'advocate@advocate.com'));
        }
    }
	
	
	
	
	private function _table_to_do_list()
    {
        if(!$this->db->table_exists('to_do_list'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'title' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            ),
				'description' => array(
                            'type' => 'text',
                            ),			
				'date' => array(
                            'type' => 'date',
                            ),
				'is_view' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'default' => 0,
                            ),				
			
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('to_do_list', true);

        }
    }
	
	private function _table_tasks()
    {
        if(!$this->db->table_exists('tasks'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            ),
				'description' => array(
                            'type' => 'text',
                            ),			
				'case_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),
				'priority' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),							
				'due_date' => array(
                            'type' => 'date',
                            ),
				'progress' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            ),			
				'created_by' => array(
                            'type' => 'int',
                            'constraint' => 10,
                           'unsigned' => true,
                            ),				
			
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('tasks', true);

        }
    }
	
	private function _table_task_comments()
    {
        if(!$this->db->table_exists('task_comments'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
              				),
				'task_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),
				'comment_by' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),			
			
				'comment' => array(
                            'type' => 'text',
                            ),'date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',			
								
			
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('task_comments', true);

        }
    }
	
	private function _table_task_assigned()
    {
        if(!$this->db->table_exists('task_assigned'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'user_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),
				 'task_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),			
						
			
			));

            $this->dbforge->create_table('task_assigned', true);

        }
    }
	
	private function _table_tax()
    {
        if(!$this->db->table_exists('tax'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
				 'percent' => array(
                           'type' => 'varchar',
                            'constraint' => 8,
                            )
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('tax', true);

        }
    }
	
	private function _table_user_role()
    {
        if(!$this->db->table_exists('user_role'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 9,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
                'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255
                            ),
				 'description' => array(
                            'type' => 'text',
                            )
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('user_role', true);

            //add the default user
			
			$records = array( 
                    array('id'=>'1', 
                    'name'=>'Admin',
                    'description'=>'Admin Have All Rights', 
                  	),
					array('id'=>'2', 
                    'name'=>'Clients',
                    'description'=>'Clients Have Default Permission', 
                  	)
            );

            $this->db->insert_batch('user_role', $records);

        }
    }
	
	private function _table_users()
    {
        if(!$this->db->table_exists('users'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'employee_id' => array(
                            'type' => 'int',
                            'constraint' => 11
                            ),				
				'name' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            ),
				'image' => array(
                            'type' => 'text',
                            ),
				'username' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            ),	
				'password' => array(
                            'type' => 'varchar',
							'constraint' => 40,
                            ),				
				'gender' => array(
                            'type' => 'varchar',
							'constraint' => 40,
                            ),							
				'dob' => array(
                            'type' => 'date',
                            ),
				'email' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            ),
				'contact' => array(
                            'type' => 'varchar',
							'constraint' => 32,
                            ),
				'address' => array(
                            'type' => 'text'
                            ),
				'user_role' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            ),	
				'token' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            ),			
				'client_case_alert' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'default' => 1,
                            ),	
							
				'department_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),
				'designation_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),	
				'joining_date' => array(
                            'type' => 'date',
                            ),				
				'joining_salary' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            ),	
				'status' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
                            'default' => 1,
                            ),				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('users', true);

        }
    }
	
	
	
	

}