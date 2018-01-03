[{$smarty.block.parent}]

[{*Zuratenliste in Produktdetails*}]
[{if $oDetailsProduct->oxarticles__swingredients->value}]
    <br>[{oxmultilang ident="INGREDIENTS"}]: [{$oDetailsProduct->oxarticles__swingredients->value}]
[{/if}]