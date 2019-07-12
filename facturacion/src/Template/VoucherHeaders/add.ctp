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
        <?= $this->Form->create($voucherHeader) ?>
        <fieldset>
            <legend><?= __('Add Voucher Header') ?></legend>          
            <?php                
                echo $this->BootsCakeForm->control('issue_date',  array(
                'label' => __('Issue Date'),
                'type'=>'datetime',                
                'default' => date('Y-m-d H:i'),
                ), ['empty' => true]);
                echo $this->Form->control('voucher_type_id', ['options' => $voucherTypes]);
                echo $this->Form->control('seller_id', ['options' => $sellers]);
                echo $this->Form->control('client_id', ['options' => $clients]);
                echo $this->Form->control('voucher_header.status');
            ?>        
        </fieldset>             
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <legend><?= __('Add Voucher Detail') ?></legend>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <?=__('Quantity') ?>
    </div>
    <div class="col-sm-2">
        <?=__('Price') ?>
    </div>
    <div class="col-sm-8">
        <?=__('Product') ?>
    </div>
</div>


<?php
    $count = 4;
    for($i=0; $i<$count; $i++){

?>
<fieldset> 
    <div class="row">
            <?php echo $this->Form->control('voucher_details.'.$i.'.id'); ?>
            <div class="col-sm-2">                    
                <?php echo $this->Form->input('voucher_details.'.$i.'.quantity', ['label' => '']); ?>
            </div>
            <div class="col-sm-2">
                <?php echo $this->Form->input('voucher_details.'.$i.'.price', ['label' => '']); ?>            
            </div>            
            <div class="col-sm-8">
                <?php
                        echo $this->Form->control('voucher_details.'.$i.'.product_id', ['label' => ''], ['options' => $products]);
                ?>
            </div>
        
    </div>
</fieldset>
<?php
    }
?>
 <div class="row">
    <div class="col-md-6 col-md-offset-3"> 
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>