

{#{% for validator in field.getValidators() %}#}
    {#{% set validatorname = substr(get_class(validator), strrpos(get_class(validator), '\\') + 1)%}#}



        {#{% switch validatorname  %}#}
        {#{% case 'PresenceOf' %}#}
            {#{% if attr['data-validation'] is defined %}#}
                 {#{%  set attr['data-validation'] += ',required' %}#}
            {#{% else  %}#}
                {#{%  set attr['data-validation'] = 'required' %}#}
            {#{% endif %}#}
        {#{% break %}#}

            {#{% case 'StringLength' %}#}
                {#{% if attr['data-validation'] is defined %}#}
                    {#{%  set attr['data-validation'] += ',length' %}#}
                {#{% else  %}#}
                    {#{%  set attr['data-validation'] = 'length' %}#}
                {#{% endif %}#}
            {#{% break %}#}

        {#{% endswitch %}#}
{#{% endfor %}#}

{{ field.render(tag.test(field)) }}