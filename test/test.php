<html>
<?php
$shop = array(
    array("rose",   1.25, 15),
    array("daisy",  0.75, 25),
    array("orchid", 1.15, 7 ),
); 
?>


<table>
     <tr>
       <td>title</td>
       <td>price</td>
       <td>number</td>
     </tr>
     <?php foreach ($shop as $row) : ?>
     <tr>
       <td><?php $temp=$row[0];?>
<a href="Jewels.php?cat=<?php echo $temp?>"><?php echo $row[0]; ?></a></td>

       <td><?php echo $row[1]; ?></td>
       <td><?php echo $row[2]; ?></td>
     </tr>
     <?php endforeach; ?>
   </table>
</html>