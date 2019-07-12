<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsWarehouse $productsWarehouse
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">                                
                <li class="nav-item">
                    <a class='navbar-brand'><?= __('Actions') ?></a>
                    <?= $this->Html->link(__('List Products Warehouses'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?>
                    <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?>
                </li>                    
            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($productsWarehouse) ?>
        <fieldset>
            <legend><?= __('Add Products Warehouse') ?></legend>
            <?php
                echo $this->Form->control('warehouse_id', ['options' => $warehouses]);
                echo $this->Form->control('product_id', ['options' => $products]);
                echo $this->Form->control('stock');
                echo $this->Form->control('date', ['empty' => true]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
