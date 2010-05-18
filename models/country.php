<?php
class Country extends AppModel {
	
	var $name = 'Country';
	var $displayField = 'title';
	var $recursive = -1;
	var $primaryKey = 'id';

	function getCountryList($countriesAtTop=null) {

		$countryList = $this->find('list', array('order'=>'title'));

		if (!empty($countriesAtTop)) {
			$topList = array();
			foreach ($countriesAtTop as $id) {
				if (!isset($countryList[$id])) {
					continue;
				}
				
				$topList[$id] = $countryList[$id];
				unset($countryList[$id]);
			}
			
			$countryList = $topList + array('' => '-----') + $countryList;
		}
		
		return $countryList;
	}

}
