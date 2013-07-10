<div class="metadata view">
<h2><?php  echo __('Metadatum'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($metadatum['Metadatum']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($metadatum['Metadatum']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($metadatum['Metadatum']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Node'); ?></dt>
		<dd>
			<?php echo $this->Html->link($metadatum['Node']['title'], array('controller' => 'nodes', 'action' => 'view', $metadatum['Node']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Metadatum'), array('action' => 'edit', $metadatum['Metadatum']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Metadatum'), array('action' => 'delete', $metadatum['Metadatum']['id']), null, __('Are you sure you want to delete # %s?', $metadatum['Metadatum']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Metadata'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Metadatum'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Nodes'), array('controller' => 'nodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Node'), array('controller' => 'nodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
