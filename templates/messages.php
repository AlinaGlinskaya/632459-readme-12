<main class="page__main page__main--messages">
    <h1 class="visually-hidden">Личные сообщения</h1>
    <section class="messages tabs">
        <h2 class="visually-hidden">Сообщения</h2>
        <div class="messages__contacts">
            <ul class="messages__contacts-list tabs__list">
                <li class="messages__contacts-item">
                    <a class="messages__contacts-tab messages__contacts-tab--active tabs__item tabs__item--active" href="#">
                        <div class="messages__avatar-wrapper">
                            <img class="messages__avatar" src="img/userpic-larisa.jpg" alt="Аватар пользователя">
                        </div>
                        <div class="messages__info">
                  <span class="messages__contact-name">
                    Лариса Роговая
                  </span>
                            <div class="messages__preview">
                                <p class="messages__preview-text">
                                    Озеро Байкал – огромное
                                </p>
                                <time class="messages__preview-time" datetime="2019-05-01T14:40">
                                    14:40
                                </time>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="messages__contacts-item messages__contacts-item--new">
                    <a class="messages__contacts-tab tabs__item" href="#">
                        <div class="messages__avatar-wrapper">
                            <img class="messages__avatar" src="img/userpic-petro.jpg" alt="Аватар пользователя">
                            <i class="messages__indicator">2</i>
                        </div>
                        <div class="messages__info">
                  <span class="messages__contact-name">
                    Петр Демин
                  </span>
                            <div class="messages__preview">
                                <p class="messages__preview-text">
                                    Ок, бро! По рукам
                                </p>
                                <time class="messages__preview-time" datetime="2019-05-01T00:15">
                                    00:15
                                </time>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="messages__contacts-item">
                    <a class="messages__contacts-tab tabs__item" href="#">
                        <div class="messages__avatar-wrapper">
                            <img class="messages__avatar" src="img/userpic-mark.jpg" alt="Аватар пользователя">
                        </div>
                        <div class="messages__info">
                  <span class="messages__contact-name">
                    Марк Смолов
                  </span>
                            <div class="messages__preview">
                                <p class="messages__preview-text">
                                    Вы: Марк, ждем тебя
                                </p>
                                <time class="messages__preview-time" datetime="2019-01-02T14:40">
                                    2 янв
                                </time>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="messages__contacts-item">
                    <a class="messages__contacts-tab tabs__item" href="#">
                        <div class="messages__avatar-wrapper">
                            <img class="messages__avatar" src="img/userpic-tanya.jpg" alt="Аватар пользователя">
                        </div>
                        <div class="messages__info">
                  <span class="messages__contact-name">
                    Таня Фирсова
                  </span>
                            <div class="messages__preview">
                                <p class="messages__preview-text">
                                    Вы: Девушка не
                                </p>
                                <time class="messages__preview-time" datetime="2018-09-30T14:40">
                                    31 сент
                                </time>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="messages__chat">
            <div class="messages__chat-wrapper">
                <ul class="messages__list tabs__content tabs__content--active">
                    <?php foreach ($chat_messages as $message): ?>
                    <li class="messages__item <?= $message['sender_id'] === $_SESSION['user']['id']
                        ? 'messages__item--my' : '' ?>">
                        <div class="messages__info-wrapper">
                            <div class="messages__item-avatar">
                                <a class="messages__author-link" href="#">
                                    <img class="messages__avatar" src="<?= $message['avatar_path'] ?? 'img/userpic-tanya.jpg' ?>" alt="Аватар пользователя">
                                </a>
                            </div>
                            <div class="messages__item-info">
                                <a class="messages__author" href="#">
                                    <?= $message['login'] ?? '' ?>
                                </a>
                                <time class="messages__time" datetime="<?= set_date($message['date_add'])['datetime'] ?? '' ?>">
                                    <?= set_date($message['date_add'])['date_ago'] ?? '' ?>назад
                                </time>
                            </div>
                        </div>
                        <p class="messages__text">
                           <?= $message['text' ?? ''] ?>
                        </p>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <ul class="messages__list tabs__content">

                </ul>

                <ul class="messages__list tabs__content">

                </ul>

                <ul class="messages__list tabs__content">

                </ul>
            </div>
            <div class="comments">
                <form class="comments__form form" action="#" method="post">
                    <div class="comments__my-avatar">
                        <img class="comments__picture" src="<?= $_SESSION['user']['avatar_path'] ?? 'img/userpic-tanya.jpg' ?>" alt="Аватар пользователя">
                    </div>
                    <div class="form__input-section form__input-section--error">
                <textarea class="comments__textarea form__textarea form__input"
                          placeholder="Ваше сообщение"></textarea>
                        <label class="visually-hidden">Ваше сообщение</label>
                        <button class="form__error-button button" type="button">!</button>
                        <div class="form__error-text">
                            <h3 class="form__error-title">Ошибка валидации</h3>
                            <p class="form__error-desc">Это поле обязательно к заполнению</p>
                        </div>
                    </div>
                    <button class="comments__submit button button--green" type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </section>
</main>
