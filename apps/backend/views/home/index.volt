{{ assetsCollection.addCss('theme/assets/css/style_home.css') }}

<div id="mute" class="none" onclick="menuColClose()"></div>

<div class="main-container" id="main-wrapper">

    <section class="header">
        {{ partial('components/header/header',['navbars':navbars]) }}
    </section>

    <section class="main">

    </section>
    <section class="section-slider">

        {{ partial('components/slider/slider') }}

    </section>

    <section class="section-news">

        {{ partial('components/special-news/special-news') }}

    </section>

    <section class="section-last-advs">

        {{ partial('components/list-tab/list-tab') }}

    </section>

    <section >

        {{ partial('components/mininews/mininews') }}

    </section>

    <section >

        {{ partial('components/table/table') }}

    </section>

    <section >

        {#{{ partial('components/slick/slick') }}#}

    </section>

    <section class="form">

        {{ partial('components/form-default/form-default') }}

    </section>

    <section >

        {{ partial('components/dlmenu/dlmenu') }}

    </section>

    <section class="top-footer">
        top footer
    </section>

    <footer class="footer">
        footer
    </footer>


</div>

<div class="ilya-rights">
    <p>تمامی حقوق متعلق به ایلیا ایده می باشد.</p>
</div>



