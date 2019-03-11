
{% if page is defined %}
    <h1>{{ page.getTitle() }}</h1>
    <div>{{ page.getContent() }}</div>
{% endif %}

{{ content() }}