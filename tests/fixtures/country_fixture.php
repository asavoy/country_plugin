<?php

class CountryFixture extends CakeTestFixture {
	var $name = 'Country';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 'AU',
			'title' => 'Australia',
		),
		array(
			'id' => 'US',
			'title' => 'United States',
		),
		array(
			'id' => 'NZ',
			'title' => 'New Zealand',
		),
		array(
			'id' => 'FR',
			'title' => 'France',
		),
	);
}
