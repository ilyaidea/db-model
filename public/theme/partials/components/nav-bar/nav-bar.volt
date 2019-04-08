{{ assetsCollection.addCss('theme/partials/components/nav-bar/nav-bar.css') }}
{{ assetsCollection.addJs('theme/partials/components/nav-bar/nav-bar.js') }}


<div class="navbar-base bp-min-tablet-default" >
    {#<div class="navbar-1row-t1__main">#}
        {#<ul class="navbar-1row-t1">#}
            {#<li id="navbar-1row-t1_1_{{ id }}" class="navbar-1row-t1__item-main">#}
                {#<a href="#" onclick="setIdforShowMenu('navbar-1row-t1_1_{{ id }}')" class="dropbtn">تجهیزات آزمایشگاهی</a>#}
                {#<div  class="navbar-1row-t1__item-main-drop dropdown-content">#}

                    {#<div class="navbar-1row-t1__item-main-drop--grid">#}
                        {#<ul class="navbar-1row-t1__item-main-drop--grid--ul">#}

                            {#<li class="navbar-1row-t1__item-main-drop--grid--li">#}
                                {#<i class="fal fa-flask"></i>#}
                                {#<a href="">تجهیزات اول </a>#}
                            {#</li>#}

                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">تجهیزات دوم </a></li>#}
                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">مشخصات</a></li>#}
                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">ویژگی ها </a></li>#}
                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">روش ها </a></li>#}
                        {#</ul>#}

                        {#<ul class="navbar-1row-t1__item-main-drop--grid--ul">#}

                            {#<li class="navbar-1row-t1__item-main-drop--grid--li">#}
                                {#<i class="fal fa-flask"></i>#}
                                {#<a href="">خرید </a>#}
                            {#</li>#}

                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">خرید </a></li>#}
                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">برنامه ریزی</a></li>#}
                        {#</ul>#}

                    {#</div>#}

                {#</div>#}
            {#</li>#}

            {#<li id="navbar-1row-t1_2_{{ id }}" class="navbar-1row-t1__item-main">#}
                {#<a href="#" onclick="setIdforShowMenu('navbar-1row-t1_2_{{ id }}')" class="dropbtn">مواد شیمیایی</a>#}
                {#<div  class="navbar-1row-t1__item-main-drop dropdown-content">#}

                    {#<div class="navbar-1row-t1__item-main-drop--grid">#}
                        {#<ul class="navbar-1row-t1__item-main-drop--grid--ul">#}

                            {#<li class="navbar-1row-t1__item-main-drop--grid--li">#}
                                {#<i class="fal fa-flask"></i>#}
                                {#<a href="">تجهیزات اول </a>#}
                            {#</li>#}

                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">تجهیزات دوم </a></li>#}
                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">مشخصات</a></li>#}
                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">ویژگی ها </a></li>#}
                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">روش ها </a></li>#}
                        {#</ul>#}

                        {#<ul class="navbar-1row-t1__item-main-drop--grid--ul">#}

                            {#<li class="navbar-1row-t1__item-main-drop--grid--li">#}
                                {#<i class="fal fa-flask"></i>#}
                                {#<a href="">خرید </a>#}
                            {#</li>#}

                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">خرید </a></li>#}
                            {#<li class="navbar-1row-t1__item-main-drop--grid--li"><a href="">برنامه ریزی</a></li>#}
                        {#</ul>#}

                    {#</div>#}

                {#</div>#}
            {#</li>#}

            {#<li class="navbar-1row-t1__item-main">#}
                {#<a href="#">مطالب و اخبار</a>#}
            {#</li>#}

            {#<li class="navbar-1row-t1__item-main">#}
                {#<a href="#">تأمین کنندگان</a>#}
            {#</li>#}
            {#<li class="navbar-1row-t1__item-main">#}
                {#<a href="#">تعرفه ها</a>#}
            {#</li>#}
        {#</ul>#}

    {#</div>#}

    {# این مکرو از کلاس پدرش که ویجت هدر است میاید#}
    <div class="navbar-1row-t1__main">
        <ul class="navbar-1row-t1">
        {{ make_navbar(navbars) }}
        </ul>

    </div>
    <div class="navbar-1row-t1__sub">
        <ul class="navbar-1row-t1">

            <li class="navbar-1row-t1__item-sub">
                {{ partial('components/button/button', ['class' : 'navbar-1row-t1__item-sub', 'label1' : 'درباره ما','href': '#']) }}

            </li>
            <li class="navbar-1row-t1__item-sub">
                {{ partial('components/button/button', ['class' : 'navbar-1row-t1__item-sub', 'label1' : 'تماس با ما','href': '#']) }}

            </li>
        </ul>
    </div >


</div>
