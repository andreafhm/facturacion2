<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherType[]|\Cake\Collection\CollectionInterface $voucherTypes
 */
?>
<!-- Custom fonts for this template -->
    <link href="css/all.min.css" rel="stylesheet">
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

    <nav class="navbar navbar-expand-sm navbar-dark" style="background: #0c4764;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#"><?= __('Actions') ?></a>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="nav-content">   
        <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="/~u20180584/facturacion/voucher-headers">List Voucher Headers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/~u20180584/facturacion/voucher-headers/add">New Voucher Header</a> 
                </li>
        </ul>

    </nav>  

<div class="row" background="">
    <div class="col-md-12">
        <div class='page-header'>
            <h3>
                <?= __('Voucher Types') ?>
                
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).__('New'), ['controller' => 'VoucherTypes', 'action' => 'add'], ['class' => 
                'btn btn-sm btn-primary', 'escape' => false]) ?>
            </h3>
        </div>
        <div class="table-responsive">            
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($voucherTypes as $voucherType): ?>
                    <tr>
                        <td><?= $this->Number->format($voucherType->id) ?></td>
                        <td><?= h($voucherType->name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $voucherType->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $voucherType->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $voucherType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucherType->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
        </div>

        <div class="paginator">
                <ul class="pagination">    
                     <?php
                        echo $this->BootsCakePaginator->first();
                        echo $this->BootsCakePaginator->prev();
                        echo $this->BootsCakePaginator->numbers();
                        echo $this->BootsCakePaginator->next();
                        echo $this->BootsCakePaginator->last();
                     /*
                    $this->Paginator->templates([
                        'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                    ]); ?>            
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous'), ['tag' => 'li', 'escape' => false], '<a href="#">&laquo;</a>', ['class' => 'prev disabled', 'tag' => 'li', 'escape' => false]) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>')*/ 
                    ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>

        </div>
    </div>
</div>
