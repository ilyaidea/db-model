{#<body class="ilya-container">#}
            {#<div class="main__content">#}
                {#{{ partial('body/content') }}#}
            {#</div>#}

    {#{{ partial('body/script') }}#}
{#</body>#}
{#{{ assetsCollection.addCss('theme/partials/components/header/header.css') }}#}
{#{{ assetsCollection.addCss('theme/partials/components/header/all.min.css') }}#}
{#{{ assetsCollection.addJs('theme/partials/components/header/header.js') }}#}

<body>
<div id="mute" class="none" onclick="menuColClose()"></div>

<div class="container" id="main-wrapper">

    {{ partial('body/content') }}

</div>

{{ partial('body/script') }}

</body>

