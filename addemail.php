<html>
    <head>
    <meta charset="UTF-8">
    <title> Внесение в лист </title>
    </head>

<body>

<h3>Запись данных в Базу данных</h3>

<?php       /* задача сценария Обработать данные формы, и добавить их в лист рассылки (сохранить в БД), и вывести данные из таблицы */                                                
    
    $host = '127.0.0.1';    
    $user = 'root';         
    $password = '';         
    $db_name = 'my_php';    
    
    /*  в этот файл.php был направлен массив методом POST  */
    $first_name = $_POST['firstname'];                                                    
    $last_name = $_POST['lastname'];            
    $email = $_POST['email'];         
    
    echo 'Ваше имя: '. $first_name .'<br/>';   
    echo 'Ваша фамилия: '. $last_name .'<br/>';                       
    echo 'Ваш email: '. $email . '<br/>';


    $dbConnect = mysqli_connect($host, $user, $password, $db_name)
        or die ('Ошибка соединения с Сервером')     //  die() - прерывает ход выполнения сценария
    ;
    

    $query = "INSERT INTO `email_list` (     /* запрос обязательно в двойных кавычках  */
        `first_name`,`last_name`,`email`)
        VALUES ('$first_name','$last_name','$email')"
    ;


    $result = mysqli_query($dbConnect, $query)         
        or die ('Ошибка при выполнении запроса к БД')  
    ;                                                  

    echo  "<a href='index.html'> Вернуться на страницу ввода </a>" . '<br/>';
    
    // выводим данные из таблицы:
    $query_view = "SELECT * FROM email_list";
    $result_view = mysqli_query($dbConnect, $query_view);  
    // можно по очереди (по-строчно) извлекать полученные данные из массива данных 
    //$row = mysqli_fetch_array($result);    // при первом вызове функции, из $result извлекается 1 запись таблицы
    //echo $row['email'] . '<br/>';          // выводим значение ячейки массива(строки) с ключем "email"
    // далее следует второй вызов для втрой записи
    //$row2 = mysqli_fetch_array($result);   
    //echo $row2['email'] . '<br/>'. '<br/>';


    // а можно извлечь ВСЕ записи одним вызовом ЦИКЛА
    // ФУНКЦИЯ в (условии) цикла проходит через данные таблицы ЗАПИСЬ за ЗАПИСЬЮ
    // пока в (условии) цикла ФУНКЦИЯ mysqli_fetch_array "вызывается" для каждой записи > условие будет=true
    // после обработки последней записи функцией > функция прекращает работу > (условие==false) > ЦИКЛ прекращает работу
    while($rowww = mysqli_fetch_array($result_view)) {
        echo $rowww['email'] . '<br/>' . '<br/>';   // выведет все ячейки ПОЛЯ
    };


    // можно вывести код ошибки
    /* $query2 = 'SELECT * FROM `сообщения`';
    $result2 = mysqli_query($dbConnect, $query2);

            if(!$result2){ 
              echo 'Ошибка запроса: ' . mysqli_error($dbConnect) . '<br>';
              echo 'Код ошибки: ' . mysqli_errno($dbConnect);
             } else { 
                echo 'запрос успешен' . '<br>';    
                while($row = $result2->fetch_assoc()){
                    echo $row['youname'];   // далее обрабатываем полученные данные
                }
            } */

    mysqli_close($dbConnect);

?>

</body>
</html>
