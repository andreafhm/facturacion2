<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>

<div class="row">
    <div class="col-md-12">
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">                                
                <li class="nav-item">
                    <a class='navbar-brand'><?= __('Actions') ?></a>
                    <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $city->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $city->id), 'class' => 'btn btn-danger']
                        )
                    ?>
                    <?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?>
                </li>                    
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($city) ?>
        <fieldset>
            <legend><?= __('Edit City') ?></legend>
            <?php
                echo $this->Form->control('name');                
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
