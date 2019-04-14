{#{{ assetsCollection.addCss('theme/partials/components/slider/slider.css') }}#}
{#{{ assetsCollection.addCss('theme/partials/components/head/all.min.css') }}#}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ static_url('public/theme/partials/components/slider/slider.css') }}">

    <!-- Fonts and fontawesome -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i|Roboto:100,300,300i,400" rel="stylesheet">

    <link rel="stylesheet" href="">
</head>
<body>
<div style="height: 400px">
    <div class="slider">

        <h1>Title</h1>
        <div class="slider__slide">
            <div class="slider__slide--1"></div>
            <h6>Slider1</h6>

            <div class="slider__slide1">
                <i class="fas fa-bong"></i>
            </div>
        </div>
        <div class="slider__slide">
            <div class="slider__slide--2"></div>
            <h6>Slider2</h6>

            <div class="slider__slide1">
                <i class="fas fa-vial"></i>
            </div>
        </div>
        <div class="slider__slide">
            <div class="slider__slide--3"></div>
            <h6>Slider3</h6>

            <div class="slider__slide1">
                <i class="fas fa-prescription-bottle"></i>
            </div>
        </div>
        <div class="slider__slide">
            <div class="slider__slide--4"></div>
            <h6>Slider4</h6>

            <div class="slider__slide1">
                <i class="fas fa-vials"></i>
            </div>
        </div>
    </div>
</div>
</body>
</html>
