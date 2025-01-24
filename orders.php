<?php
session_start();
if(isset($_GET['do']) && $_GET['do'] === 'logout'){
    require_once 'api/auth/LogoutUser.php';
    require_once 'api/db.php';

    LogoutUser('login.php',$db,$_SESSION['token']);
}

require_once 'api/auth/AuthCheck.php';
AuthCheck('', 'login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM | Товары</title>
    <link rel="stylesheet" href="styles/modules/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="styles/pages/producs.css">
    <link rel="stylesheet" href="styles/modules/micromodal.css">
</head>
<body>
    <header class="header">
        <div class="container">
        <p class="header__admin">
            <?php
              require'api/db.php';
              require_once'api/clients/AdminName.php';

              echo AdminName($_SESSION['token'],$db);
            ?>
            </p>
            <ul class="header__links">
                <li><a href="">Клиент</a></li>
                <li><a href="">Товары</a></li>
                <li><a href="">Заказы</a></li>
            </ul>
            <a class="header__logout" href="?do=logout">Выйти</a>
        </div>
    </header>
    <main>
        <section class="filters">
            <div class="container">
                <form action="">
                    <label for="search">Поиск по названию</label>
                    <input type="text" id="search" name="search" placeholder="Введите название">
                    <label for="sort-by">Сортировать по:</label>
                    <select name="sort-by" id="sort-by">
                        <option value="name">Клиент</option>
                        <option value="id">ID</option>
                        <option value="quantity">Дата</option>
                        <option value="summa">Сумма</option>
                    </select>
                    <label for="order">Порядок сортировки:</label>
                    <select name="order" id="order">
                        <option value="asc">По возрастанию</option>
                        <option value="desc">По убыванию</option>
                    </select>
                    <button type="submit">Применить</button>
                </form>
            </div>
        </section>
        <section class="clients">
            <h2 class="clients__title">Список товаров</h2>
            <button onclick="MicroModal.show('add-modal')" class="clients__add">
                <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
            </button>
            <div class="container">
                <table>
                    <thead>
                        <tr>
                            <th>ИД</th>
                            <th>ФИО</th>
                            <th>Дата заказа</th>
                            <th>Цена</th>
                            <th>Элементы заказа</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                            <th>Генерация чека</th>
                            <th>Подробнее</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Петр Васильевич</td>
                            <td>10.01.2025</td>
                            <td>1000</td>
                            <td>Мыло: 1шт,500р
                                Мыльница: 1шт,500р
                            </td>
                            
                            <td><i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="MicroModal.show('cheklist-modal')" class="fa fa-list-alt" aria-hidden="true"></i></td>
                            <td><i onclick="MicroModal.show('details-modal')" class="fa fa-info-circle" aria-hidden="true"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Модальное окно добавления товара -->
    <div class="modal micromodal-slide" id="add-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">Добавить товар</h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="add-product-form">
                        <div class="form-group">
                            <label for="name">ФИО</label>
                            <input type="text" id="name" name="name" required placeholder="Введите название">
                        </div>
                        <div class="form-group">
                            <label for="description">Дата</label>
                            <textarea id="description" name="description" required placeholder="Введите описание"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена:</label>
                            <input type="number" id="price" name="price" required placeholder="Введите цену">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Элементы заказа</label>
                            <input type="number" id="quantity" name="quantity" required placeholder="Введите количество">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                            <button type="button" class="btn btn-secondary" data-micromodal-close>Отменить</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <!-- Модальное окно редактирования товара -->
    <div class="modal micromodal-slide" id="edit-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">Редактировать товар</h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="edit-product-form">
                        <div class="form-group">
                            <label for="edit-name">ФИО</label>
                            <input type="text" id="edit-name" name="name" required placeholder="Введите название">
                        </div>
                        <div class="form-group">
                            <label for="edit-description">Дата</label>
                            <textarea id="edit-description" name="description" required placeholder="Введите описание"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-price">Цена:</label>
                            <input type="number" id="edit-price" name="price" required placeholder="Введите цену">
                        </div>
                        <div class="form-group">
                            <label for="edit-quantity">Элементы заказа</label>
                            <input type="number" id="edit-quantity" name="quantity" required placeholder="Введите количество">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <button type="button" class="btn btn-secondary" data-micromodal-close>Отменить</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <!-- Модальное окно подтверждения удаления -->
    <div class="modal micromodal-slide" id="delete-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">Удалить товар</h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <p>Вы уверены, что хотите удалить этот товар?</p>
                    <div class="form-actions">
                        <button type="button" class="btn btn-primary" onclick="deleteProduct()">Удалить</button>
                        <button type="button" class="btn btn-secondary" data-micromodal-close>Отменить</button>
                    </div>
                </main>
            </div>
        </div>
    </div>
     <!-- Модальное окно Подробнее -->
     <div class="modal micromodal-slide" id="details-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">Подробнее о заказе</h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="edit-product-form">
                        <div class="form-group">
                            <label for="edit-description">Дата:10.01.2025</label>
                        </div>
                        <div class="form-group">
                            <label for="edit-price">Цена:1000</label>
                        </div>
                        <div class="form-group">
                            <label for="edit-quantity">Элементы заказа:Мыло красивое,быстро пенится,рельефное.Мыльница красная,имее противоскользящие резинки.</label>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" data-micromodal-close>Закрыть</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
    <!-- Модальное окно Чек -->
    <div class="modal micromodal-slide" id="cheklist-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">Чек</h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="edit-product-form">
                        <div class="form-group">
                            <label for="edit-description">Дата:10.01.2025</label>
                        </div>
                        <div class="form-group">
                            <label for="edit-price">Цена:1000</label>
                        </div>
                        <div class="form-group">
                            <label for="edit-quantity">Покупки:мыло,мыльница</label>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" data-micromodal-close>Закрыть</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <script defer src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script defer src="scripts/initClientsModal.js"></script>
</body>
</html>ы