{{ assetsCollection.addCss('theme/partials/components/logo-bar/logo-bar-common.css') }}

{% if device.isTablet()   %}
    {{ assetsCollection.addCss('theme/partials/components/logo-bar/logo-bar-tablet.css') }}

{% elseif device.isMobile()   %}
    {{ assetsCollection.addCss('theme/partials/components/logo-bar/logo-bar-mobile.css') }}

{% else  %}
    {{ assetsCollection.addCss('theme/partials/components/logo-bar/logo-bar.css') }}

{% endif %}
<div class="logo-bar bp-min-tablet-default">
         <img src="{{ static_url('theme/assets/image/logo4.png') }}" alt="logo" class="logo-bar__img">
         <div class="logo-bar__search">
             <input type="text" class="logo-bar__search-input"
                    placeholder="جستجو...">
             <a href="#" class="btn-search">
                 <i class="fal fa-search logo-bar__search-icon"></i>
             </a>
         </div>
    {{ partial('components/button/button', ['class' : '"btn-simple logo-bar__login btn--primary"', 'label1' : 'ثبت نام/ورود','href': 'sign.html']) }}
    {#<a href="#" class="btn-simple logo-bar__login btn--primary ">ثبت نام / ورود</a>#}
</div>
