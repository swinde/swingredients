[{oxhasrights ident="SHOWLONGDESCRIPTION"}]
    [{assign var="oLongdesc" value=$oDetailsProduct->getLongDescription()}]
    [{if $oLongdesc->value}]
    [{capture append="tabs"}]<a href="#description" data-toggle="tab">[{oxmultilang ident="DESCRIPTION"}]</a>[{/capture}]
    [{capture append="tabsContent"}]
    <div id="description" class="tab-pane[{if $blFirstTab}] active[{/if}]" itemprop="description">
        [{oxeval var=$oLongdesc}]
        [{if $oDetailsProduct->oxarticles__oxexturl->value}]
        <a id="productExturl" class="js-external" href="http://[{$oDetailsProduct->oxarticles__oxexturl->value}]">
            [{if $oDetailsProduct->oxarticles__oxurldesc->value}]
            [{$oDetailsProduct->oxarticles__oxurldesc->value}]
            [{else}]
            [{$oDetailsProduct->oxarticles__oxexturl->value}]
            [{/if}]
        </a>
        [{/if}]
        [{if $oDetailsProduct->oxarticles__swingredients->value}]
        <div class="ingredients">
            <p><b>[{oxmultilang ident="INGREDIENTS"}]:</b> [{$oDetailsProduct->oxarticles__swingredients->value|html_entity_decode}]</p>
        </div>
        [{/if}]
    </div>

    [{/capture}]
    [{assign var="blFirstTab" value=false}]
    [{/if}]
    [{/oxhasrights}]