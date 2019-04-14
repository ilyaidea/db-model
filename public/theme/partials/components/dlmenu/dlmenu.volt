{{ assetsCollection.addCss('theme/partials/components/dlmenu/dlmenu.css') }}
{{ assetsCollection.addJs('theme/partials/components/dlmenu/dlmenu.js') }}

<div class="adv-menu clearfix">
    <div class="adv-menu__header">ثبت آگهی</div>
    <div id="dl-menu" class="dl-menuwrapper">
        <ul class="dl-menu dl-menuopen">

            <li>
                <a href="#" class="adv-item">تجهیزات آزمایشگاهی</a>
                <ul class="dl-submenu">

                    <li>
                        <a href="#" class="adv-item">ارلن</a>
                        <ul class="dl-submenu">
                            <li><a href="#" class="adv-item" onclick="setnewadv()">حالت1 </a></li>
                            <li><a href="#" class="adv-item" onclick="setnewadv()">حالت 2</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#" class="adv-item">تجیز2</a>
                        <ul class="dl-submenu">
                            <li><a href="#" class="adv-item" onclick="setnewadv()">حالت 1/1</a></li>
                            <li><a href="#" class="adv-item" onclick="setnewadv()">حالت 1/2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="adv-item">مواد شیمیایی</a>
                <ul class="dl-submenu">
                    <li>
                        <a href="#" class="adv-item">ماده 1</a>
                        <ul class="dl-submenu">
                            <li><a href="#" class="adv-item" onclick="setnewadv()">ماده 1/1</a></li>
                            <li><a href="#" class="adv-item" onclick="setnewadv()">ماده 1/2</a></li>

                        </ul>
                    </li>

                    <li><a href="#" class="adv-item" onclick="setnewadv()">ماده2 </a></li>
                    <li><a href="#" class="adv-item" onclick="setnewadv()">ماده 3</a></li>

                </ul>
            </li>

        </ul>
    </div>
</div>
