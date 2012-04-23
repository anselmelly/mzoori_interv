<table>
    <tr>
        <th>ID</th>
        <th>Status</th>
        <th>Transaction Id</th>
    </tr>
   <?php foreach ($orders as $order):?>
    <tr>
        <td>
            <?php echo $order['id'] ?>
        </td>
        <td>
            <?php echo $order['status'] ?>
        </td>
        <td>
            <?php echo $order['transaction_id'] ?>
        </td>
    </tr>
   <?php endforeach ?>
</table>

