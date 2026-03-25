<?= $this->extend('layout/dashboard' ); ?>

<?= $this->section('content'); ?>

<div class="col-md-8">
    <div class="card p-4">
        <h5 class="fw-bold mb-3">EDITAR USUARIO</h5>

    <?php if( session()->getFlashdata('errors') ){
          foreach(session()->getFlashdata('errors') as $error){
    ?>
        <div class="alert alert-danger">
            <?= esc($error)  ?>
        </div>  
        
    <?php }} ?> 
    
        <form action="/usuarios/store" method="POST" >

            <div class="form-group">
                <label > Nombre</label>
                <input type="text" name="nombre"  class="form-control"
                value ="<?= $usuario["nombre"] ?>" 
                required="true" >
            </div>      
            
            <div class="form-group">
                <label > email</label>
                <input type="email" name="email" 
                maxlength="100"
                required="true"
                value ="<?= $usuario["email"] ?>"
                class="form-control">
            </div>      
            
            <div class="form-group">
                <label > Contraseña</label>
                <input type="password" name="contrasena"
                maxlength="25"
                minlength="8"
                class="form-control">
            </div>      

            <br> 
            <button type="submit" class="btn btn-success ">GUARDAR</button>
        </form>


    </div>
</div> 

<?= $this->endSection(); ?>