<?php
	echo $this->Form->create('Node', array('type' => 'file'));
	echo $this->Form->input('title');
	echo $this->Form->input('Image.0.attachment', array('type' => 'file', 'label' => 'Image'));
	echo $this->Form->input('Image.0.model', array('type' => 'hidden', 'value' => 'Node'));
	echo $this->Form->hidden('user_id', array(
		'value' => $user_id
	));
	echo $this->Form->hidden('type_id', array(
		'value' => $type_id['Type']['id']
	));
	echo $this->Form->end(__('Add'));
?>