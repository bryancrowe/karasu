<div class="types view">
<h2><?php  echo __('Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($type['Type']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($type['Type']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Type'), array('action' => 'edit', $type['Type']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Type'), array('action' => 'delete', $type['Type']['id']), null, __('Are you sure you want to delete # %s?', $type['Type']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Nodes'), array('controller' => 'nodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Node'), array('controller' => 'nodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Nodes'); ?></h3>
	<?php if (!empty($type['Node'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($type['Node'] as $node): ?>
		<tr>
			<td><?php echo $node['id']; ?></td>
			<td><?php echo $node['title']; ?></td>
			<td><?php echo $node['body']; ?></td>
			<td><?php echo $node['slug']; ?></td>
			<td><?php echo $node['created']; ?></td>
			<td><?php echo $node['updated']; ?></td>
			<td><?php echo $node['user_id']; ?></td>
			<td><?php echo $node['type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'nodes', 'action' => 'view', $node['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'nodes', 'action' => 'edit', $node['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'nodes', 'action' => 'delete', $node['id']), null, __('Are you sure you want to delete # %s?', $node['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Node'), array('controller' => 'nodes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
