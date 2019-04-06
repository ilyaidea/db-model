{{ assetsCollection.addJs('theme/partials/components/header/header.js') }}
{%- macro make_navbar(array) %}
    {% set out ='' %}
    {% for nav in array %}

        {% set out =out ~ '<li id="'~nav['item_id']~'" class="'~nav['item_class']~'">' %}

        {% set out = out ~ nav['title'] %}

        {% if nav['type'] == 'link' %}
            {% set out = out ~ '<a href= "#" onclick="setIdforShowMenu(navbar-1row-t1_1_ {{ id }} )" class="' ~nav['item_class']~ '" >' ~nav['title']~ '</a>' %}

        {% endif %}

        {% if nav['children'] is type('array')  and nav['children'] is not empty %}
            <div >
                <div>
                    <ul class="navbar-1row-t1__item-main-drop--grid--ul">
                        {{ make_navbar(nav['children']) }}
                        <a href="">{{ nav['title']}}</a>
                    </ul>
                    {#{% set out = out ~'<ul class="navbar-1row-t1__item-main-drop--grid--ul">' ~ make_navbar(nav['children']) ~ '</ul>' %}#}
                    {#<a href="">{{ nav['title']}}</a>#}
                </div>
            </div>

        {% endif %}

        {% set out = out ~ '</li>' %}
    {% endfor %}

    {% return out %}
{%- endmacro %}

<header class="header">

    <div class="navbar-base-collapsed__icon--container" >
        <a href="javascript:void(0);" id="nav-bottom" class="navbar-base-collapsed__icon" onclick="menuColOpen()"><i class="fal fa-bars"></i></a>
        <h6>دسته بندی</h6>
    </div>

{{ partial('widgets/logo-bar/logo-bar') }}
{{ partial('widgets/nav-bar/nav-bar') }}

    <div id="nav-collapsed" class="none tran-all navbar-base-collapsed">

        <div class="navbar-base-collapsed__header">
            <img src="{{ static_url('theme/assets/image/logo4.png') }}" alt="logo" class="logo-bar__img">
            <h6>logotype</h6>
        </div>
        <div class="navbar-base-collapsed__top">
            <ul class="navbar-base-collapsed__top--item">
                <i class="fal fa-minus-hexagon navbar-base-collapsed__top--item-minus"></i>
                تجهیزات آزمایشگاهی
                <li>تجهیزات اول</li>
                <li>تجهیزات دوم</li>
                <li>تجهیزات سوم</li>


            </ul>
            <ul class="navbar-base-collapsed__top--item">
                <i class="fal fa-plus-hexagon navbar-base-collapsed__top--item-plus"></i>
                مواد شیمیایی
            </ul>
            <ul class="navbar-base-collapsed__top--item">
                <i class="fal fa-plus-hexagon navbar-base-collapsed__top--item-plus"></i>
                مطالب و اخبار
            </ul>
            <ul class="navbar-base-collapsed__top--item">
                <i class="fal fa-minus-hexagon navbar-base-collapsed__top--item-minus"></i>
                تأمین کنندگان
                <li>تأمین کننده 1</li>
                <li>تأمین کننده 2</li>

            </ul>
            <ul class="navbar-base-collapsed__top--item">
                <i class="fal fa-plus-hexagon navbar-base-collapsed__top--item-plus"></i>
                تعرفه ها
            </ul>
        </div>
        <div class="navbar-base-collapsed__bottom">
            <a href="#" class="navbar-base-collapsed__bottom--item">
                درباره ما
            </a>
            <a href="#" class="navbar-base-collapsed__bottom--item">
                تماس با ما
            </a>
        </div>

    </div>

</header>




