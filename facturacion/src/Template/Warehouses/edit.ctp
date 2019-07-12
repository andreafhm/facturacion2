<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Warehouse $warehouse
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
                            ['action' => 'delete', $warehouse->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $warehouse->id), 'class' => 'btn btn-danger']
                        )
                    ?>
                    <?= $this->Html->link(__('List Warehouses'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?>
                </li>                    
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($warehouse) ?>
        <fieldset>
            <legend><?= __('Edit Warehouse') ?></legend>
            <?php
                echo $this->Form->control('name');
                echo $this->Form->control('status');
                echo $this->Form->control('products._ids', ['options' => $products]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
