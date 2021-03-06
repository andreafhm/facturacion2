<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Warehouse $warehouse
 */
?>
<style>
        .page-header{   
        margin-top: 10px;
       
        }
        .btn.btn-sm.btn-primary{
        float: right;
        position: relative;
        margin-top: 5px;
        margin-bottom: 15px;
        }
        .nav-scroller.bg-white.shadow-sm{
            margin-top: 10px;
        }
        
    </style>
<div class="row">    
    <div class="col-md-12">
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">                                
                <li class="nav-item">
                    <a class='navbar-brand'><?= __('Actions') ?></a>
                    <?= $this->Html->link(__('Edit Warehouse'), ['action' => 'edit', $warehouse->id]) ?> 
                    <?= $this->Form->postLink(__('Delete Warehouse'), ['action' => 'delete', $warehouse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouse->id)]) ?> 
                    <?= $this->Html->link(__('List Warehouses'), ['action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Warehouse'), ['action' => 'add']) ?> 
                    <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> 
                </li>                                      
            </nav>
        </div>
    </div>
</div>
<div class="well">
    <h3><?= h($warehouse->name) ?></h3>
    <table class="table table-bordered table-hover">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($warehouse->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($warehouse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($warehouse->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($warehouse->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($warehouse->modified) ?></td>
        </tr>
    </table>
    <div class="well">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($warehouse->products)): ?>
        <table class='table table-bordered table-hover' cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Stock') ?></th>
                <th scope="col"><?= __('Product Type Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($warehouse->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->stock) ?></td>
                <td><?= h($products->product_type_id) ?></td>
                <td><?= h($products->status) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
