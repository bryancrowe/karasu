<?php
App::uses('AppModel', 'Model');
/**
 * Attachment Model
 *
 */
class Attachment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'model' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foreign_key' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'attachment' => array(
			//'notempty' => array(
			//	'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
	);

	public $actsAs = array(
        'Upload.Upload' => array(
            'attachment' => array(
            	'path' => '{ROOT}webroot{DS}files{DS}{model}{DS}{field}{DS}'
            ),
        ),
    );

    public $belongsTo = array(
        'Node' => array(
            'className' => 'Node',
            'foreignKey' => 'foreign_key',
        ),
    );

}
