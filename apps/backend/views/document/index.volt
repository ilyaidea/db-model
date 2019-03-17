
{{ assetsCollection.addInlineCss('.top-rect-block {
        display: flex;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
        background-color: rgba(247, 247, 247, 0);
        height: 60px;
        width: 100%;
        border-bottom: 1px solid #DFDFDF;
    }

    .text-value {
        display: inline-block;
        color: rgba(0, 0, 0, 0.7);
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        line-height: 24px;
    }

    ul {
        font-family: Roboto;
    }

    li {
        font-size: 14px;
        margin: 10px 0px;
    }

    li a {
        color: #5e5ee4;
        text-decoration: none;
    }

    .bottom-line {
        font-size: 12px;
        color: #666;
    }') }}

<div class='top-rect-block'>
    <div class='text-value'>توضیحات</div>
</div>
{#<div>#}
   {#سربرگ سایت ilya idea#}
{#</div>#}
    {{ partial('components/header/header') }}
