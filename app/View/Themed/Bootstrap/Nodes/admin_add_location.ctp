<div class="nodes form">
<?php echo $this->Form->create('Node'); ?>
	<fieldset>
		<legend><?php echo __('Add Node'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('address');
		echo $this->Form->hidden('user_id', array(
			'value' => '51ddedab-13fc-4ee4-9cd5-543fca2286d8' //$user_id
		));
		echo $this->Form->hidden('type_id', array(
			'value' => $type_id['Type']['id']
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
