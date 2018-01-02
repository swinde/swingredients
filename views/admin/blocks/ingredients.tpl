[{* Den ursprünglichen Block übernehmen *}]
[{$smarty.block.parent}]

[{* Wir hängen unsere Änderungen an *}]
<h3><b>[{oxmultilang ident="INGREDIENTS"}]</b></h3>

[{* Das versteckte Feld, das die Daten an den Controller übergibt *}]
<input type="hidden" name="editval[oxarticles__swingredients]" value="">
[{* Der neue Editor *}]
[{ $editor2 }]
[{* JavaScript, dass die ursprüngliche Kopierfunktion erweitert *}]
<script type="text/javascript">

    var originalOnSubmitFunction = document.getElementById('myedit').onsubmit;

    document.getElementById('myedit').onsubmit = function(event) {
        originalOnSubmitFunction();
        copyLongDesc('oxarticles__swingredients');
    }
</script>