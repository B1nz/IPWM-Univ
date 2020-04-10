<?php
$type = "BillingStatement";
echo $type == "BillingStatement";
$echo = ($type === "BillingStatement") ? "Billing" : $type == "AccountStatemnt" ? " Installments" : "Unknown";
echo $echo;
?>

