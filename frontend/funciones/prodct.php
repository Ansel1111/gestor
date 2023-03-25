 <?php 
 require '../../backend/bd/ctconex.php';
 echo '<option value="0">Seleccione el producto</option>';
 $stmt = $connect->prepare('SELECT * FROM suscrp');

  $stmt->execute();


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idsus ; ?>"><?php echo $noms; ?></option>

            <?php
        }

  ?>


