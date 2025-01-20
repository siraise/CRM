<?php
session_start();
require_once 'modules/AuthCheck.php';
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
            <p class="header__admin">Фамилия И.О.</p>
            <ul class="header__links">
                <li><a href="">Клиент</a></li>
                <li><a href="">Товары</a></li>
                <li><a href="">Заказы</a></li>
            </ul>
            <a class="header__logout" href="">Выйти</a>
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
                        <option value="name">Название</option>
                        <option value="price">Цена</option>
                        <option value="quantity">Количество</option>
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
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                            <th>QR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
                    </tbody>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Товар 1</td>
                            <td>Описание товара 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>
                                <i onclick="MicroModal.show('edit-modal')" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </td>
                            <td><i onclick="MicroModal.show('delete-modal')" class="fa fa-trash" aria-hidden="true"></i></td>
                            <td><i onclick="generateQR(1)" class="fa fa-qrcode" aria-hidden="true"></i></td>
                        </tr>
                        <!-- Добавьте больше строк по аналогии -->
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
                            <label for="name">Название:</label>
                            <input type="text" id="name" name="name" required placeholder="Введите название">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание:</label>
                            <textarea id="description" name="description" required placeholder="Введите описание"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена:</label>
                            <input type="number" id="price" name="price" required placeholder="Введите цену">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Количество:</label>
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
                            <label for="edit-name">Название:</label>
                            <input type="text" id="edit-name" name="name" required placeholder="Введите название">
                        </div>
                        <div class="form-group">
                            <label for="edit-description">Описание:</label>
                            <textarea id="edit-description" name="description" required placeholder="Введите описание"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-price">Цена:</label>
                            <input type="number" id="edit-price" name="price" required placeholder="Введите цену">
                        </div>
                        <div class="form-group">
                            <label for="edit-quantity">Количество:</label>
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

    <script defer src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script defer src="scripts/initClientsModal.js"></script>
</body>
</html>ы