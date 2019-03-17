{# test/test(color, id) #}
{# {{ partial('test/test',
[
    'color':'blue','id':'bId'
] )}}#}

{#<button id="{{ id }}" class="test"> save </button>#}

{{ assetsCollection.addCss('theme/partials/test/test.css') }}

{{ assetsCollection.addInlineCss('#'~id~'{color :'~color~'}') }}
{{ assetsCollection.addInlineJs('$("#'~id~'").on("click", function(){alert("'~color~'")});') }}