{# form/alerts/notice(form) #}
{% if messages['notice'] is defined %}
    {% if messages['notice'] is iterable %}
        {% for notice in messages['notice'] %}
            <tr>
                <td colspan="{{ form.design.getColumns() }}">
                    {{ notice }}
                </td>
            </tr>
        {% endfor %}
    {% else %}

    {% endif %}
{% endif %}