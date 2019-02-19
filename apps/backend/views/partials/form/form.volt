<form method="post">

    {{ partial('form/formTitle')}}

    {% for field in form.getElements() %}
        {{ field.getLabel() }}

        {{ field.render() }}

        {% for message in field.getMessages() %}
            <div style="color: red">
                {{ message.getMessage() }}
            </div>
        {%  endfor %}

        <br>
    {% endfor %}
</form>