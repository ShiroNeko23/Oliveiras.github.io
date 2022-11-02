<?php
    $conn = mysqli_connect(
        '34.151.225.212:3306',
        'sa',
        'Qxe"m{I#1ydn/NPC',
        'dbsisWebLirios'
        );
?>
<?php
            $mes=$_GET['meses'];
            $cons="select * from v_varvenmes where Mes='$mes';";
            $result=mysqli_query($conn,$cons) or die(mysqli_error($conn));
            echo '<table class="table table-wrapper table-scroll">';
            echo   '<thead>';
            echo '<tr class="column" mes="'.$mes.'">';
            echo           '<th>Variedad</th>
                        <th>Cantidad Vendida</th>
                    </tr>
                </thead>
                <tbody class="tbodyfiltro">';
                    while($row = mysqli_fetch_array($result)){
                        $var=$row['Variedad'];
                    echo'<tr>'.'<td>';
                    echo $var;
                    echo'</td>'.'<td>';
                    echo ' '.$row['CantidadVendida'].' Paquetes';
                    echo'</td>';
                    echo'</tr>';
                    }
            echo'</tbody>';
            echo '</table>';
    ?>