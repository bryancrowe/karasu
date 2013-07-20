<div class="row-fluid">
    <div class="span4 offset4">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend><?php echo __('Login'); ?></legend>
        <?php echo $this->Form->input('username', ['label' => 'Username']) ?>
        <?php echo $this->Form->input('password', ['label' => 'Password <a href="/passwords/forgot">(forgot password)</a>']) ?>
        </fieldset>
        <?php echo $this->Form->end(__('Login')) ?>
    </div>
</div>