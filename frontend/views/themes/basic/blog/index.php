<?php

$this->title = 'Blog - Proxy';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-content">
            <h1>Блог </h1>
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
                    <li><a class="nav-aside__link" href="#">Софт</a></li>
                    <li><a class="nav-aside__link is-active" href="#">Новости</a></li>
                    <li><a class="nav-aside__link" href="#">Статьи</a></li>
                    <li><a class="nav-aside__link" href="#">События</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-content">
            <!-- Blog :: Start-->
            <div class="blog">
                <ul class="blog__list">
                    <li>
                        <div class="blog__item">
                            <h2 class="blog__item-title"><a href="#">Название статьи или новости</a></h2>
                            <ul class="blog__item-info">
                                <li>28 сентября 2018</li>
                                <li><a href="#">/ Статьи</a></li>
                            </ul>
                            <div class="blog__item-content">
                                <p>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на
                                    название, не имеет никакого отношения к обитателям водоемов. Используется он
                                    веб-дизайнерами для вставки на интернет-страницы и демонстрации внешнего вида
                                    контента, просмотра шрифтов, абзацев, отступов и т.д.</p>
                            </div>
                            <a class="btn btn--37 btn--green" href="#">Читать</a>
                        </div>
                    </li>
                    <li>
                        <div class="blog__item">
                            <h2 class="blog__item-title"><a href="#">Название статьи или новости</a></h2>
                            <ul class="blog__item-info">
                                <li>28 сентября 2018</li>
                                <li><a href="#">/ Статьи</a></li>
                            </ul>
                            <div class="blog__item-content"><img src="<?= $this->theme->getUrl('images/img-blog-01.jpg'); ?>" alt="">
                                <p>Так как цель применения такого текста исключительно демонстрационная, то и смысловую
                                    нагрузку ему нести совсем необязательно. Более того, нечитабельность текста сыграет
                                    на руку при оценке качества восприятия макета. Текст этот, несмотря на название, не
                                    имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами </p>
                            </div>
                            <a class="btn btn--37 btn--green" href="#">Читать</a>
                        </div>
                    </li>
                    <li>
                        <div class="blog__item">
                            <h2 class="blog__item-title"><a href="#">Название статьи или новости</a></h2>
                            <ul class="blog__item-info">
                                <li>28 сентября 2018</li>
                                <li><a href="#">/ Статьи</a></li>
                            </ul>
                            <div class="blog__item-content">
                                <p>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на
                                    название, не имеет никакого отношения к обитателям водоемов. Используется он
                                    веб-дизайнерами для вставки на интернет-страницы и демонстрации внешнего вида
                                    контента, просмотра шрифтов, абзацев, отступов и т.д.</p>
                            </div>
                            <a class="btn btn--37 btn--green" href="#">Читать</a>
                        </div>
                    </li>
                </ul
                <div class="pagination"><a class="pagination__link pagination__link--prev" href="#">
                        <svg class="icon-pagination-prev">
                            <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-pagination-prev'); ?>"></use>
                        </svg>
                    </a><a class="pagination__link" href="#">1</a><a class="pagination__link" href="#">2</a><a
                            class="pagination__link is-active" href="#">3</a><a class="pagination__link"
                                                                                href="#">4</a><a
                            class="pagination__link" href="#">5</a><a class="pagination__link" href="#">6</a><a
                            class="pagination__link" href="#">7</a><a class="pagination__link" href="#">8</a><span
                            class="pagination__dots">...</span><a class="pagination__link" href="#">14</a><a
                            class="pagination__link pagination__link--next" href="#">
                        <svg class="icon-pagination-next">
                            <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-pagination-next'); ?>"></use>
                        </svg>
                    </a></div>
            </div>
            <!-- Blog :: End-->
        </div>
    </div>
</div>
