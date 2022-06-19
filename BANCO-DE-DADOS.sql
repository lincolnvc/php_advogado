CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `always_allowed` tinyint(1) NOT NULL DEFAULT '1',
  `alias` varchar(255) NOT NULL,
  `is_hidden` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=173 ;

--
-- Extraindo dados da tabela `actions`
--

INSERT INTO `actions` (`id`, `name`, `parent_id`, `always_allowed`, `alias`, `is_hidden`) VALUES
(1, 'login', 0, 0, 'Authentication', 0),
(2, 'login', 1, 1, 'Login', 0),
(3, 'logout', 1, 1, 'Logout', 0),
(4, 'cases', 0, 0, 'All Case', 0),
(5, 'add', 4, 0, 'Add', 0),
(6, 'edit', 4, 0, 'Edit', 0),
(7, 'view_case', 4, 0, 'View Case', 0),
(8, 'fees', 4, 0, 'Fees', 0),
(9, 'archived', 4, 0, 'Archived', 0),
(10, 'starred_cases', 4, 0, 'Starred Cases', 0),
(11, 'archived_cases', 4, 0, 'Archived Cases', 0),
(12, 'view_archived_case', 4, 0, 'View Archived Case', 0),
(13, 'restore', 4, 0, 'Restore', 0),
(14, 'reports', 0, 0, 'Reports', 0),
(15, 'message', 4, 0, 'Message', 0),
(16, 'to_do_list', 0, 0, 'To Do List', 0),
(17, 'add', 16, 0, 'Add', 0),
(18, 'edit', 16, 0, 'Edit', 0),
(19, 'view_to_do', 16, 0, 'View', 0),
(20, 'delete', 16, 0, 'Delete', 0),
(21, 'contacts', 0, 0, 'Contacts', 0),
(22, 'add', 21, 0, 'Add', 0),
(23, 'edit', 21, 0, 'Edit', 0),
(24, 'delete', 21, 0, 'Delete', 0),
(25, 'appointments', 0, 0, 'Appointments', 0),
(26, 'add', 25, 0, 'Add', 0),
(27, 'edit', 25, 0, 'Edit', 0),
(28, 'delete', 25, 0, 'Delete', 0),
(29, 'view_appointment', 25, 0, 'View', 0),
(30, 'custom_fields', 0, 0, 'Custom Fields', 0),
(31, 'delete', 30, 0, 'Delete', 0),
(32, 'clients', 0, 0, 'Clients', 0),
(33, 'add', 32, 0, 'Add', 0),
(34, 'edit', 32, 0, 'Edit', 0),
(35, 'delete', 32, 0, 'Delete', 0),
(36, 'view_client', 32, 0, 'View', 0),
(37, 'employees', 0, 0, 'Employees', 0),
(38, 'add', 37, 0, 'Add', 0),
(39, 'edit', 37, 0, 'Edit', 0),
(40, 'delete', 37, 0, 'Delete', 0),
(41, 'view', 37, 0, 'View', 0),
(42, 'user_role', 0, 0, 'User Role', 0),
(43, 'add', 42, 0, 'Add', 0),
(44, 'edit', 42, 0, 'Edit', 0),
(45, 'delete', 42, 0, 'Delete', 0),
(46, 'departments', 0, 0, 'Departments', 0),
(47, 'add', 46, 0, 'Add', 0),
(48, 'edit', 46, 0, 'Edit', 0),
(49, 'delete', 46, 0, 'Delete', 0),
(50, 'permissions', 0, 0, 'Permissions', 0),
(51, 'location', 0, 0, 'Location', 0),
(52, 'add', 51, 0, 'Add', 0),
(53, 'edit', 51, 0, 'Edit', 0),
(54, 'delete', 51, 0, 'Delete', 0),
(55, 'case_category', 0, 0, 'Case Category', 0),
(56, 'add', 55, 0, 'Add', 0),
(57, 'edit', 55, 0, 'Edit', 0),
(58, 'delete', 57, 0, 'Delete', 0),
(59, 'court_category', 0, 0, 'Court Category', 0),
(60, 'add', 59, 0, 'Add', 0),
(61, 'edit', 59, 0, 'Edit', 0),
(62, 'delete', 59, 0, 'Delete', 0),
(63, 'act', 0, 0, 'Act', 0),
(64, 'add', 63, 0, 'Add', 0),
(65, 'edit', 63, 0, 'Edit', 0),
(66, 'delete', 63, 0, 'Delete', 0),
(67, 'court', 0, 0, 'Court', 0),
(68, 'add', 67, 0, 'Add', 0),
(69, 'edit', 67, 0, 'Edit', 0),
(70, 'delete', 67, 0, 'Delete', 0),
(71, 'case_stage', 0, 0, 'Case Stages', 0),
(72, 'add', 71, 0, 'Add', 0),
(73, 'edit', 71, 0, 'Edit', 0),
(74, 'delete', 71, 0, 'Delte', 0),
(75, 'payment_mode', 0, 0, 'Payment Modes', 0),
(76, 'add', 75, 0, 'Add', 0),
(77, 'edit', 75, 0, 'Edit', 0),
(78, 'delete', 75, 0, 'Delete', 0),
(79, 'settings', 0, 0, 'Settings', 0),
(80, 'notification', 0, 0, 'Notification', 0),
(81, 'languages', 0, 0, 'Languages', 0),
(82, 'edit', 81, 0, 'Edit', 0),
(83, 'delete', 81, 0, 'Delete', 0),
(84, 'dates', 4, 0, 'Hearing Date', 0),
(85, 'get_court_categories', 4, 1, 'get_court_categories', 1),
(86, 'get_courts', 4, 1, 'get_courts', 1),
(87, 'get_case_by_client', 4, 1, '', 1),
(88, 'get_case_by_court', 4, 1, '', 1),
(89, 'get_case_by_location', 4, 1, '', 1),
(90, 'get_case_by_case_stage_id', 4, 1, '', 1),
(91, 'get_case_by_case_filing_date', 4, 1, '', 1),
(92, 'get_case_by_case_hearing_date', 4, 1, '', 1),
(93, 'get_case_by_client_starred', 4, 1, '', 1),
(94, 'get_case_by_court_starred', 4, 1, '', 1),
(95, 'get_case_by_location_starred', 4, 1, '', 1),
(96, 'get_case_by_case_stage_id_starred', 4, 1, '', 1),
(97, 'get_case_by_case_filing_date_starred', 4, 1, '', 1),
(98, 'get_case_by_case_hearing_date_starred', 4, 1, '', 1),
(99, 'get_archive_case_by_client', 4, 1, '', 1),
(100, 'get_archive_case_by_court', 4, 1, '', 1),
(101, 'get_archive_case_by_location', 4, 1, '', 1),
(102, 'get_archive_case_by_case_stage_id', 4, 1, '', 1),
(103, 'get_archive_case_by_case_filing_date', 4, 1, '', 1),
(104, 'get_archive_case_by_case_hearing_date', 4, 1, '', 1),
(105, 'view_all', 4, 0, 'Case Alert', 0),
(106, 'view_all', 25, 0, 'Appointment Alert', 0),
(107, 'view_all', 16, 0, 'To Do Alert', 0),
(108, 'invoice', 0, 0, 'Invoice', 0),
(109, 'mail', 108, 0, 'Mail', 0),
(110, 'pdf', 108, 0, 'Pdf', 0),
(111, 'send', 15, 0, 'Send Message', 0),
(112, 'tasks', 0, 0, 'Tasks', 0),
(113, 'add', 112, 0, 'Add', 0),
(114, 'edit', 112, 0, 'Edit', 0),
(115, 'view', 112, 0, 'View', 0),
(116, 'delete', 112, 0, 'Delete', 0),
(117, 'comments', 112, 0, 'Comments', 0),
(118, 'documents', 0, 0, 'Documents', 0),
(119, 'add', 118, 0, 'Add', 0),
(120, 'edit', 118, 0, 'Edit', 0),
(121, 'delete', 118, 0, 'Delete', 0),
(122, 'manage', 118, 0, 'Manage', 0),
(123, 'bank_details', 37, 0, 'Bank Details', 0),
(124, 'add_bank_details', 37, 0, 'Add Bank Details', 0),
(125, 'delete_bank_details', 37, 0, 'Delete Bank Details', 0),
(126, 'documents', 37, 0, 'Documents', 0),
(127, 'delete_document', 37, 0, 'Delete Documents', 0),
(128, 'download', 118, 1, 'Download', 1),
(129, 'attendance', 0, 0, 'Attendance', 0),
(130, 'leave_notification', 129, 0, 'Leave Notification', 0),
(131, 'update_leave', 129, 0, 'Pending /Approve Leave', 0),
(132, 'delete_leave', 129, 0, 'Delete Leave', 0),
(133, 'mark_in', 129, 0, 'Mark In', 0),
(134, 'mark_out', 129, 0, 'Mark Out', 0),
(135, 'my_attendance', 129, 0, 'My Attendance', 0),
(136, 'my_leaves', 129, 0, 'My Leaves', 0),
(137, 'apply_leave', 129, 0, 'Apply Leave', 0),
(138, 'delete_my_leave', 129, 0, 'Delete My Leave', 0),
(139, 'leave_types', 0, 0, 'Leave Types', 0),
(140, 'add', 139, 0, 'Add', 0),
(141, 'edit', 139, 0, 'Edit', 0),
(142, 'delete', 139, 0, 'Delete', 0),
(143, 'holidays', 0, 0, 'Holidays', 0),
(144, 'add', 143, 0, 'Add', 0),
(145, 'delete', 143, 0, 'Delete', 0),
(146, 'notice', 0, 0, 'Notice', 0),
(147, 'add', 146, 0, 'Add', 0),
(148, 'edit', 146, 0, 'Edit', 0),
(149, 'Delete', 146, 0, 'Delete', 0),
(150, 'view', 146, 0, 'View', 0),
(151, 'switch_language', 81, 1, 'Change Language', 1),
(152, 'my_tasks', 112, 0, 'My Tasks', 0),
(153, 'delete_document', 118, 0, 'My Delete DOcument', 0),
(154, 'get_degi', 37, 1, 'Get Employees Degination By Ajax', 1),
(155, 'view', 21, 0, 'Contact', 0),
(156, 'notes', 4, 0, 'Notes', 0),
(157, 'tax', 0, 0, 'Tax', 0),
(158, 'add', 157, 0, 'Add', 0),
(159, 'edit', 157, 0, 'Edit', 0),
(160, 'delete', 157, 0, 'Delete', 0),
(161, 'case_study', 0, 0, 'Case Study', 0),
(162, 'add', 161, 0, 'Add', 0),
(163, 'edit', 161, 0, 'Edit', 0),
(164, 'delete', 161, 0, 'Delete', 0),
(165, 'view', 161, 0, 'View', 0),
(166, 'delete_fees', 4, 0, 'Delete Fees', 0),
(167, 'view_receipt', 4, 0, 'View Receipt', 0),
(168, 'print_receipt', 4, 1, 'Print Receipt', 1),
(169, 'delete_receipt', 4, 0, 'Delete Receipt', 0),
(170, 'dates_detail', 4, 0, 'View Case Extended Date Details', 0),
(171, 'delete_history', 4, 0, 'Delete Case Extended Dates', 0),
(172, 'attachments', 161, 0, 'Attachments', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acts`
--

CREATE TABLE IF NOT EXISTS `acts` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `contact_id` int(9) unsigned NOT NULL,
  `motive` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `notes` text NOT NULL,
  `is_view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `archived_cases`
--

CREATE TABLE IF NOT EXISTS `archived_cases` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` int(9) unsigned NOT NULL,
  `notes` text NOT NULL,
  `close_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `mark_in` timestamp NULL DEFAULT NULL,
  `mark_out` timestamp NULL DEFAULT NULL,
  `mark_in_notes` text NOT NULL,
  `mark_out_notes` text NOT NULL,
  `mark_in_ip` varchar(32) NOT NULL,
  `mark_out_ip` varchar(32) NOT NULL,
  `current_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bank_details`
--

CREATE TABLE IF NOT EXISTS `bank_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `canned_messages`
--

CREATE TABLE IF NOT EXISTS `canned_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `canned_messages`
--

INSERT INTO `canned_messages` (`id`, `deletable`, `type`, `name`, `subject`, `content`) VALUES
(1, 1, 'order', 'Forgot Password Message', 'Password Reset Link at {site_name}!', '<p>Dear {customer_name},</p><p>If you forget your password, on the login page, click the Following link and you can change your account password</p><p>Username - {username}</p><p>{reset_link}</p><p>Thanks,<br>{site_name}</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cases`
--

CREATE TABLE IF NOT EXISTS `cases` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `case_no` varchar(255) NOT NULL,
  `client_id` int(9) unsigned NOT NULL,
  `location_id` int(9) unsigned NOT NULL,
  `court_id` int(9) unsigned NOT NULL,
  `court_category_id` int(9) unsigned NOT NULL,
  `case_category_id` text NOT NULL,
  `case_stage_id` int(10) unsigned NOT NULL,
  `act_id` text NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `hearing_date` date NOT NULL,
  `o_lawyer` varchar(32) NOT NULL,
  `fees` decimal(10,2) NOT NULL,
  `is_starred` int(11) NOT NULL DEFAULT '0',
  `is_archived` int(11) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `case_categories`
--

CREATE TABLE IF NOT EXISTS `case_categories` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(9) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `case_stages`
--

CREATE TABLE IF NOT EXISTS `case_stages` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `case_study`
--

CREATE TABLE IF NOT EXISTS `case_study` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `case_categories` text NOT NULL,
  `notes` text NOT NULL,
  `result` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `courts`
--

CREATE TABLE IF NOT EXISTS `courts` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location_id` int(9) unsigned NOT NULL,
  `court_category_id` int(9) unsigned NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `court_categories`
--

CREATE TABLE IF NOT EXISTS `court_categories` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `custom_fields`
--

CREATE TABLE IF NOT EXISTS `custom_fields` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `field_type` int(10) NOT NULL,
  `form` int(10) NOT NULL,
  `values` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `working_day` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `days`
--

INSERT INTO `days` (`id`, `name`, `working_day`) VALUES
(1, 'Sunday', 0),
(2, 'Monday', 0),
(3, 'Tuesday', 0),
(4, 'Wednusday', 0),
(5, 'Thursday', 0),
(6, 'Friday', 0),
(7, 'Saturday', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `is_case` tinyint(1) NOT NULL DEFAULT '0',
  `case_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `extended_case`
--

CREATE TABLE IF NOT EXISTS `extended_case` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` int(9) unsigned NOT NULL,
  `next_date` date NOT NULL,
  `last_date` date NOT NULL,
  `note` text NOT NULL,
  `document` text NOT NULL,
  `is_view` int(10) NOT NULL DEFAULT '0',
  `is_view_client` int(10) NOT NULL DEFAULT '0',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` int(9) unsigned NOT NULL,
  `payment_mode_id` int(9) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `invoice` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `flag` text NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `language`
--

INSERT INTO `language` (`id`, `name`, `flag`, `file`) VALUES
(1, 'french', 'french-flag4.jpeg', 'admin_lang.php'),
(2, 'pt-br', 'Bandeira.png', 'admin_lang.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(9) unsigned NOT NULL,
  `date` date DEFAULT NULL,
  `leave_type_id` int(9) unsigned NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leave_types`
--

CREATE TABLE IF NOT EXISTS `leave_types` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `leaves` int(9) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `from_id` int(9) unsigned NOT NULL,
  `to_id` int(9) unsigned NOT NULL,
  `is_view_from` int(9) NOT NULL DEFAULT '0',
  `is_view_to` int(9) NOT NULL DEFAULT '0',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `months`
--

CREATE TABLE IF NOT EXISTS `months` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `months`
--

INSERT INTO `months` (`id`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'Octomber'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notification_setting`
--

CREATE TABLE IF NOT EXISTS `notification_setting` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `case_alert` int(10) NOT NULL,
  `to_do_alert` int(10) NOT NULL,
  `appointment_alert` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `notification_setting`
--

INSERT INTO `notification_setting` (`id`, `case_alert`, `to_do_alert`, `appointment_alert`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment_modes`
--

CREATE TABLE IF NOT EXISTS `payment_modes` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `fees_id` int(9) unsigned NOT NULL,
  `case_id` int(9) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_case_study_attachments`
--

CREATE TABLE IF NOT EXISTS `rel_case_study_attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `case_study_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_department_designation`
--

CREATE TABLE IF NOT EXISTS `rel_department_designation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(10) unsigned NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_document_files`
--

CREATE TABLE IF NOT EXISTS `rel_document_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `document_id` int(9) unsigned NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_fees_tax`
--

CREATE TABLE IF NOT EXISTS `rel_fees_tax` (
  `tax_id` int(9) unsigned NOT NULL,
  `fees_id` int(9) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_form_custom_fields`
--

CREATE TABLE IF NOT EXISTS `rel_form_custom_fields` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `custom_field_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `table_id` int(9) unsigned NOT NULL,
  `form` int(9) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_role_action`
--

CREATE TABLE IF NOT EXISTS `rel_role_action` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(9) unsigned NOT NULL,
  `action_id` int(9) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `header_setting` tinyint(1) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  `contact` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_format` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `mark_out_time` time NOT NULL,
  `invoice_no` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`id`, `name`, `image`, `header_setting`, `address`, `contact`, `email`, `employee_id`, `date_format`, `timezone`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `mark_out_time`, `invoice_no`) VALUES
(1, 'Advogado', '', 0, '', '', 'advocate@advocate.com', 0, '', '', '', '', '', '', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `case_id` int(10) unsigned NOT NULL,
  `priority` int(10) unsigned NOT NULL,
  `due_date` date NOT NULL,
  `progress` varchar(255) NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `task_assigned`
--

CREATE TABLE IF NOT EXISTS `task_assigned` (
  `user_id` int(10) unsigned NOT NULL,
  `task_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `task_comments`
--

CREATE TABLE IF NOT EXISTS `task_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) unsigned NOT NULL,
  `comment_by` int(10) unsigned NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `percent` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `to_do_list`
--

CREATE TABLE IF NOT EXISTS `to_do_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `is_view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `user_role` int(10) NOT NULL,
  `token` varchar(255) NOT NULL,
  `client_case_alert` int(10) NOT NULL DEFAULT '1',
  `department_id` int(10) unsigned NOT NULL,
  `designation_id` int(10) unsigned NOT NULL,
  `joining_date` date NOT NULL,
  `joining_salary` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `image`, `username`, `password`, `gender`, `dob`, `email`, `contact`, `address`, `user_role`, `token`, `client_case_alert`, `department_id`, `designation_id`, `joining_date`, `joining_salary`, `status`) VALUES
(1, 1, 'Advogado', '', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '0000-00-00', 'teste@teste.com', '', '', 1, '', 1, 0, 0, '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Admin Have All Rights'),
(2, 'Clients', 'Clients Have Default Permission');