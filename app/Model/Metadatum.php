<?php
App::uses('AppModel', 'Model');
/**
 * Metadatum Model
 *
 * @property Node $Node
 */
class Metadatum extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'key' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'value' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'node_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Node' => array(
			'className' => 'Node',
			'foreignKey' => 'node_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave($options = array())
	{
        if (isset($this->data['Metadatum']['address'])) {
        	App::uses('GeocoderComponent', 'Geocoder.Controller/Component');
        	$address = $this->data['Metadatum']['address'];
        	$geocoder = new GeocoderComponent('Geocoder');
        	$geocodeResult = $geocoder->geocode($address);
        	if (count($geocodeResult) > 0) {
            	$latitude = floatval($geocodeResult[0]->geometry->location->lat);
            	$longitude = floatval($geocodeResult[0]->geometry->location->lng);
        	}
        }
        return true;
	}
}
