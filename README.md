## MVC приложение

MVC приложение с авторизацией, регистрацией и личным кабинетом. 
Формы регистрации и авторизации проходят валидацию, так же к форме авторизации добавлена Yandex SmartCaptcha. 
В личном кабинете доступна форма редактирвоания личных данных с обновлением в БД.
В приложении реализован контроль доступов.


## Требования

1. PHP 8.2
2. Apache
3. MySQL

## Настройка БД

В src/config/db.php впишите данные для подключения к БД.

## Настройка Yandex SmartCaptcha

# В src/captcha/Сaptcha.php

+ В поле define('SMARTCAPTCHA_SERVER_KEY', '<ключ сервера>'); - впишите ключ сервера.

# В src/views/account/login.php

+ В поле data-sitekey="<ключ клиента>" - впишите ключ клиента.

