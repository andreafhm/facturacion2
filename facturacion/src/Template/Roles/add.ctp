<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">                                
                <li class="nav-item">
                    <a class='navbar-brand'><?= __('Actions') ?></a>
                    <?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?>
                </li>                    
            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($role) ?>
        <fieldset>
            <legend><?= __('Add Role') ?></legend>
            <?php
                echo $this->Form->control('name');
                echo $this->Form->control('status', ['type' => 'checkbox']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

