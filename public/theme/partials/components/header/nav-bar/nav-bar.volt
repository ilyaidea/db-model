{{ assetsCollection.addCss('theme/partials/components/nav-bar/nav-bar.css') }}
{{ assetsCollection.addJs('theme/partials/components/nav-bar/nav-bar.js') }}

{%- macro make_navbar(array) %}
    {% set out ='' %}
    {% for nav in array %}

        {% set out =out ~ '<li id="'~nav['item_id']~'" class="'~nav['item_class']~'">' %}

        {% if nav['type'] == 'link' %}
            {% set out = out ~ '<a href= "'~nav['url']~'" >' ~nav['title']~ '</a>' %}
        {% else %}
            {% set out = out ~ '<a href= "#">' ~nav['title']~ '</a>' %}
        {% endif %}

        {% if nav['children'] is type('array')  and nav['children'] is not empty %}
            {% set out = out ~'<ul>' ~ make_navbar(nav['children']) ~ '</ul>' %}
        {% endif %}

        {% set out = out ~ '</li>' %}

    {% endfor %}

    {% return out %}
{%- endmacro %}

<div class="navbar-base bp-min-tablet-default" >

    <div class="navbar-1row-t1__main">
        <ul class="navbar-1row-t1">
        {{ make_navbar(navbars) }}
        </ul>

    </div>
    <div class="navbar-1row-t1__sub">
        <ul class="navbar-1row-t1">

            <li class="navbar-1row-t1__item-sub">
                {{ partial('components/button/button', ['class' : 'navbar-1row-t1__item-sub', 'label' : 'درباره ما','href': '#']) }}

            </li>
            <li class="navbar-1row-t1__item-sub">
                {{ partial('components/button/button', ['class' : 'navbar-1row-t1__item-sub', 'label' : 'تماس با ما','href': '#']) }}

            </li>
        </ul>
    </div >


</div>
