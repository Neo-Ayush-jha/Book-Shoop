<div class="list-group mt-5">
    <?php
    $query=mysqli_query($con,"select * from category");
    while($data=mysqli_fetch_array($query)){
    ?>
    <a href="index.php?cat_id=<?= $data['c_id'];?>" class="list-group-item list-group-item-action"><?= $data['cat_title'];?>
    
    
</a>
    <?php }?>
</div>