<?php echo $this->element('Admin/toolbar'); ?>

<table class="table">
	<tr>
		<th>Title</th>
		<th>Type</th>
		<th>Author</th>
		<th>Created</th>
	</tr>
	<?php foreach ($nodes as $node): ?>
		<tr>
			<td><?php echo $node['Node']['title']; ?></td>
			<td><?php echo $node['Type']['name']; ?></td>
			<td><?php echo $node['User']['username']; ?></td>
			<td><?php echo $node['Node']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
