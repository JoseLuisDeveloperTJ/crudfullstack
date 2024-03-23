<?php 

include("../../conection.php");

if(isset($_GET['id'])){
    
    $txtid= (isset($_GET['id'])?$_GET['id']:"");
    $stm= $conection->prepare("SELECT * FROM contactos WHERE id=:id"); // Corregí :txid a :id
    $stm->bindparam(":id", $txtid);
    $stm->execute();
    $register = $stm->Fetch(PDO::FETCH_LAZY);
    $name=$register['nombre'];
    $phone=$register['telefono'];
    $date=$register['fecha'];
}

if($_POST){
    $txtid = (isset($_POST['txtid'])?$_POST['txtid']:"");
    $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
    $telefono = (isset($_POST['telefono'])?$_POST['telefono']:"");
    $date = (isset($_POST['fecha'])?$_POST['fecha']:"");
  
    $stm = $conection->prepare("UPDATE contactos SET nombre=:nombre, telefono=:telefono, fecha=:fecha WHERE id=:id");

    $stm->bindParam(":nombre", $nombre); 
    $stm->bindParam(":telefono", $telefono); 
    $stm->bindParam(":fecha", $date);
    $stm->bindParam(":id", $txtid);
    $stm->execute();
  
    header("location:index.php");
  
  }

?>

<?php include("../../template/header.php"); ?>



<br>
<form  action="" method="post">
      <div class="modal-body">
        
        <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid; ?>">

        <label for="">Name</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $name; ?>" placeholder="Please enter the name " >
        <label for="">Phone</label>
        <input type="number" class="form-control" name="telefono" value="<?php echo $phone; ?>"placeholder="Please enter the phone number" >

        <label for="">Date</label>
        <input type="date" class="form-control" name="fecha" value="<?php echo $date; ?>" >
      </div>
      <br>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-dark ms-2">Update</button>
      </div>
</form>


<?php include("../../template/footer.php");  ?>