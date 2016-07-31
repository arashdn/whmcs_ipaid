<?php
/**
 * WHMCS Invoice Payment Notification
 *
 * Please upload this file to your whmcs includes/hooks folder and name it ipaid.php
 * This code is free and open source. Feel free to customize it as you need/like
 *
 * @author     Arashdn <gignic@gmail.com>
 * @date       31th of July 2016
 * @version    1.0.1
 * @link       http://gignic.com
 * It was originally created by hetnix and just edited by Arashdn:
 * @link       https://www.hetnix.com/hetnix/whmcs-hook-receive-notification-after-invoice-paid.xml
 */
 
 
if (!defined("WHMCS"))
    die("This file cannot be accessed directly");
 
function ipaid_notif($vars) 
{
 
    $invoiceid = $vars['invoiceid'];
 
    $qry1=mysql_query("SELECT * FROM tblinvoices WHERE id = $invoiceid") or die(mysql_error());
    $strx=mysql_fetch_assoc($qry1);
    $clidx=$strx['userid'];
    $cldtls=mysql_query("SELECT * FROM tblclients WHERE id = $clidx") or die(mysql_error());
    $dox=mysql_fetch_assoc($cldtls);
     
     
    if ($clidx > 0) 
    {
           
        $toj="**YOUREMAIL@MAILBOX.COM**";
        $subj="Payment received - ".$strx['total']." CURRENCY_CODE - Invoice ".$invoiceid;
        $bodj="Invoice ".$invoiceid." received a payment today of ".$strx['total']." CURRENCY_CODE\nDetails: ".$dox['firstname']." ".$dox['lastname']." paid invoice today.\n\nView Invoice: http://www.yourdomain.com/whmcs/admin/invoices.php?action=edit&id=".$invoiceid."\n";
        $headersj = 'From: **FROMEMAIL@MAILBOX.COM**' . "\r\n" .
            'Reply-To: **REPLYEMAIL@MAILBOX.COM**' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();


        mail($toj, $subj, $bodj, $headersj);
           
    }
 
}
 
add_hook("InvoicePaid",1,"ipaid_notif");
 
?>