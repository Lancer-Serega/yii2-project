<?php

use \yii\helpers\Url;

$this->title = 'Homepage - Proxy';
$theme = $this->theme;
?>

<!-- Hero :: Start-->
<div class="hero">
    <div class="hero__slides js-slick-hero">
        <div class="hero__item hero__item--01">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 push-md-6">
                        <figure class="hero__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-hero-01.svg'), true); ?>"
                                                              alt=""></figure>
                    </div>
                    <div class="col-md-6 pull-md-6">
                        <div class="hero__item-desc">
                            <h2 class="hero__item-title">Живые прокси-сервера <br>под любые цели</h2>
                            <p class="hero__item-text">Идеально подходят для SEO инструментов, парсинга поисковых
                                систем, email рассылок и не только</p><a class="btn btn--57 btn--green" href="#">Начать
                                сейчас</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__item hero__item--02">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 push-md-6">
                        <figure class="hero__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-hero-02.svg'), true); ?>"
                                                              alt=""></figure>
                    </div>
                    <div class="col-md-6 pull-md-6">
                        <div class="hero__item-desc">
                            <h2 class="hero__item-title">Работаем со всеми <br>популярными программами</h2>
                            <p class="hero__item-text">Специально для вас мы подготовили материалы, в которых
                                описываются настройки каждого приложения</p><a class="btn btn--57 btn--green" href="#">Читать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__item hero__item--03">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 push-md-6">
                        <figure class="hero__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-hero-03.svg'), true); ?>"
                                                              alt=""></figure>
                    </div>
                    <div class="col-md-6 pull-md-6">
                        <div class="hero__item-desc">
                            <h2 class="hero__item-title">Профессионально <br>занимаетесь email рассылками?</h2>
                            <div class="hero__item-inbox">
                                <p>С нами у вас будет лучшая доставка в inbox</p>
                                <div class="row">
                                    <div class="col-auto"><img src="<?= Url::to($this->theme->getUrl('/images/img-inbox-01.png'), true); ?>"
                                                               alt=""></div>
                                    <div class="col-auto"><img src="<?= Url::to($this->theme->getUrl('/images/img-inbox-02.png'), true); ?>"
                                                               alt=""></div>
                                    <div class="col-auto"><img src="<?= Url::to($this->theme->getUrl('/images/img-inbox-03.png'), true); ?>"
                                                               alt=""></div>
                                    <div class="col-auto"><img src="<?= Url::to($this->theme->getUrl('/images/img-inbox-04.png'), true); ?>"
                                                               alt=""></div>
                                </div>
                            </div>
                            <a class="btn btn--57 btn--green" href="#">Начать сейчас</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__item hero__item--04">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 push-md-6">
                        <figure class="hero__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-hero-04.svg'), true); ?>"
                                                              alt=""></figure>
                    </div>
                    <div class="col-md-6 pull-md-6">
                        <div class="hero__item-desc">
                            <h2 class="hero__item-title">Протестируйте наши <br>сервера бесплатно</h2>
                            <p class="hero__item-text">Мы предоставляем возможность проверить наши сервера, чтобы вы
                                могли убедиться в их качестве</p><a class="btn btn--57 btn--green" href="#">Начать
                                сейчас</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero :: End-->

<!-- Info :: Start-->
<div class="info">
    <div class="container-fluid">
        <div class="info__grid">
            <div class="row">
                <div class="col-sm-6 col-xl-auto">
                    <div class="info__item">
                        <figure class="info__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-info-01.png'), true); ?>"
                                                              alt=""></figure>
                        <b class="info__item-number">250 000+</b>
                        <p class="info__item-text">residential IPs</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-auto">
                    <div class="info__item">
                        <figure class="info__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-info-02.png'), true); ?>"
                                                              alt=""></figure>
                        <b class="info__item-number">121+</b>
                        <p class="info__item-text">стран</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-auto">
                    <div class="info__item">
                        <figure class="info__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-info-03.png'), true); ?>"
                                                              alt=""></figure>
                        <b class="info__item-number">27 183</b>
                        <p class="info__item-text">клиентов по всему миру</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-auto">
                    <div class="info__item">
                        <figure class="info__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-info-04.png'), true); ?>"
                                                              alt=""></figure>
                        <b class="info__item-number">15 мин.</b>
                        <p class="info__item-text">среднее время отклика <br>на вопрос в техподдержку</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Info :: End-->

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
                            <use xlink:href="<?= Url::to($this->theme->getUrl('/sprites/sprite.svg#icon-check'), true); ?>"></use>
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
                            <use xlink:href="<?= Url::to($this->theme->getUrl('/sprites/sprite.svg#icon-check'), true); ?>"></use>
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
                            <use xlink:href="<?= Url::to($this->theme->getUrl('/sprites/sprite.svg#icon-check'), true); ?>"></use>
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
                        <h3 class="tariff__item-title">Trial период</h3>
                        <div class="tariff__item-price"><b>бесплатно</b></div>
                        <div class="tariff__item-code">
                            <label class="ui-label">Безлимитный трафик</label>
                            <input class="ui-input ui-input--38" type="text" placeholder="Введите секретный код"><a
                                    class="ui-link ui-link--green" href="#"><span class="ui-link__dashed">Как получить секретный код?</span></a>
                        </div>
                        <div class="tariff__item-subsc">
                            <label class="ui-check">
                                <input class="ui-check__input" type="checkbox" checked><span class="ui-check__checkbox">
                          <svg class="icon-check">
                            <use xlink:href="<?= Url::to($this->theme->getUrl('/sprites/sprite.svg#icon-check'), true); ?>"></use>
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
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-adv-1'); ?>"></use>
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
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-adv-2'); ?>"></use>
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
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-adv-3'); ?>"></use>
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
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-adv-4'); ?>"></use>
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
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-adv-5'); ?>"></use>
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
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-adv-6'); ?>"></use>
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
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-adv-7'); ?>"></use>
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
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-adv-8'); ?>"></use>
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

<!-- For :: Start-->
<div class="for">
    <div class="container-fluid">
        <h2 class="for__heading">Наши прокси подходят для</h2>
        <div class="for__grid">
            <div class="row">
                <div class="col-6 col-md-4 col-xl-3"><a class="for__item" href="#">
                        <div class="for__item-in">
                            <figure class="for__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-for-01.png'), true); ?>"
                                                                 width="200" alt="Zennoposter"></figure>
                            <span class="btn btn--green">ПОДРОБНЕЕ</span>
                        </div>
                    </a></div>
                <div class="col-6 col-md-4 col-xl-3"><a class="for__item" href="#">
                        <div class="for__item-in">
                            <figure class="for__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-for-02.png'), true); ?>"
                                                                 width="181" alt="Brobot"></figure>
                            <span class="btn btn--green">ПОДРОБНЕЕ</span>
                        </div>
                    </a></div>
                <div class="col-6 col-md-4 col-xl-3"><a class="for__item" href="#">
                        <div class="for__item-in">
                            <figure class="for__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-for-03.png'), true); ?>"
                                                                 width="184" alt="Proxifier"></figure>
                            <span class="btn btn--green">ПОДРОБНЕЕ</span>
                        </div>
                    </a></div>
                <div class="col-6 col-md-4 col-xl-3"><a class="for__item" href="#">
                        <div class="for__item-in">
                            <figure class="for__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-for-04.png'), true); ?>"
                                                                 width="157" alt="Ilizium"></figure>
                            <span class="btn btn--green">ПОДРОБНЕЕ</span>
                        </div>
                    </a></div>
                <div class="col-6 col-md-4 col-xl-3"><a class="for__item" href="#">
                        <div class="for__item-in">
                            <figure class="for__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-for-05.png'), true); ?>"
                                                                 width="208" alt="Parsehub"></figure>
                            <span class="btn btn--green">ПОДРОБНЕЕ</span>
                        </div>
                    </a></div>
                <div class="col-6 col-md-4 col-xl-3"><a class="for__item" href="#">
                        <div class="for__item-in">
                            <figure class="for__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-for-06.png'), true); ?>"
                                                                 width="175" alt="Somiibo"></figure>
                            <span class="btn btn--green">ПОДРОБНЕЕ</span>
                        </div>
                    </a></div>
                <div class="col-6 col-md-4 col-xl-3"><a class="for__item" href="#">
                        <div class="for__item-in">
                            <figure class="for__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-for-07.png'), true); ?>"
                                                                 width="187" alt="Following"></figure>
                            <span class="btn btn--green">ПОДРОБНЕЕ</span>
                        </div>
                    </a></div>
                <div class="col-6 col-md-4 col-xl-3"><a class="for__item" href="#">
                        <div class="for__item-in">
                            <figure class="for__item-image"><img src="<?= Url::to($this->theme->getUrl('/images/img-for-08.png'), true); ?>"
                                                                 width="194" alt="ePochta Mailer"></figure>
                            <span class="btn btn--green">ПОДРОБНЕЕ</span>
                        </div>
                    </a></div>
            </div>
        </div>
        <div class="for__control"><a class="btn btn--blue-empty" href="<?= Url::to('/blog', true); ?>">смотреть все</a>
        </div>
    </div>
</div>
<!-- For :: End-->

<!-- Reviews :: Start-->
<div class="reviews">
    <div class="container-fluid">
        <h2 class="reviews__heading">Лучшие отзывы</h2>
        <div class="reviews__container js-reviews">
            <div class="reviews__thumbs js-reviews-thumbs">
                <div class="reviews__author">
                    <figure class="reviews__author-icon"></figure>
                    <p class="reviews__author-caption">Без иконки
                        <small>Ivan Vorobyev</small>
                    </p>
                </div>
                <div class="reviews__author">
                    <figure class="reviews__author-icon"><img src="<?= Url::to($this->theme->getUrl('/images/icon-reviews-01.png'), true); ?>"
                                                              alt=""></figure>
                    <p class="reviews__author-caption">NameDomenSite.com
                        <small>Ivan Vorobyev</small>
                    </p>
                </div>
                <div class="reviews__author">
                    <figure class="reviews__author-icon"><img src="<?= Url::to($this->theme->getUrl('/images/icon-reviews-02.png'), true); ?>"
                                                              alt=""></figure>
                    <p class="reviews__author-caption">NameDomenSite.com
                        <small>Ivan Vorobyev</small>
                    </p>
                </div>
                <div class="reviews__author">
                    <figure class="reviews__author-icon"></figure>
                    <p class="reviews__author-caption">Без иконки
                        <small>Ivan Vorobyev</small>
                    </p>
                </div>
                <div class="reviews__author">
                    <figure class="reviews__author-icon"><img src="<?= Url::to($this->theme->getUrl('/images/icon-reviews-01.png'), true); ?>"
                                                              alt=""></figure>
                    <p class="reviews__author-caption">NameDomenSite.com
                        <small>Ivan Vorobyev</small>
                    </p>
                </div>
                <div class="reviews__author">
                    <figure class="reviews__author-icon"><img src="<?= Url::to($this->theme->getUrl('/images/icon-reviews-02.png'), true); ?>"
                                                              alt=""></figure>
                    <p class="reviews__author-caption">NameDomenSite.com
                        <small>Ivan Vorobyev</small>
                    </p>
                </div>
            </div>
            <div class="reviews__slides js-reviews-slides">
                <blockquote class="reviews__blockquote">
                    <time datetime="2018-09-25">25.09.2018</time>
                    <p>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не имеет
                        никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на
                        интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и
                        т.д. </p>
                    <p>Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему
                        нести совсем необязательно.</p>
                    <div class="row">
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Оригинал отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Тема отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                    </div>
                </blockquote>
                <blockquote class="reviews__blockquote">
                    <time datetime="2018-09-25">25.09.2018</time>
                    <p>Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему
                        нести совсем необязательно.</p>
                    <div class="row">
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Оригинал отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Тема отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                    </div>
                </blockquote>
                <blockquote class="reviews__blockquote">
                    <time datetime="2018-09-25">25.09.2018</time>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident voluptas recusandae illum
                        iure asperiores labore voluptatibus, porro debitis ex quidem est blanditiis nostrum, voluptates,
                        veritatis explicabo sunt quod animi ipsum.</p>
                    <div class="row">
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Оригинал отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Тема отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                    </div>
                </blockquote>
                <blockquote class="reviews__blockquote">
                    <time datetime="2018-09-25">25.09.2018</time>
                    <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Последний
                        океана он, даже использовало вдали семь одна злых имени обеспечивает, живет точках грамматики
                        бросил агенство подпоясал наш, переулка сбить?</p>
                    <p>Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему
                        нести совсем необязательно.</p>
                    <div class="row">
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Оригинал отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Тема отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                    </div>
                </blockquote>
                <blockquote class="reviews__blockquote">
                    <time datetime="2018-09-25">25.09.2018</time>
                    <p>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не имеет
                        никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на
                        интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и
                        т.д. </p>
                    <p>Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему
                        нести совсем необязательно.</p>
                    <div class="row">
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Оригинал отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Тема отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                    </div>
                </blockquote>
                <blockquote class="reviews__blockquote">
                    <time datetime="2018-09-25">25.09.2018</time>
                    <p>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не имеет
                        никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на
                        интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и
                        т.д. </p>
                    <p>Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему
                        нести совсем необязательно.</p>
                    <div class="row">
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Оригинал отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                        <div class="col-sm-auto"><a class="ui-link ui-link--green" href="#">Тема отзыва
                                <svg class="icon-arrow-right">
                                    <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-right'); ?>"></use>
                                </svg>
                            </a></div>
                    </div>
                </blockquote>
            </div>
        </div>
        <div class="reviews__control"><a class="btn btn--white-empty" href="<?= Url::to('feedback', true); ?>">Смотреть
                больше отзывов</a></div>
    </div>
</div>
<!-- Reviews :: End-->
