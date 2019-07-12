<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="/~u20180584/facturacion">Facturacion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="container-fluid" id="navbarsExampleDefault">
    <ul class="nav navbar-nav">
                
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/voucher-headers"><?=__('Vouchers')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/products"><?=__('Products')?></a>
      </li>            
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/sellers"><?=__('Sellers')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/clients"><?=__('Clients')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/providers"><?=__('Providers')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/warehouses"><?=__('Warehouses')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/persons"><?=__('Persons')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/cities"><?=__('Cities')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/users"><?=__('Users')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/roles"><?=__('Roles')?></a>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><?= $this->Html->image("flags/peru.png", [
             'alt'=>'Español',
             'url'=> ['controller'=>'App','action'=>'change-language','es_PE']
             ]);  ?>
      </li> 
      <li><?= $this->Html->image("flags/usa.png", [
               'alt'=>'English',
               'url'=> ['controller'=>'App','action'=>'change-language','en_US']
               ]);  ?>
      </li> 
      <li><?= $this->Html->image("flags/brazil.png", [
               'alt'=>'Portugues',
               'url'=> ['controller'=>'App','action'=>'change-language','pt_BR']
               ]);  ?>
      </li> 

    </ul>
    
  </div>

  <div>

                <?php if($loggedIn): ?>
                    <?= $this->Html->link('Logout', '/users/logout', ['class' => 'btn btn-danger']); ?>                    
                <?php else: ?>
                    <?= $this->Html->link('Login', '/users/login', ['class' => 'btn btn-warning ']); ?>   
                <?php endif; ?>

    </div>
</nav>


