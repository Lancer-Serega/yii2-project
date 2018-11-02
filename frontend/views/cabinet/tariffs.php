<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 02.11.18
 * Time: 15:37
 */

use \yii\helpers\Url;

$this->title = Yii::t('menu', 'Tariffs');
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Tariff :: Start-->
<div class="tariff">
    <div class="container-fluid">
        <h2 class="tariff__heading">Выберите свой тариф</h2>
        <div class="tariff__grid">
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="tariff__item">
                        <h3 class="tariff__item-title">Start</h3>
                        <div class="tariff__item-price"><b>200$<sub>/month</sub></b></div>
                        <ul class="tariff__item-info">
                            <li>40 Gb трафика</li>
                            <li>До 500 потоков одновременно</li>
                            <li>До 1 IP адреса, далее с доплатой 50%</li>
                        </ul>
                        <div class="tariff__item-subsc">
                            <label class="ui-check">
                                <input class="ui-check__input" type="checkbox" checked><span class="ui-check__checkbox">
                          <svg class="icon-check">
                            <use xlink:href="<?= Url::to('/sprites/sprite.svg#icon-check', true); ?>"></use>
                          </svg></span>email-рассылка
                            </label>
                        </div>
                        <div class="tariff__item-control">
                            <button class="btn btn--blue-empty">Купить</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="tariff__item"><span class="tariff__item-discount">-30%</span>
                        <h3 class="tariff__item-title">Optimal</h3>
                        <div class="tariff__item-price">
                            <small>1500$<sub>/month</sub></small>
                            <mark>1000$<sub>/month</sub></mark>
                        </div>
                        <ul class="tariff__item-info">
                            <li>40 Gb трафика</li>
                            <li>2 активации кнопки “Пауза”</li>
                            <li>До 1 IP адреса, далее с доплатой 50%</li>
                        </ul>
                        <div class="tariff__item-subsc">
                            <label class="ui-check">
                                <input class="ui-check__input" type="checkbox" checked><span class="ui-check__checkbox">
                          <svg class="icon-check">
                            <use xlink:href="<?= Url::to('/sprites/sprite.svg#icon-check', true); ?>"></use>
                          </svg></span>email-рассылка
                            </label>
                        </div>
                        <div class="tariff__item-control">
                            <button class="btn btn--blue-empty">Купить</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="tariff__item">
                        <h3 class="tariff__item-title">Proffesional</h3>
                        <div class="tariff__item-price"><b>3000$<sub>/month</sub></b></div>
                        <ul class="tariff__item-info">
                            <li>40 Gb трафика</li>
                            <li>2 активации кнопки “Пауза”</li>
                            <li>До 1 IP адреса, далее с доплатой 50%</li>
                        </ul>
                        <div class="tariff__item-subsc">
                            <label class="ui-check">
                                <input class="ui-check__input" type="checkbox" checked><span class="ui-check__checkbox">
                          <svg class="icon-check">
                            <use xlink:href="<?= Url::to('/sprites/sprite.svg#icon-check', true); ?>"></use>
                          </svg></span>email-рассылка
                            </label>
                        </div>
                        <div class="tariff__item-control">
                            <button class="btn btn--blue-empty">Купить</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="tariff__item tariff__item--highlighted">
                        <h3 class="tariff__item-title">Бесплатная</h3>
                        <div class="tariff__item-price"><b>0$<sub>/month</sub></b></div>
                        <div class="tariff__item-code">
                            <label class="ui-label">Безлимитный трафик</label>
                            <input class="ui-input ui-input--38" type="text" placeholder="Введите секретный код"><a
                                class="ui-link ui-link--green" href="#"><span class="ui-link__dashed">Как получить секретный код?</span></a>
                        </div>
                        <div class="tariff__item-subsc">
                            <label class="ui-check">
                                <input class="ui-check__input" type="checkbox" checked><span class="ui-check__checkbox">
                          <svg class="icon-check">
                            <use xlink:href="<?= Url::to('/sprites/sprite.svg#icon-check', true); ?>"></use>
                          </svg></span>email-рассылка
                            </label>
                        </div>
                        <div class="tariff__item-control">
                            <button class="btn btn--green">Получить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tariff :: End-->
<!-- Adv :: Start-->
<div class="adv">
    <div class="container-fluid">
        <h2 class="adv__heading">Преимущества</h2>
        <div class="adv__grid">
            <div class="row">
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="adv__item">
                        <figure class="adv__item-icon">
                            <svg class="icon-adv-1">
                                <use xlink:href="/sprites/sprite.svg#icon-adv-1"></use>
                            </svg>
                        </figure>
                        <h3 class="adv__item-title"><a href="#">Обширная <br>ГЕО зона</a></h3>
                        <p class="adv__item-text">Наши сервера находятся в 130+ странах, что является более 50% от
                            общего количества всех стран в мире.</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="adv__item">
                        <figure class="adv__item-icon">
                            <svg class="icon-adv-2">
                                <use xlink:href="/sprites/sprite.svg#icon-adv-2"></use>
                            </svg>
                        </figure>
                        <h3 class="adv__item-title"><a href="#">100% совместимость <br>инструментов для SEO</a></h3>
                        <p class="adv__item-text">Мы регулярно следим за нашими серверами. Те сервера, которые банятся,
                            мы выносим из списка и заменяем их новыми.</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="adv__item">
                        <figure class="adv__item-icon">
                            <svg class="icon-adv-3">
                                <use xlink:href="/sprites/sprite.svg#icon-adv-3"></use>
                            </svg>
                        </figure>
                        <h3 class="adv__item-title"><a href="#">Параллельные <br>сессии</a></h3>
                        <p class="adv__item-text">Доступно использование неограниченное количество одновременных
                            потоков.</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="adv__item">
                        <figure class="adv__item-icon">
                            <svg class="icon-adv-4">
                                <use xlink:href="/sprites/sprite.svg#icon-adv-4"></use>
                            </svg>
                        </figure>
                        <h3 class="adv__item-title"><a href="#">Профессиональная <br>тех.поддержка</a></h3>
                        <p class="adv__item-text">Наши специалисты 24/7 готовы помочь вам в решении возникших вопросов,
                            касаемо нашего сервиса.</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="adv__item">
                        <figure class="adv__item-icon">
                            <svg class="icon-adv-5">
                                <use xlink:href="/sprites/sprite.svg#icon-adv-5"></use>
                            </svg>
                        </figure>
                        <h3 class="adv__item-title"><a href="#">Поддерживаем <br>все протоколы</a></h3>
                        <p class="adv__item-text">Прокси сервера поддерживают SOCKS4/4a, SOCKS5, HTTP, HTTPS
                            протоколы</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="adv__item">
                        <figure class="adv__item-icon">
                            <svg class="icon-adv-6">
                                <use xlink:href="/sprites/sprite.svg#icon-adv-6"></use>
                            </svg>
                        </figure>
                        <h3 class="adv__item-title"><a href="#">Удобная <br>админ панель</a></h3>
                        <p class="adv__item-text">Наша панель управления имеет достаточный функционал, удобный интерфейс
                            и постоянно совершенствуется</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="adv__item">
                        <figure class="adv__item-icon">
                            <svg class="icon-adv-7">
                                <use xlink:href="/sprites/sprite.svg#icon-adv-7"></use>
                            </svg>
                        </figure>
                        <h3 class="adv__item-title"><a href="#">Привязка <br>нескольких IP</a></h3>
                        <p class="adv__item-text">Мы реализовали возможность привязки нескольких IP адресов к одному
                            тарифу, однако каждая последующая привязка стоит 50% к тарифу</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="adv__item">
                        <figure class="adv__item-icon">
                            <svg class="icon-adv-8">
                                <use xlink:href="/sprites/sprite.svg#icon-adv-8"></use>
                            </svg>
                        </figure>
                        <h3 class="adv__item-title"><a href="#">Возможность <br>email-рассылки</a></h3>
                        <p class="adv__item-text">Мы не блокируем порт 25, более того у нас есть статьи на те программы,
                            которые используются для email-рассылок.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Adv :: End-->
<!-- Contacts :: Start-->
<div class="contacts">
    <div class="container-fluid">
        <h2 class="contacts__heading">Есть вопросы? Задайте их нам</h2>
        <div class="contacts__container">
            <div class="row">
                <div class="col-md-6 push-md-6">
                    <div class="contacts__info">
                        <p class="contacts__caption">Вы также можете посмотреть раздел <a href="#">FAQ</a>,<br> возможно
                            там есть ответ на интересующий вас вопрос.</p>
                        <div class="contacts__writeus">
                            <figure class="contacts__writeus-icon">
                                <svg class="icon-write">
                                    <use xlink:href="/sprites/sprite.svg#icon-write"></use>
                                </svg>
                            </figure>
                            <p class="contacts__writeus-text">Также мы есть в социальных сетях и мессенджерах.<br>Напишите
                                нам и мы ответим:</p>
                            <ul class="contacts__menu">
                                <li><a class="contacts__link" href="#"><span
                                            class="icon-skype"></span>testSkypeLogin</a></li>
                                <li><a class="contacts__link" href="#"><span
                                            class="icon-telegram"></span>testTgLogin</a></li>
                                <li><a class="contacts__link" href="#"><span class="icon-facebook"></span>ServiceProfile</a>
                                </li>
                                <li><a class="contacts__link" href="#"><span class="icon-whatsapp"></span>+7 987
                                        654-32-10</a></li>
                            </ul>
                        </div>
                        <p class="contacts__caption">Если вы сомневаетесь в качестве прокси-серверов, воспользуйтесь <a
                                href="#">пробной версией</a></p>
                    </div>
                </div>
                <div class="col-md-6 pull-md-6">
                    <div class="contacts__form">
                        <div class="ui-form">
                            <form class="js-validate" action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="ui-field">
                                            <input class="ui-input" type="text" name="name" placeholder="Ваше имя">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ui-field">
                                            <input class="ui-input" type="email" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="ui-field">
                                            <textarea class="ui-textarea" placeholder="Сообщение..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <p class="ui-confirm">Предоставляемые данные обрабатываются в целях администрирования
                                    вашего запроса и информирования вас о наших услугах. Пожалуйста, ознакомьтесь с
                                    нашей <a href="#">Политикой конфиденциальности</a></p>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="ui-capcha"><img src="../../web/images/img-capcha.png" alt=""></div>
                                    </div>
                                    <div class="col-lg-auto">
                                        <button class="btn btn--block btn--green">Отправить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contacts :: End-->
