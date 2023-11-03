<div class="account">
<h3>Регистрация</h3>
<form action="/only/account/register" method="post">
    <p>Имя<p>
        <p><input type="text" name="name" placeholder="Введите имя"></p>
    <p>Контактный номер телефона<p>
        <p><input type="tel" name="phone_number" pattern="^\+[0-9]{10,15}$" placeholder="Должен начинаться с символа '+'"></p>
    <p>Почта<p>
        <p><input type="email" name="email" placeholder="Введите почту"></p>
    <p>Логин<p>
        <p><input type="text" name="login" placeholder="Введите логин"></p>
    <p>Пароль<p>
        <p><input type="password" name="password" placeholder="Введите пароль"></p>
    <p>Подтверждение пароля<p>
        <p><input type="password" name="check_password" placeholder="Введите пароль еще раз"></p>
    <button type="submit">Зарегистрироваться</button>
    <p>У вас есть учетная запись?-<a href="../account/login">Авторизуйтесь!</a><p>
</form>
</div>

