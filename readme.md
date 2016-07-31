# WHMCS Invoice Payment Notification

A whmcs hook to send admin an email when an invoice is paid.
Craeted By HETNiX SRL, And some optimizations added by Arashdn.

This code is free and open source. Feel free to customize it as you need/like

##How to install
Change this values in ipaid.php file


    **YOUREMAIL@MAILBOX.COM** – Replace with your email address where you want to receive the notification
    **FROMEMAIL@MAILBOX.COM** – Replace with your email address from where you want to receive the notification
    **REPLYEMAIL@MAILBOX.COM** – Optional. Replace with an email address where you can reply to the notification
    CURRENCY_CODE – Replace with your main currency defined in WHMCS. Example: USD, EUR, RON, GBP … etc.

Then upload ipaid.php to includes/hooks directory in your WHMCS root.
 
