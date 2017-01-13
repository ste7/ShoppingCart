<?php
require_once '../init.php';

$cart = new Cart();
$total = 0;
?>

<div class="for">
    <?php if($cart->get()):
        foreach($cart->get() as $item): ?>
            <form class="frm" method="post" action="app/ajax/action/delete.php">
                <table>
                    <tr>
                        <td rowspan="2"><img src="<?php echo $cart->item($item->item_id)->img; ?>"><input type="hidden" name="id" value="<?php echo $item->item_id; ?>"></td>
                        <td colspan="4"><?php echo $cart->item($item->item_id)->name; ?></td>
                        <td rowspan="2"><button id="dgm" type="submit" name="ad"><i class="fa fa-trash delete-icon" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                        <td class="fourth" colspan="4"><?php echo $item->quantity . " x " . $item->price . "$ = " . $item->total ."$"; ?></td>
                    </tr>
                </table>
                <hr>
            </form>
            <?php $total += $item->total;
        endforeach; ?>
        <div class="total">
            <span>total: </span><span><?php echo $total . "$"; ?></span>
        </div>

    <?php endif; ?>
</div>