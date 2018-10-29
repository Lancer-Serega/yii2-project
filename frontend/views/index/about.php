<?php

use \yii\helpers\Url;

$this->title = 'About - Proxy';
?>

<!-- Intro :: Start-->
<div class="intro">
    <div class="container-fluid">
        <h1 class="intro__heading">О нас</h1>
        <div class="row">
            <div class="col-md-6 push-md-6">
                <figure class="intro__image"><img src="images/img-about.png" alt=""></figure>
            </div>
            <div class="col-md-6 pull-md-6">
                <p class="intro__caption">Важный факт, который определяет нас в качестве компетентных людей и идущим
                    навстречу клиентам</p>
            </div>
        </div>
    </div>
</div>
<!-- Intro :: End-->
<!-- Txt :: Start-->
<div class="txt">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <p>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не имеет
                    никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на
                    интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и т.д.
                    Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему
                    нести совсем необязательно. </p>
                <p>Более того, нечитабельность текста сыграет на руку при оценке качества восприятия макета. Самым
                    известным «рыбным» текстом является знаменитый Lorem ipsum. Считается, что впервые его применили в
                    книгопечатании еще в XVI веке. </p>
            </div>
            <div class="col-md-6">
                <p>И даже с языками, использующими латинский алфавит, могут возникнуть небольшие проблемы: в различных
                    языках те или иные буквы встречаются с разной частотой, имеется разница в длине наиболее
                    распространенных слов. Отсюда напрашивается вывод, что все же лучше использовать в качестве «рыбы»
                    текст на том языке, который планируется использовать при запуске проекта.</p>
                <p>Сегодня существует несколько вариантов Lorem ipsum, кроме того, есть специальные генераторы,
                    создающие собственные варианты текста на основе оригинального трактата, благодаря чему появляется
                    возможность получить более длинный неповторяющийся набор слов.</p>
            </div>
        </div>
    </div>
</div>
<!-- Txt :: End-->
<!-- Values :: Start-->
<div class="values">
    <div class="container-fluid">
        <h2 class="values__heading">Наши ценности</h2>
        <div class="values__grid">
            <div class="row">
                <div class="col-md-4">
                    <div class="values__item">
                        <figure class="values__item-icon">
                            <svg class="icon-values-01">
                                <use xlink:href="sprites/sprite.svg#icon-values-01"></use>
                            </svg>
                        </figure>
                        <h3 class="values__item-title">Отношение к продукту</h3>
                        <p class="values__item-text">Наша цель — предоставить качественный сервис, соттветствующий
                            требованиям и задачам как рынка в целом, так и отдельно взятого субъекта</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="values__item">
                        <figure class="values__item-icon">
                            <svg class="icon-values-02">
                                <use xlink:href="sprites/sprite.svg#icon-values-02"></use>
                            </svg>
                        </figure>
                        <h3 class="values__item-title">Отношение к работе</h3>
                        <p class="values__item-text">Каждый из нас является частью глобального индустриального процесса,
                            в котором кроме нас учавствуют и другие лица, поэтому важно работать профессионально.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="values__item">
                        <figure class="values__item-icon">
                            <svg class="icon-values-03">
                                <use xlink:href="sprites/sprite.svg#icon-values-03"></use>
                            </svg>
                        </figure>
                        <h3 class="values__item-title">Отношение к клиентам</h3>
                        <p class="values__item-text">Мы сделали максимально удобную панель управления для того, чтобы вы
                            имели возможность быстро и без каких-либо затруднений пользоваться сервисом для своих
                            целей.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Values :: End-->
<!-- Contacts :: Start-->
<div class="contacts">
    <div class="container-fluid">
        <h2 class="contacts__heading">Контакты</h2>
        <div class="contacts__container">
            <div class="row">
                <div class="col-md-6 push-md-6">
                    <div class="contacts__info">
                        <div class="contacts__group">
                            <p class="contacts__group-title">Мы в социальных сетях</p>
                            <div class="contacts__group-buttons"><a class="contacts__btn" href="#"><span
                                            class="icon-social-fb"></span></a><a class="contacts__btn" href="#"><span
                                            class="icon-social-tw"></span></a><a class="contacts__btn" href="#"><span
                                            class="icon-social-gp"></span></a><a class="contacts__btn" href="#"><span
                                            class="icon-social-vk"></span></a></div>
                        </div>
                        <div class="contacts__group">
                            <p class="contacts__group-title">Мы на форумах</p>
                            <div class="contacts__group-buttons"><a class="contacts__btn" href="#"></a><a
                                        class="contacts__btn" href="#"></a><a class="contacts__btn" href="#"></a><a
                                        class="contacts__btn" href="#"></a></div>
                        </div>
                        <div class="contacts__group">
                            <p class="contacts__group-title">Другие способы связи:</p>
                            <ul class="contacts__group-menu">
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
                                        <div class="ui-capcha"><img src="images/img-capcha.png" alt=""></div>
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