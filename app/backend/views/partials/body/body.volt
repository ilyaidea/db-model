<body>
<div>
    {#<input type="text" data-validation="required">#}
    {#<input type="text" data-validation="length" data-validation-length="min5">#}
    {#<input type="checkbox" name="agreement" data-validation="required">#}
    {% if form is defined %}

            {{ partial('form/form') }}

    {% endif %}
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
    $.validate({
        lang: 'en'
    });
</script>
</body>
