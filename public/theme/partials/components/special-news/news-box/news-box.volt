{{ assetsCollection.addCss('theme/partials/components/special-news/news-box/news-box.css') }}

<a class="news-card-simple" href="{{ href }}">
    <img src="{{ static_url(img) }}" alt="news 1" class="news-card-simple__img">
    <p class="news-card-simple__head" >{{ head }}</p>
    <h6 class="news-card-simple__title">{{ title }} </h6>

</a>