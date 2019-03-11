{# head/css() #}
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i|Roboto:100,300,300i,400" rel="stylesheet">

{{ assets.outputCss() }}
{{ assets.outputInlineCss() }}

<link rel="shortcut icon" type="image/png" href="{{ url.get('favicon.png') }}">