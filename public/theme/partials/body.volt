{# body() #}
<body class="ilya-container">
    <header class="header">
        {{ partial('widgets/check-and-show', ['place': 'header']) }}
    </header>

    <section class="all-main">
        <section class="sidebar-main">
            {{ partial('widgets/check-and-show', ['place': 'side_main']) }}
        </section>

        <section class="main">
            <div class="main__top">
                {{ partial('widgets/check-and-show', ['place': 'main_top']) }}
            </div>
            <div class="main__content">
                {{ partial('body/content') }}
            </div>
            <div class="main__bottom">
                {{ partial('widgets/check-and-show', ['place': 'main_bottom']) }}
            </div>
        </section>

        <section class="sidebar-aid">
            {{ partial('widgets/check-and-show', ['place': 'side_aid']) }}
        </section>
    </section>


    <section class="bottom">
        {{ partial('widgets/check-and-show', ['place': 'bottom']) }}
    </section>

    <footer class="footer">
        {{ partial('widgets/check-and-show', ['place': 'footer']) }}
    </footer>

    {{ partial('body/script') }}
</body>