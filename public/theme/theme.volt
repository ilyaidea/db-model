{{ get_doctype() }}
{% set attribution = '<!-- Powered by IlyaIdea Company - https://www.ilyaidea.ir/ -->' %}

{#<html{{ tag.getHtmlTags(true) }}>#}
    {#{{ attribution }}#}

{{ partial('head') }}

{{ partial('body') }}
    {#{{ attribution }}#}
