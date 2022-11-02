<?php include('../Conection/bd.php'); ?>
<div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Variedad Producto</th>
                <th>Tipo de Variedad</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query="select * from v_variedades;";
                $result=mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td><?php echo $row['Variedad Producto']?></td>
                        <td><?php echo $row['Tipo Variedad']?></td>
                    </tr>

                <?php } ?>
        </tbody>
    </table>
</div>