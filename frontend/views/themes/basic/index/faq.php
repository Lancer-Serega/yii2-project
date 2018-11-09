<?php

use \yii\helpers\Url;

$this->title = 'FAQ - Proxy';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-content">
            <h1>FAQ </h1>
        </div>
        <div class="col-sidebar">
            <div class="search">
                <form action="#">
                    <input class="search__input" type="search" placeholder="Поиск">
                    <button class="search__btn">
                        <svg class="icon-search">
                            <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-search'); ?>"></use>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sidebar">
            <nav class="nav-aside">
                <ul class="nav-aside__menu">
                    <li><a class="nav-aside__link js-scrollto" href="#faq-01">Софт</a></li>
                    <li><a class="nav-aside__link js-scrollto" href="#faq-02">Новости</a></li>
                    <li><a class="nav-aside__link js-scrollto" href="#faq-03">Статьи</a></li>
                    <li><a class="nav-aside__link js-scrollto" href="#faq-04">События</a></li>
                </ul>
            </nav>
            <a class="banner is-visible-md" href="#">
                <figure class="banner__image"><img src="images/img-banner-02.jpg" alt=""></figure>
                <h2 class="banner__title">Не нашли ответа?</h2><span
                        class="btn btn--45 btn--white-empty">задать вопрос</span></a>
        </div>
        <div class="col-content">
            <!-- Faq :: Start-->
            <div class="faq">
                <div class="faq__group" id="faq-01">
                    <h2 class="faq__group-title">Название категории</h2>
                    <dl class="faq__group-dl js-accordion">
                        <dt>Каждый веб-разработчик знает, что такое текст-«рыба»
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                        <dt>Отсюда напрашивается вывод, что все же лучше
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                        <dt>И даже с языками, использующими латинский алфавит
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                        <dt>Каждый веб-разработчик знает, что такое текст-«рыба»
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                        <dt>Своим появлением Lorem ipsum обязан древнеримскому философу
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                    </dl>
                </div>
                <div class="faq__group" id="faq-02">
                    <h2 class="faq__group-title">Категория 2</h2>
                    <dl class="faq__group-dl js-accordion">
                        <dt>Каждый веб-разработчик знает, что такое текст-«рыба»
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                        <dt>Отсюда напрашивается вывод, что все же лучше
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                    </dl>
                </div>
                <div class="faq__group" id="faq-03">
                    <h2 class="faq__group-title">Категория 3</h2>
                    <dl class="faq__group-dl js-accordion">
                        <dt>Каждый веб-разработчик знает, что такое текст-«рыба»
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                        <dt>Отсюда напрашивается вывод, что все же лучше
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                    </dl>
                </div>
                <div class="faq__group" id="faq-04">
                    <h2 class="faq__group-title">Категория 4</h2>
                    <dl class="faq__group-dl js-accordion">
                        <dt>Каждый веб-разработчик знает, что такое текст-«рыба»
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                        <dt>Отсюда напрашивается вывод, что все же лучше
                            <svg class="icon-accordion">
                                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-accordion'); ?>"></use>
                            </svg>
                        </dt>
                        <dd>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не
                            имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки
                            на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов
                        </dd>
                    </dl>
                </div>
            </div>
            <!-- Faq :: End--><a class="banner is-hidden-md" href="#">
                <figure class="banner__image"><img src="images/img-banner-02.jpg" alt=""></figure>
                <h2 class="banner__title">Не нашли ответа?</h2><span
                        class="btn btn--45 btn--white-empty">задать вопрос</span></a>
        </div>
    </div>
</div>
