<div class="row-fluid">
	
	<?php foreach ($nodes as $node): ?>
	
		<?php echo $this->element('Nodes' . DS . Inflector::camelize($node['Type']['name']) . DS . 'excerpt', array('node' => $node)); ?>
		<div id="<?php echo $node['Node']['id']; ?>" class="collapsed-comment-form">
		<?php 
			echo $this->Form->create('Comment', array(
				'url' => array(
					'controller' => 'comments',
					'action' => 'add'
				),
			));
			echo $this->Form->input('name', array(
				'div'         => false,
				'label'       => false,
				'placeholder' => 'Your name'
			));
			echo $this->Form->input('email', array(
				'div'         => false,
				'label'       => false,
				'placeholder' => 'Email address'
			));
			echo $this->Form->input('website', array(
				'div'         => false,
				'label'       => false,
				'placeholder' => 'Website (optional)'
			));
			echo $this->Form->input('body', array(
				'div'         => false,
				'label'       => false,
				'placeholder' => 'Comments...'
			));
			echo $this->Form->hidden('node_id', array(
				'value' => $node['Node']['id']
			));
			echo $this->Form->end('Submit');
		?>
		</div>

		<?php
			$commentCount = count($node['Comment']);
			if ($commentCount === 0) {
				$commentWord = 'Comments';
			} elseif ($commentCount === 1) {
				$commentWord = 'Comment';
			} else {
				$commentWord = 'Comments';
			}
		?>

		<span class="label label-info">
			<i class="icon-comment icon-white"></i> <?php echo $commentCount . ' ' . $commentWord; ?>
		</span>
		<button class="btn btn-mini add-comment" data-toggle="<?php echo $node['Node']['id']; ?>">
			<i class="icon-pencil"></i> Add Comment
		</button>
	
	<?php endforeach; ?>
	
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?></p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>

</div>
