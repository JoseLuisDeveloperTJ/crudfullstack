<?php
if($_POST){
  $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
  $telefono = (isset($_POST['telefono'])?$_POST['telefono']:"");
  $date = (isset($_POST['fecha'])?$_POST['fecha']:"");

  $stm=$conection->prepare("INSERT INTO contactos(id,nombre,telefono,fecha)
  VALUES(null, :nombre, :telefono, :fecha)");
  $stm->bindParam(":nombre", $nombre); 
  $stm->bindParam(":telefono", $telefono); 
  $stm->bindParam(":fecha", $date);
  $stm->execute();

  header("location:index.php");

}


?>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">Name</label>
        <input type="text" class="form-control" name="nombre" value="" placeholder="Please enter the name " >
        <label for="">Phone</label>
        <input type="number" class="form-control" name="telefono" value="" placeholder="Please enter the phone number" >

        <label for="">Date</label>
        <input type="date" class="form-control" name="fecha" value="" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-dark">Save contact</button>
      </div>
      </form>
    </div>
  </div>
</div>