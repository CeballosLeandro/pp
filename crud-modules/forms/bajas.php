<?php 
  include('../db.php');

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    }

?>
<?php 
  include('../../includes/header-form.php');
?>
    <div class="container p-4">
    <div class="row">
        </div>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th class="text-success">Fecha Alta</th>
                        <th class="text-danger">Fecha Baja</th>
                        <th>Posición</th>
                        <th class="text-primary">Motivo Baja</th>
                        <th class="text-primary">Lugar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM historial WHERE idobjeto = '$id';";
                        $result_add = mysqli_query($conn, $query);
                        
                        while($row = mysqli_fetch_array($result_add)) {?>
                        <tr>
                            <td><?php echo $row['idobjeto']?></td>
                            <td><?php echo $row['fechaAlta']?></td>
                            <td><?php echo $row['fechaBaja']?></td>
                            <td><?php echo $row['posicion']?></td>
                            <td><?php echo $row['motivobaja']?></td>
                            <td><?php echo $row['lugar']?></td>
                        </tr>
                    <?php }?>            
                </tbody>
            </table>
        <div class="col-md-8">

        </div>
    </div>
</div>    
<?php include("../../includes/footer.php"); ?>