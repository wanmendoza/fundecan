<?php
/**
 * Donation Form
 * 
 * @author  Varun Sridharan
 * @package WooCommerce Quick Donation/Templates
 * @version 0.1
 */
?>
<style>
    .helpme-text-block  {
        color:#fff;
    }
</style>
<form method="post">
<?php
$fundecanuserid=$_GET["fundecanuser"];
$displayname=get_user_meta( $fundecanuserid,'display_name', true ); 
?>
<input type="hidden" value="<?php echo $fundecanuserid?>" name="fundecan_user_id">
    <table>
        <tr>
            <td> Corredor </td>
            <td style="font-size:16px;"> <?php echo $displayname;?></td>
        </tr>
        <tr>
            <td> Donation a </td>
            <td> <?php echo $donation_box; ?></td>
        </tr>
        <tr>
            <td>Cantidad a donar <?php echo $currency; ?></td>
            <td><?php echo $donation_price; ?></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="donation_add" value="Donar"/></td>
        </tr>
    </table>
    
</form>