<?php

namespace Swinde\SwIngredients\Controller\Admin;

use oxRegistry;
use oxDb;
use oxField;
use stdClass;
use OxidEsales\Eshop\Application\Model\Article;

class Ingredients extends Ingredients_parent {

    /**
     * Loads article parameters and passes them to Smarty engine, returns
     * name of template file "article_main.tpl".
     *
     * @return string
     */
    public function render() {
        /* Funktionalität der Basisklasse aufrufen */
        $ret = parent::render();

        /* Generierung eines zweiten Editors und übergabe an die View als 'editor2' */
        $oArticle = $this->_aViewData['edit'];
        $this->_aViewData["editor2"] = $this->_generateTextEditor(
            "100%",
            300,
            $oArticle,
            "oxarticles__swingredients",
            "details.tpl.css"
        );
        return $ret;
    }


    /**
     * Returns string which must be edited by editor
     * ACHTUNG!!! DIES IST NUR BEI ERWEITERUNG VON ARTIKELN NOTWENDIG!
     *
     * @param oxbase $oObject object whifh field will be used for editing
     * @param string $sField  name of editable field
     *
     * @return string
     */
    protected function _getEditValue( $oObject, $sField )
    {
        $sEditObjectValue = '';

        /* Wenn das zu bearbeitende Feld die ursprüngliche Langbeschreibung ist,
           dann behalten wir die Funktion bei, ansonsten nehmen wir den Standard,
           der bei allen anderen Controllern genutzt wird */
        if ($sField === "oxarticles__oxlongdesc") {
            if ($oObject) {
                $oDescField = $oObject->getLongDescription();
                $sEditObjectValue = $this->_processEditValue($oDescField->getRawValue());
                $oDescField = new \OxidEsales\Eshop\Core\Field($sEditObjectValue, \OxidEsales\Eshop\Core\Field::T_RAW);
            }
        } else {
            if ($oObject && $sField && isset($oObject->$sField)) {
                if ($oObject->$sField instanceof oxField) {
                    $sEditObjectValue = $oObject->$sField->getRawValue();
                } else {
                    $sEditObjectValue = $oObject->$sField->value;
                }

                $sEditObjectValue = $this->_processEditValue($sEditObjectValue);
                $oDescField = new \OxidEsales\Eshop\Core\Field($sEditObjectValue, \OxidEsales\Eshop\Core\Field::T_RAW);
            }
        }
        return $sEditObjectValue;
    }
}