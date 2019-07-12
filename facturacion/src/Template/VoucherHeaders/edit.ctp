<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherHeader $voucherHeader
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
                            ['action' => 'delete', $voucherHeader->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $voucherHeader->id), 'class' => 'btn btn-danger']
                        )
                    ?>
                    <?= $this->Html->link(__('List Voucher Headers'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('List Voucher Types'), ['controller' => 'VoucherTypes', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Voucher Type'), ['controller' => 'VoucherTypes', 'action' => 'add']) ?>
                    <?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add']) ?>
                    <?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?>
                    <?= $this->Html->link(__('List Voucher Details'), ['controller' => 'VoucherDetails', 'action' => 'index']) ?>
                    <?= $this->Html->link(__('New Voucher Detail'), ['controller' => 'VoucherDetails', 'action' => 'add']) ?>
                </li>                    
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->BootsCakeForm->create($voucherHeader) ?>
        <fieldset>
            <legend><?= __('Edit Voucher Header') ?></legend>            
            <?php
                
                echo $this->BootsCakeForm->control('issue_date',  array(
                'label' => __('Issue Date'),
                'type'=>'datetime',                
                'default' => date('Y-m-d H:i'),
                ), ['empty' => true]);

                echo $this->BootsCakeForm->control('voucher_type_id', ['options' => $voucherTypes]);
                echo $this->BootsCakeForm->control('seller_id', ['options' => $sellers]);
                echo $this->BootsCakeForm->control('client_id', ['options' => $clients]);
                echo $this->BootsCakeForm->control('status', ['type'=>'checkbox']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
