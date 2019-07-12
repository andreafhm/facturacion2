<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>

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
        <a class="nav-link" href="/~u20180584/facturacion/cities">List Cities</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/cities/add">New City</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/users">List Users</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/users/add">New User</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/clients">List Clients</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/clients/add">New Client</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/providers">List Providers</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/providers/add">New Provider</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/sellers">List Sellers</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/sellers/add">New Seller</a>
        </li>
</ul>

</nav>


<div class="row" background="">
    <div class="col-md-12">
        <div class='page-header'>
            <h3>
                <?= __('Persons') ?>
                
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).__('New'), ['controller' => 'Persons', 'action' => 'add'], ['class' => 
                'btn btn-sm btn-primary', 'escape' => false]) ?>
            </h3>
        </div>
        <div class="table-responsive">            
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($persons as $person): ?>
                    <tr>
                        <td><?= $this->Number->format($person->id) ?></td>
                        <td><?= h($person->name) ?></td>
                        <td><?= h($person->surname) ?></td>
                        <td><?= $this->Number->format($person->dni) ?></td>
                        <td><?= h($person->phone) ?></td>
                        <td><?= h($person->contact) ?></td>
                        <td><?= h($person->code) ?></td>
                        <td><?= $person->has('city') ? $this->Html->link($person->city->name, ['controller' => 'Cities', 'action' => 'view', $person->city->id]) : '' ?></td>
                        <td><?= $person->has('user') ? $this->Html->link($person->user->email, ['controller' => 'Users', 'action' => 'view', $person->user->id]) : '' ?></td>
                        <td><?= $this->Number->format($person->status) ?></td>
                        <td><?= h($person->created) ?></td>
                        <td><?= h($person->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
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
