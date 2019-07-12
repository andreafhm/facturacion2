<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsProvider $productsProvider
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
                    <?= $this->Html->link(__('Edit Products Provider'), ['action' => 'edit', $productsProvider->id]) ?> 
                    <?= $this->Form->postLink(__('Delete Products Provider'), ['action' => 'delete', $productsProvider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsProvider->id)]) ?> 
                    <?= $this->Html->link(__('List Products Providers'), ['action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Products Provider'), ['action' => 'add']) ?> 
                    <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> 
                    <?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> 
                </li>                                      
            </nav>
        </div>
    </div>
</div>

<div class="well">
    <h3><?= h($productsProvider->id) ?></h3>
    <table class='table table-bordered table-hover'>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsProvider->has('product') ? $this->Html->link($productsProvider->product->id, ['controller' => 'Products', 'action' => 'view', $productsProvider->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Provider') ?></th>
            <td><?= $productsProvider->has('provider') ? $this->Html->link($productsProvider->provider->id, ['controller' => 'Providers', 'action' => 'view', $productsProvider->provider->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsProvider->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock') ?></th>
            <td><?= $this->Number->format($productsProvider->stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($productsProvider->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($productsProvider->date) ?></td>
        </tr>
    </table>    
</div>
