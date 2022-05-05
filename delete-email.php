<html>
    <head>
    <meta charset="UTF-8">
    <title> удаление записи </title>
    </head>
<body>


<?php       /* задача сценария Обработать данные формы, и удалить их из листа рассылки  */                                                
    $host = '127.0.0.1';    
    $user = 'root';         
    $password = '';         
    $db_name = 'my_php';    
    
    /*  в этот файл.php был направлен массив методом POST  */
    $email = $_POST['email'];         
    
    $dbConnect = mysqli_connect($host, $user, $password, $db_name)
        or die ('Ошибка соединения с Сервером')     //  die() - прерывает ход выполнения сценария
    ;
    
    $query = "DELETE FROM `email_list`      /* запрос обязательно в двойных кавычках  */
        WHERE email = $email"
    ;

    $result = mysqli_query($dbConnect, $query)         
        or die ('Ошибка при выполнении запроса к БД')  
    ;                                                  

    echo  "<a href='index.html'> Вернуться на страницу ввода </a>" . '<br/>';
    
    // выводим данные из таблицы:
    $query_view = "SELECT * FROM email_list";
    $result_view = mysqli_query($dbConnect, $query_view);  
    
    while($rowww = mysqli_fetch_array($result_view)) {
        echo $rowww['email'] . '<br/>' . '<br/>';   // выведет все ячейки ПОЛЯ
    };

    mysqli_close($dbConnect);
?>

</body>
</html>