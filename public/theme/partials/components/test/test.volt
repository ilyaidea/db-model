{%- macro test(array) %}
{% set out ='' %}
    {% for nav in array %}
        {% set out =out ~ '<li>' %}
        {% set out = out ~ nav['title'] %}
        {% if nav['children'] is type('array') and nav['children'] is not empty %}

            {% set out = out ~'<ul>' ~ test(nav['children']) ~ '</ul>' %}

        {% endif %}
        {% set out = out ~ '</li>' %}
    {% endfor %}

    {% return out %}
{%- endmacro %}
<ul>
    {{ test(navbars) }}
</ul>