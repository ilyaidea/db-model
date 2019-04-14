{{ assetsCollection.addCss('theme/partials/components/special-news/special-news.css') }}
{{ assetsCollection.addCss('theme/partials/components/special-news/1row-title.css') }}

<div class="title-1row">
    <h2 class=title-1row__header>آخرین اخبار</h2>
    <div class="title-1row__empty-content"></div>
</div>
<div class="news-box">


    {{ partial('components/special-news/news-box/news-box',['img':'theme/assets/image/1.jpg','head':'خبر','title':'خبر اول','href': '#']) }}

    {{ partial('components/special-news/news-box/news-box',['img':'theme/assets/image/2.jpg','head':'خبر','title':'خبر دوم','href': '#']) }}

    {{ partial('components/special-news/news-box/news-box',['img':'theme/assets/image/3.jpg','head':'خبر','title':'خبر سوم','href': '#']) }}
</div>