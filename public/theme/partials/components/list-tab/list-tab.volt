{{ assetsCollection.addCss('theme/partials/components/list-tab/list-tab.css') }}

<div class="list-tab">
    <div class="list-tab__header list-tab__header--back-color-secondary">آخرین آگهی ها</div>
    <div class="list-tab__btns">
        {#{{ partial('components/button/button',['href':'#','class':'list-tab__btns--right','label':'جدیدترین']) }}#}
        {#{{ partial('components/button/button',['href':'#','class':'list-tab__btns--middle ','label':'جدیدترین']) }}#}
        {#{{ partial('components/button/button',['href':'#','class':'list-tab__btns--left ','label':'جدیدترین']) }}#}

        <button class="list-tab__btns--right">پربازدیدترین</button>
        <button class="list-tab__btns--middle">پربازدیدترین</button>
        <button class="list-tab__btns--left">پرحاشیه ترین</button>
    </div>
    {#این قسمت را بهتر است از دیتابیس آگهی ها بخواند#}
    <div class="list-tab__list">
        <ul class="list-tab__list--box">
            <li class="list-tab__list--item"><a href="#"> <i class="fal fa-angle-double-left"></i> آگهی اول</a></li>
            <li class="list-tab__list--item"><a href="#"> <i class="fal fa-angle-double-left"></i> آگهی دوم</a></li>
            <li class="list-tab__list--item"><a href="#"> <i class="fal fa-angle-double-left"></i> آگهی سوم</a></li>
            <li class="list-tab__list--item"><a href="#"> <i class="fal fa-angle-double-left"></i> آگهی چهارم</a></li>
        </ul>
    </div>
</div>