<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
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
                            ['action' => 'delete', $product->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-danger']
                        )
                    ?>
                    <?= $this->Html->link(__('List Products'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?>
                    <?= $this->Html->link(__('List Voucher Details'), ['controller' => 'VoucherDetails', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Voucher Detail'), ['controller' => 'VoucherDetails', 'action' => 'add']) ?>
                    <?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?>
                    <?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?>
                    
                </li>                    
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($product) ?>
        <fieldset>
            <legend><?= __('Edit Product') ?></legend>
            <?php
                echo $this->Form->control('description');
                echo $this->Form->control('quantity');
                echo $this->Form->control('product_type_id', ['options' => $productTypes, 'empty' => true]);
                echo $this->Form->control('status');
                echo $this->Form->control('providers._ids', ['options' => $providers]);
                echo $this->Form->control('warehouses._ids', ['options' => $warehouses]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
