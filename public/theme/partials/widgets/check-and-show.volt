
{% if color is defined %}
    <div>
        <button style="background-color: {{ color }}"> save {{ place }}</button>

    </div>
{% else %}
    <div>
        <button> save {{ place }}</button>
    </div>
{% endif %}

{{ assetCollection.addInlineCss('body{background : red}') }}