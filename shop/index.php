<?php
require('dbconnect.php');

$recordSet = mysqli_query
    ($db, 'SELECT m.name, i. * FROM makers m, my_items i 
    WHERE m.id=i.maker_id ORDER BY id DESC');
?>

<table width="100%">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">メーカー</th>
    <th scope="col">商品名</th>
    <th scope="col">価格</th>
  </tr>
  <?php
  while ($table = mysqli_fetch_assoc($recordSet)){
  ?>

  <tr>
    <td><?php print(htmlspecialchars($table['id'])); ?></td>
    <td><?php print(htmlspecialchars($table['name'])); ?></td>
    <td><?php print(htmlspecialchars($table['item_name'])); ?></td>
    <td><?php print(htmlspecialchars($table['price'])); ?></td>
  </tr>
  <?php
    }
  ?>
    <ul class="paging">
        <li><a href="index.php?page=2">次のページへ</a></li>
    </ul>
</table>