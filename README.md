# thenet
Hometask for Highload Otus course

Put index.php, .htaccess, /classes/DB.php into a folder inside web root in a  Apache2, PHP8.1 and MySQL environment.

The directory should be made overridden in httpd.conf in order for .htaccess to have impact

fill-up your own db host, db user, db pass into classes/DB.php

use /login, /user/get/:id and /user/register to communicate with index.php

Используйте окружение Linux, Apache2, PHP8.1, MySQL.
Положите файлы проекта в папку внутри веб-рута, настройте для этой папки в основном конфиге Apache2 директиву Allow Override All
Создайте базу данных из sql дампа на вашем MySQL сервере. Впишите хост, пользователя, пароль и имя БД в файле classes/DB.php
Используйте api из коллекции для выдачи токена (POST /login), регистрации пользователя (POST /user/register) и получения анкеты (GET /user/get/:id)
согласно коллекции Postman.

