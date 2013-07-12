<h2><?php echo $node['Node']['title']; ?>
<h3><?php echo $this->Time->timeAgoInWords($node['Node']['created']); ?></h3>
<p>
	<?php 
		echo $this->Text->truncate($node['Node']['body'], 250, array(
			'exact' => false,
			'ellipsis' => ' [...]'
		));
	?>
</p>