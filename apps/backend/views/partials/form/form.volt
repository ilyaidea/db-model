<form method="post">

    {{ partial('form/formTitle')}}

    {#{{ partial('form/alerts/success')}}#}
    {#{{ partial('form/alerts/notice') }}#}
    {#{{ partial('form/alerts/warning') }}#}
    {#{{ partial('form/alerts/error') }}#}

    {% for field in form.getElements() %}
        {{ partial('form/validate',['field':field]) }}

        {% for message in field.getMessages() %}
            <div style="color: red">
                {{ message.getField() }}
            </div>
            <div style="color: red">
                {{ message.getMessage() }}
            </div>
        {%  endfor %}

        <br>
    {% endfor %}
</form>