<html>
    <head>
    <meta charset="UTF-8">
    <title> Внесение в лист </title>
    </head>

<body>

<h3>Данные внесены в базу данных:</h3>

<?php       /* задача сценария Обработать данные формы, и добавить их в лист рассылки (сохранить в БД), и вывести данные из таблицы */                                                
    
    $host = '127.0.0.1';    // адрес сервера БД
    $user = 'root';         // пользователь БД
    $password = '';         // пароль
    $db_name = 'my_php';    // имя БД
    
    /*  в этот файл.php был направлен массив методом POST  */
    $first_name = $_POST['firstname'];                          /*  достаём из массива $_POST данные, и определяем Их Переменной */                            
    $last_name = $_POST['lastname'];            /*  значение сохраняется в переменную */
    $email = $_POST['email'];         // изолируем данные из формы, для дальнейшей работы с ними
    
    echo 'Ваше имя: '. $first_name .'<br/>';   /*  вызов 'строки' и переменной с данными */
    echo 'Ваша фамилия: '. $last_name .'<br/>';                       
    echo 'Ваш email: '. $email . '<br/>';


    $dbConnect = mysqli_connect($host, $user, $password, $db_name)
        or die ('Ошибка соединения с Сервером')
    ;
    

    $query = "INSERT INTO `email_list` (     /* запрос обязательно в двойных кавычках  */
        `first_name`,`last_name`,`email`)
        VALUES ('$first_name','$last_name','$email')"
    ;


    $result = mysqli_query($dbConnect, $query)         //  mysqli_query - принимает 2 аругумента:
        or die ('Ошибка при выполнении запроса к БД')  //  первый:-> ссылка на соединение
    ;                                                  //  второй:-> запрос sql

    echo  "<a href='index.html'> Вернуться на страницу ввода </a>" . '<br/>';
    
    // выводим данные из таблицы:
    $query_view = "SELECT * FROM email_list";
    $result_view = mysqli_query($dbConnect, $query_view);  
    // можно по очереди (по-строчно) извлекать данные из переменной 
    //$row = mysqli_fetch_array($result);   // при первом вызове функции, из $result извлекается 1 запись таблицы
    //echo $row['email'] . '<br/>';          // выводим значение ячейки массива(строки) с ключем "email"

    //$row2 = mysqli_fetch_array($result);   // при втором вызове функции, из $result извлекается 2 запись таблицы
    //echo $row2['email'] . '<br/>'. '<br/>';


    // а можно извлечь ВСЕ записи одним вызовом ЦИКЛА
    // ФУНКЦИЯ в (условии) цикла проходит через данные таблицы ЗАПИСЬ за ЗАПИСЬЮ
    // пока в (условии) цикла ФУНКЦИЯ вызывается > условие будет=true
    // после обработки последней записи функцией > функция прекращает работу > (условие==false) > ЦИКЛ прекращает работу
    while($rowww = mysqli_fetch_array($result_view)) {
        echo $rowww['email'] . '<br/>' . '<br/>';   // выведет все ячейки ПОЛЯ
    };
/* 
    $query2 = 'SELECT * FROM `сообщения`';
    $result2 = mysqli_query($dbConnect, $query2);

            if(!$result2){ 
              echo 'Ошибка запроса: ' . mysqli_error($dbConnect) . '<br>';
              echo 'Код ошибки: ' . mysqli_errno($dbConnect);
             } else { 
                echo 'запрос успешен' . '<br>';    // выполнился
                while($row = $result2->fetch_assoc()){
                    echo $row['youname'];   // далее обрабатываем полученные данные
                }
            }
 */
    mysqli_close($dbConnect);

?>

</body>
</html>
