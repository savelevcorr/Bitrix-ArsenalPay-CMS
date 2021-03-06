# Bitrix-ArsenalPay2-CMS
Bitrix ArsenalPay2 CMS is software development kit for fast simple and seamless integration of your Bitrix web site with processing server of ArsenalPay.

*Arsenal Media LLC*

[Arsenal Pay processing center](https://arsenalpay.ru/)

Basic feature list:

 * Allows seamlessly integrate unified payment frame into your site the second time.
 * New payment method ArsenalPay will appear to pay for your products and services.
 * Allows to pay using mobile commerce and bank aquiring. More methods are about to become available. Please check for updates.

### О МОДУЛЕ
Дополнительный модуль платежной системы "ArsenalPay" под BITRIX позволяет легко встроить платежную страницу на Ваш сайт.
Устанавливается только в случае подключения еще одного вида оплаты.
После установки модуля у Вас появится новый вариант оплаты товаров и услуг через платежную систему "ArsenalPay".
Платежная система "ArsenalPay" позволяет совершать оплату с различных источников списания средств:
мобильных номеров (МТС/Мегафон/Билайн/TELE2), пластиковых карт (VISA/MasterCard/Maestro).
Перечень доступных источников средств постоянно пополняется. Следите за обновлениями.

За более подробной информацией о платежной системе ArsenalPay зайдите на [arsenalpay.ru](https://arsenalpay.ru).

#### Установка:
1. Скопируйте папку arsenalpay.second в каталог "…\www\bitrix\modules" (в случае использования Windows версии каталог будет иметь примерно такой путь "C:\Program Files\Bitrix Environment\www\bitrix\modules");
2. Зайдите в администрирование BITRIX;
3. Выберите закладку "Marketplace" в левом меню;
4. Выберите пункт "Установленные решения";
3. Найдите в списке "Модуль 2 платежной системы arsenalpay.ru" и нажмите "Установить".
7. После установки выберите в левом меню вкладку "Магазин";
8. Разверните пункт "Настройки";
9. Выберите пункт "Платежные системы";
10. Нажмите кнопку "Добавить платежную систему";
11. На вкладке "Типы плательщиков" выберите обработчик "Платежная система Arenal Pay" и заполните свойство обработчика "Телефон", по стандарту Тип - Свойство заказа, Значение - Телефон;

### НАСТРОЙКА
1. Зайдите в администрирование BITRIX;
2. Выберите закладку "Настройки" в левом меню;
3. Выберите пункт "Настройки продукта";
4. Разверните пункт "Настройки модулей";
5. Выберите пункт "Модуль 2 платежной системы arsenalpay.ru";
6. Заполните необходимые настройки и нажмите сохранить;

### УДАЛЕНИЕ
1. Зайдите в администрирование BITRIX;
2. Выберите закладку "Настройки" в левом меню;
3. Выберите пункт "Настройки продукта";
4. Выберите раздел "Модули";
5. Найдите в списке "Модуль платежной системы arsenalpay.ru" и нажмите "Удалить";

### ИСПОЛЬЗОВАНИЕ
После успешной установки и настройки модуля на сайте появится возможность выбора платежной системы "ArsenalPay".
Для оплаты заказа с помощью платежной системы "ArsenalPay" нужно:

1. Выбрать из каталога товар, который нужно купить;
2. Перейти на страницу оформления заказа (покупки);
3. В разделе "Платежные системы" выбрать платежную систему "ArsenalPay";
4. Перейти на страницу подтверждения введенных данных и ввода источника списания средств (мобильный номер, пластиковая карта и т.д.);
5. После ввода данных об источнике платежа в зависимости от его типа, Вам либо придет СМС о подтверждении платежа, либо Вы будуете перенаправлены на страницу с результатом платежа;
6. Результат оплаты заказа поступит на адрес "Url колбэка" для фиксирования его в системе предприятия (обновление статуса заказа). Колбэк доступен по адресу "http://адрес_вашего_сайта/callback/index.php", исходный код колбэка в "/bitrix/modules/arsenalpay.second/install/components/arsenalpay/callback/component.php" (после внесения изменений в колбэк нужно переустановить модуль);
7. При необходимости осуществления проверки номера получателя перед совершением платежа, Вы должны заполнить поле "Url проверки номера получателя", на который от "ArsenalPay" поступит запрос на проверку.
