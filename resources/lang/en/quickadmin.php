<?php

return [
	
	'user-management' => [
		'title' => 'User Management',
		'created_at' => 'Time',
		'fields' => [
		],
	],
	
	'roles' => [
		'title' => 'Roles',
		'created_at' => 'Time',
		'fields' => [
			'title' => 'Title',
		],
	],
	'notifications' => [
		'title' => 'Reminders',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
			'email' => 'Email',
		],
	],
	
	'users' => [
		'title' => 'Users',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Role',
			'remember-token' => 'Remember token',
		],
	],
	
	'clients' => [
		'title' => 'Patients',
		'created_at' => 'Time',
		'fields' => [
			'c-no' => 'Card Number',
			'first-name' => 'First name',
			'last-name' => 'Last name',
			'phone' => 'Phone',
			'email' => 'Email',
			'dob' => 'Date Of Birth',
			'sex' => 'Gender',
			'addr_line_1' => 'Address Line 1',
			'addr_line_2' => 'Address Line 2',
			'addr_city' => 'City',
			'addr_country' => 'Country',
			'addr_state' => 'State',
			'nok_name' => 'Next Of Kin Name',
			'nok_address' => 'Address',
			'nok_relationship' => 'Relationship',
		],
	],
	
	'employees' => [
		'title' => 'Doctors',
		'created_at' => 'Time',
		'fields' => [
			'first-name' => 'First name',
			'last-name' => 'Last name',
			'phone' => 'Phone',
			'email' => 'Email',
			'services' => 'Services',
		],
	],
	
	'services' => [
		'title' => 'Clinics',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
			'price' => 'Price',
		],
	],	
	
	'working-hours' => [
		'title' => 'Working hours',
		'created_at' => 'Time',
		'fields' => [
			'employee' => 'Employee',
			'date' => 'Date',
			'start-time' => 'Start time',
			'finish-time' => 'Finish time',
		],
	],
	
	'appointments' => [
		'title' => 'Appointments',
		'created_at' => 'Time',
		'fields' => [
			'client' => 'Client',
			'employee' => 'Employee',
			'start-time' => 'Start time',
			'finish-time' => 'Finish time',
			'comments' => 'Comments',
		],
	],
	'qa_create' => 'Create',
	'qa_save' => 'Save',
	'qa_edit' => 'Edit',
	'qa_view' => 'View',
	'qa_update' => 'Update',
	'qa_list' => 'List',
	'qa_sms' => 'Send SMS',
	'qa_email' => 'Send Email',
	'qa_sms_email' => 'Send SMS & Email',
	'qa_no_entries_in_table' => 'No entries in table',
	'custom_controller_index' => 'Custom controller index.',
	'qa_logout' => 'Logout',
	'qa_add_new' => 'Add new',
	'qa_are_you_sure' => 'Are you sure?',
	'qa_back_to_list' => 'Back to list',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Delete',
	'quickadmin_title' => 'Appointments',
];