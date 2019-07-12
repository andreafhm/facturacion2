<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seller $seller
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">                                
                <li class="nav-item">
                    <a class='navbar-brand'><?= __('Actions') ?></a>
                    <?= $this->Html->link(__('List Sellers'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?>
                    <?= $this->Html->link(__('List Voucher Headers'), ['controller' => 'VoucherHeaders', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Voucher Header'), ['controller' => 'VoucherHeaders', 'action' => 'add']) ?>
                </li>                    
            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($seller) ?>
        <fieldset>
            <legend><?= __('Add Seller') ?></legend>
            <?php
                echo $this->Form->control('person_id', ['options' => $persons]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
