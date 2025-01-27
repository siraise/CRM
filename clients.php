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
    <title>CRM | Клиенты</title>
    <link rel="stylesheet" href="styles/modules/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="styles/pages/clients.css">
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
                <li><a href="./producs.php">Товары</a></li>
                <li><a href="./orders.php">Заказы</a></li>
            </ul>
            <a  class="header__logout" href="?do=logout">Выйти</a>
        </div>
    </header>
    <main>
        <section class="filters">
            <div class="container">
                <form action="" method ="GET">
                    <label for="search">Поск по имени</label>
                    <input type="text" id="search" name="search" placeholder="Даниря">
                    <select name="sort" id="sort">
                    <option value="">Поумолчанию</option>
                    <option value="ASC">По возрастанию</option>
                    <option value="DESC">По убыванию</option>
                    </select>
                    <button type="submit">Поиск</button>
                   <button type = "submit" style = "margin-top:20px;"><a href="?" style = "color:white;">Сбросить</a></button> 
                </form>
            </div>
        </section>
        <section class="clients">
            <h2 class="clients__title">Список клиентов</h2>
            <button onclick="MicroModal.show('add-modal')" class="clients__add">
                <i class="fa fa-user-plus fa-3x" aria-hidden="true"></i>
            </button>
            <div class="container">
                <table>
                <thead>
                    <th>ИД</th>
                    <th>ФИО</th>
                    <th>Почта</th>
                    <th>Телефон</th>
                    <th>День рождения</th>
                    <th>Дата создания</th>
                    <th>История заказов</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </thead>
                <tbody>
                    <?php
                    require'api/db.php';
                    require_once('api/clients/OutputClients.php');
                    require_once('api/clients/ClientsSearch.php');
                     $clients = ClientsSearch($_GET,$db);
                    OutputClients($clients);
                    ?>
                </tbody>
            </table>
            </div>
        </section>
    </main>
    <!-- [1] -->
    <div class="modal micromodal-slide" id="add-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Добавить клиента
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <!-- Форма добавления клиента -->
                    <form action ="api/clients/AddClients.php" method="POST" id="add-client-form">
                        <div class="form-group">
                            <label for="full-name">ФИО:</label>
                            <input type="text" id="full-name" name="full-name"  placeholder="Введите ФИО">
                        </div>
                        <div class="form-group">
                            <label for="email">Почта:</label>
                            <input type="email" id="email" name="email" placeholder="Введите почту">
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон:</label>
                            <input type="tel" id="phone" name="phone"  placeholder="Введите телефон">
                        </div>
                        <div class="form-group">
                            <label for="birthday">День рождения:</label>
                            <input type="date" id="birthday" name="birthday">
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
    <!-- Удаление клиента -->
    <div class="modal micromodal-slide" id="delete-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Удалить клиента
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                            <button type="submit" class="btn btn-primary">Удалить</button>
                            <button type="button" class="btn btn-secondary" data-micromodal-close>Отменить</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
    <!-- Редактировать -->
    <div class="modal micromodal-slide" id="edit-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Редактировать клиента
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <!-- Форма добавления клиента -->
                    <form id="add-client-form">
                        <div class="form-group">
                            <label for="full-name">ФИО:</label>
                            <input type="text" id="full-name" name="full-name"  placeholder="Введите ФИО">
                        </div>
                        <div class="form-group">
                            <label for="email">Почта:</label>
                            <input type="email" id="email" name="email"  placeholder="Введите почту">
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон:</label>
                            <input type="tel" id="phone" name="phone"  placeholder="Введите телефон">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Редактировать</button>
                            <button type="button" class="btn btn-secondary" data-micromodal-close>Отменить</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
    <!-- error -->
    <div class="modal micromodal-slide open" id="error-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        ОШИБКА
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                  <p>ТЕКСТ ОШИБКИ</p>
                </main>
            </div>
        </div>
    </div>
     <!--  -->
    <!-- histori -->
    <div class="modal micromodal-slide" id="histori-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        История заказов
                    </h2>
                    <small>Айтуганов Данияр Аманович</small>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                   <div class="order">
                    <div class="order_info">
                        <h3 class="order_number">
                           <b>Заказ №1</b> 
                        </h3>
                        <time datetime="order_date">
                            Дата оформления: 10.01.2025
                        </time>
                        <p class="order_total">Общая сумма:10000р</p>
                    </div>
                    <table class="order_items">
                        <tr>
                           <th>ИД</th>
                           <th>Название товара</th>
                           <th>Количество</th>
                           <th>Цена</th>
                       </tr>
                        <tr>
                            <td>1</td>
                            <td>Футболка</td>
                            <td>10</td>
                            <td>1000</td>
                       </tr>
                        <tr>
                            <td>1</td>
                            <td>Футболка</td>
                            <td>10</td>
                            <td>1000</td>
                       </tr>
                       <tr>
                        <td>1</td>
                        <td>Футболка</td>
                        <td>10</td>
                        <td>1000</td>
                   </tr>
                   <tr>
                    <td>1</td>
                    <td>Футболка</td>
                    <td>10</td>
                    <td>1000</td>
               </tr>
               <tr>
                <td>1</td>
                <td>Футболка</td>
                <td>10</td>
                <td>1000</td>
           </tr>
                    </table>
                   </div>
                </main>
            </div>
        </div>
    </div>
    <script defer src="https://unpkg.com/micromodal/dist/micromodal.min.js">
    </script>
    <script defer src="scripts/initClientsModal.js"></script>
</body>
</html>