<div class="metadata form">
<?php echo $this->Form->create('Metadatum'); ?>
	<fieldset>
		<legend><?php echo __('Edit Metadatum'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('key');
		echo $this->Form->input('value');
		echo $this->Form->input('node_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Metadatum.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Metadatum.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Metadata'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Nodes'), array('controller' => 'nodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Node'), array('controller' => 'nodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
