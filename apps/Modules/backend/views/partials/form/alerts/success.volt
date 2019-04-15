{# form/alerts/success(form) #}
{% if messages['success'] is defined %}
    {% if messages['success'] is iterable %}
        {% for success in messages['success'] %}
            <tr>
                <td colspan="{{ form.design.getColumns() }}">
                    {{ success }}
                </td>
            </tr>
        {% endfor %}
    {% else %}

    {% endif %}
{% endif %}