{# form/alerts/warning(form) #}
{% if messages['warning'] is defined %}
    {% if messages['warning'] is iterable %}
        {% for warning in messages['warning'] %}
            <tr>
                <td colspan="{{ form.design.getColumns() }}">
                    {{ warning }}
                </td>
            </tr>
        {% endfor %}
    {% else %}

    {% endif %}
{% endif %}