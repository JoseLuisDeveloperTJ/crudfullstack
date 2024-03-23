<?php 

include("../../conection.php");

$stm = $conection->prepare("SELECT * FROM contactos");
$stm->execute();
$contactos = $stm->FetchALL(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
    $txtid= (isset($_GET['id'])?$_GET['id']:"");
    $stm= $conection->prepare("DELETE FROM contactos WHERE id=:id"); // Corregí :txid a :id
    $stm->bindParam(":id",$txtid);
    $stm->execute();
    header("location:index.php");
}

?>



<?php include("../../template/header.php"); ?>
<br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark mb-4" data-toggle="modal" data-target="#exampleModal">
 Add a new contact
</button>


<div class="table-responsive">
<table class="table">
  <thead class="table-dark"><!-- Agregamos la clase thead-dark aquí -->
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contactos as $contacto) {?>
            <tr class="">
                <td scope="row"><?php echo $contacto['id']; ?></td>
                <td><?php echo $contacto['nombre']; ?></td>
                <td><?php echo $contacto['telefono']; ?></td>
                <td><?php echo $contacto['fecha']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $contacto['id']; ?>" class="btn btn-success">Edit</a>
                    <a href="index.php?id=<?php echo $contacto['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<?php include("create.php") ?>

<?php include("../../template/footer.php"); ?>