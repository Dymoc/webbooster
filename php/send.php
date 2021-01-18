<?php

$productName = $_POST['product-name'];
$name = trim(urldecode(htmlspecialchars($_POST['name'])));
$telefon = trim(urldecode(htmlspecialchars($_POST['telefon'])));
$email = trim(urldecode(htmlspecialchars($_POST['email'])));

if (mail("exampl@mail.ru", "Заказ", "Товар:" . $productName . "ФИО:" . $name . "E-mail: " . $email . "Телефон:" . $telefon . "Продукт:" . $productName, "From: exampl2@mail.ru \r\n")) {
     echo "сообщение успешно отправлено";
} else {
     echo "при отправке сообщения возникли ошибки";
};
