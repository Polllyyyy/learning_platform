<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'diplom'); // 
if (!$connection) { // Можно и $connection == false, но не = 
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
?>
