<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherType $voucherType
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
                            ['action' => 'delete', $voucherType->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $voucherType->id), 'class' => 'btn btn-danger']
                        )
                    ?>
                    <?= $this->Html->link(__('List Voucher Types'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('List Voucher Headers'), ['controller' => 'VoucherHeaders', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Voucher Header'), ['controller' => 'VoucherHeaders', 'action' => 'add']) ?>
                </li>                    
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($voucherType) ?>
        <fieldset>
            <legend><?= __('Edit Voucher Type') ?></legend>
            <?php
                echo $this->Form->control('name');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
