<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, target-densitydpi=fevice-dpi, initial-scale=1.0">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <title>Заказные торты</title>
</head>
<body>

<div><a href="/logout"><button class="btn">выйти</button></a></div>

<h3>Форма</h3>

<h3>список заказов</h3>
<table>
<?php
    foreach ($list_orders as $order) {
        echo '<tr>';
        echo '<td>', $order['id'], '</td>'; 
        echo '<td>', $order['prefix'], '</td>'; 
        echo '<td>', $order['customer'], '</td>'; 
        echo '<td>', $order['date_to'], '</td>'; 
        $userData = unserialize(base64_decode($order['session']));
        echo '<td>', $userData[0]['weight'], '</td>'; 
        echo '<td>', $userData[0]['product']['title'], '</td>'; 
        echo '<td>', $userData[0]['product']['id'], '</td>'; 
        echo '</tr>';
    }
?>
</table>
</body>
</html>
