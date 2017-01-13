<?php
require_once 'app/init.php';
require_once 'app/parts/header.php';

$db = new DB();
$items = $db->get('items');
?>

<div class="content">
    <div class="for">
        <ul>
            <?php foreach($items->results() as $item): ?>
                <li>
                    <form class="frm" method="post" action="app/ajax/action/add.php">
                        <img class="img" src="<?php echo $item->img; ?>">
                        <h6><?php echo $item->name; ?></h6>
                        <p><?php echo $item->description; ?></p>
                        <h4><?php echo $item->price; ?> $</h4>
                        <button name="sbmt" class="add" type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                        <button type="button" id="plus" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        <button type="button" id="minus" class="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <input type="number" class="count-add" name="count" min="1" value="1" disabled>

                        <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<?php require_once 'app/parts/footer.php';