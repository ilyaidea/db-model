{# form/alerts/error(form) #}
{% if messages['error'] is defined %}
    {% if messages['error'] is iterable %}
        {% for error in messages['error'] %}
            <tr>
                {#<td colspan="{{ form.design.getColumns() }}>#}
                    {{ error }}
                {#</td>#}
            </tr>
        {% endfor %}
    {% else %}

    {% endif %}
{% endif %}