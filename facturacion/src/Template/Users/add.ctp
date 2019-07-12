<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">                                
                <li class="nav-item">
                    <a class='navbar-brand'><?= __('Actions') ?></a>
                    <?= $this->Html->link(__('List Users'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Rol'), ['controller' => 'Roles', 'action' => 'add']) ?>
                    <?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?>
                </li>                    
            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?=__('Add User')?></legend>
            <?php
                echo $this->Form->control('email');
                echo $this->Form->control('password');
                echo $this->Form->control('role_id', ['options' => $roles]);
                echo $this->Form->control('status', ['type' => 'checkbox']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
