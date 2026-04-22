
<?= $this->extend('layout/dashboard' ); ?> 
<?= $this->section('content') ?>  
<section class="col-12">
    <div class="card">
            <h4>Tabla de usuarios</h4> 

        <?php if(session()->getFlashdata("msg") ){ ?> 
                <div class="alert alert-success">
                    <?= session()->getFlashdata("msg")  ?>
                </div>  
                <?php } ?>

            <a href="/usuarios/create" class="btn btn-success btn-sm">
                <i class="bi bi-plus"></i> 
                Crear Usuario
            </a>

            <table class="table ">  
                <thead>
                    <tr>
                        <th>#</th>  <th>Nombre</th>
                        <th>Email</th>   <th>Status</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($usuarios as $usuario){  ?>   
                    <tr><!-- renglon  -->
                        <th><?= $usuario["id"];  ?> </th>
                        <td><?= $usuario["nombre"];  ?> </td>
                        <td><?= $usuario["email"];  ?> </td>
                        <td> <?= $usuario["status"];  ?> </td>
                        <td>
                            <a href="/usuarios/<?= $usuario["id"]; ?>" class="btn btn-dark btn-sm " ><i class="bi bi-eye"></i></a>

                        <?php if(session()->get('usuario.rol') === 'admin' OR session()->get('usuario.rol') === 'trabajador') { ?>    
                            <a href="/usuarios/edit/<?= $usuario["id"]; ?>"  class="btn btn-primary  btn-sm " ><i class="bi bi-pencil-square"></i> </a>
                        <?php } ?>

                            <?php if(session()->get('usuario.rol') === 'admin' ) { ?>   
                            <button onClick="eliminar(<?= $usuario["id"];  ?>)"   class="btn btn-danger  btn-sm" > <i class="bi bi-trash"></i> </button>
                        <?php } ?>
                        </td>
                    </tr> <!-- fin renglon  -->
                <?php }  ?>  
                </tbody>
            </table>
    </div>
</section>

<script>  
    function eliminar(id){
       Swal.fire({
            title: "Estas seguro?",
            text: "Se eliminara para siempre!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#30d67d",
            cancelButtonColor: "rgb(229, 8, 93)",
            confirmButtonText: "Si eliminalo!",
            cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
               location.href="/usuarios/delete/"+id
            }
        });
    }
</script>


<?= $this->endSection() ?>