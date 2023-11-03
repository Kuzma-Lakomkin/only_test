<div class="account">
    <h3>Авторизация</h3>
    <form action="/only/account/login" method="post">
        <p>Пользователь</p>
        <p><input type="text" name="name" placeholder="Введите номер телефона или email" required></p>
        <p>Пароль</p>
        <p><input type="password" name="password" placeholder="Введите пароль" required></p>
        <button type="submit">Войти</button>
        <p>Нет логина?-<a href="../account/register">Зарегистрируйся!</a></p>
        <div id="captcha-container" class="smart-captcha" data-sitekey="<ключ клиента>">
            <input type="hidden" name="smart-token" value="">
        </div>
    </form>
</div>
<script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>


