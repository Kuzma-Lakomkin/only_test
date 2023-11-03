<div class="container-wrapper">
    <div class="container">
        <h1>Личный кабинет</h1>
        <div class="user-info">
            <?php foreach ($data as $item):?>
            <div class="info-item">
                <strong>Логин:</strong>
                <span><?= $item['login']; ?></span>
            </div>
            <div class="info-item">
                <strong>Имя:</strong>
                <span><?= $item['name']; ?></span>
            </div>
            <div class="info-item">
                <strong>Телефон:</strong>
                <span><?= $item['phone_number']; ?></span>
            </div>
            <div class="info-item">
                <strong>Электронная почта:</strong>
                <span><?= $item['email']; ?></span>
            </div>
            <?php endforeach;?>
            <a href="/only/user/logout" class="logout">Выход</a>
        </div>
    </div>
    <div class="update-data">
        <h2>Редактировать</h2>
        <form action="/only/user/home" method="post">
            <label for="name">Имя:</label>
            <p><input type="text" name="name"></p>
        
            <label for="phone_number">Телефон:</label>
            <p><input type="tel" name="phone_number"></p>
        
            <label for="email">Электронная почта:</label>
            <p><input type="email" name="email"></p>

            <label for="password">Новый пароль:</label>
            <p><input type="password" name="password"></p>

            <button type="submit">Сохранить изменения</button>
        </form>
    </div>
</div>
