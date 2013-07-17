<h3><?php echo $this->Time->timeAgoInWords($node['Node']['created']); ?></h3>
<p><?php $node['Node']['body']?></p>
<?php
	echo "<img src=\"/files/image/attachment/{$node['Image'][0]['id']}/{$node['Image'][0]['attachment']}\" />";
?>
