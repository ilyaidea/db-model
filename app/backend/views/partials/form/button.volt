{% if form.buttons().get() is not empty %}
    <div>
        {% for name, btn in form.buttons().get() %}
            <a {{ btn.get(true) }} style="color: white">{{ btn.getLabel() }}</a>
        {% endfor %}
    </div>
{% endif %}