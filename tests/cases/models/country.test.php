<?php

App::import('Model', 'Country.Country');

class TestRegion extends AppModel {

	var $name = 'TestRegion';

	var $belongsTo = array(
		'Country' => array(
			'className' => 'Country.Country',
			'foreignKey' => 'country',
		)
	);
}

class CountryTestCase extends CakeTestCase {

	var $fixtures = array('plugin.country.test_region', 'plugin.country.country');

	/**
	 * @var Country
	 */
	var $Country;
	
	function startTest() {
		$this->Country = ClassRegistry::init('Country.Country');
		$this->TestRegion = ClassRegistry::init('TestRegion');
 
		if (false) {
			$this->Country = new Country();
			$this->TestRegion = new TestRegion();
		}
	}

	function endTest() {
		unset($this->Country);
		unset($this->TestRegion);
		ClassRegistry::flush();
	}

	function testRelatedFind() {
		$result = $this->TestRegion->find('all', array('contain' => 'Country'));
		
		$this->assertTrue(Set::matches('/TestRegion[title=Sydney]/../Country[title=Australia]', $result));
		$this->assertFalse(Set::matches('/TestRegion[title=Sydney]/../Country[title=United States]', $result));

		$this->assertTrue(Set::matches('/TestRegion[title=New York]/../Country[title=United States]', $result));
	}
	
	function testGetCountryList() {
		$result = $this->Country->getCountryList(array('AU', 'US'));
		
		$expectedTop2 = array(
			'AU'=>'Australia',
			'US'=>'United States',
		);

		//	Fetch top 2 items
		$top2 = array();
		$top2[key($result)] = current($result);
		next($result);
		$top2[key($result)] = current($result);

		$this->assertEqual($expectedTop2, $top2);
	}
}
