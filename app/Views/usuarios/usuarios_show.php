<?= $this->extend('layout/dashboard' ); ?>


 <?= $this->section('content') ?> 

 
 <section class="col-11"> 
    <div class="card">
        <br>
        <h3 style="text-align:center;">
            <?= $usuario["nombre"]; ?>
        </h3>
        <hr>
        <ul>
            <li>ID:     <?= $usuario["id"]; ?></li> 
            <li>Email:  <?= $usuario["email"]; ?> </li>
            <li>Status: <?= $usuario["status"]; ?></li>
        </ul> 
    </div>
 </section> 
 

<?= $this->endSection() ?>