{% for field in form.getElements() %}
        {% switch field.getAttribute('type')  %}
            {% case 'text' %}
                {{ field.render() }}
                {{ field.label() }}
                {{ partial('form/alerts/error') }}
            {% break %}
        {% endswitch %}
{% endfor %}