<meta charset="UTF-8">   /*  <-  НЕ УДАЛЯТЬ !!! чтобы БД поняла какая кодировка */

/* CREATE DATABASE `my_php` COLLATE utf8mb4_general_ci; */     /* база для кириллицы */

/* DROP DATABASE `моя`; */


SHOW VARIABLES;


CREATE TABLE `email_list` (
    `first_name` VARCHAR(20) CHARACTER SET utf8mb4 ,
    `last_name` VARCHAR(20) CHARACTER SET utf8mb4 ,
    `email` VARCHAR(30) CHARACTER SET utf8mb4
) default charset utf8mb4;      /* рабочая */


/* CREATE TABLE `сообщения` (
    `youname` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    `whеnithарреnd` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    `email` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
)  default charset utf8mb4; */   /* точно рабочая */


INSERT INTO `сообщения` (
        `youname`,`whеnithарреnd`,`email`
    ) VALUES ('даша','сего','zzz@ccc.com'
);



SELECT * FROM `сообщения`;      /* показать всю таблицу */
SELECT * FROM `email_list`;


ALTER TABLE `сообщения` 
    DROP COLUMN `email`;


SHOW VARIABLES LIKE 'char%';        /*  посмотреть КОДИРОВКУ */
SHOW VARIABLES LIKE 'collation%';     /*  посмотреть КОДИРОВКУ */

/* SHOW COLLATION;
 */


/* init_connect=‘SET collation_connection = utf8_unicode_ci’; */