 <?php 
 require '../../backend/bd/ctconex.php';
 echo '<option value="0">Seleccione el plan</option>';
 $stmt = $connect->prepare('SELECT service.idserv, suscrp.idsus, suscrp.noms, suscrp.descr, suscrp.foto, service.nameserv, service.prec, service.cont, service.state FROM service INNER JOIN suscrp ON service.idsus = suscrp.idsus');

  $stmt->execute();


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idserv ; ?>"><?php echo $noms; ?> - <?php echo $nameserv; ?></option>

            <?php
        }

  ?>


