<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();



foreach ($arResult['SECTIONS'] as &$arSection) {
	if (!$arSection['UF_SHORT_NAME']) {
		$arSection['UF_SHORT_NAME'] = $arSection['NAME'];	
	}
	
	/*if (strpos($arSection['UF_SHORT_NAME'], ' для ') !== false) {
		$arSection['UF_SHORT_NAME'] = str_replace(' для ', '<p class="category-select__subttl">для ', $arSection['UF_SHORT_NAME']);
		$arSection['UF_SHORT_NAME'] .= '</p>';
	}*/
	if (strpos($arSection['UF_SHORT_NAME'], ' к ') !== false) {
		$ar = explode(' к ', $arSection['UF_SHORT_NAME']);
		$arSection['UF_SHORT_NAME'] = $ar[0];
		$arSection['UF_SHORT_NAME_SUB'] = 'к '.$ar[1];
	}
}


/* FIND SUBSECTIONS */
foreach ($arResult['SECTIONS'] as $k => $arSection) {
	if (!$arSection['IBLOCK_SECTION_ID']) {
		$arSection['IBLOCK_SECTION_ID'] = 'ROOT';
	}
	$arResult['SORTED_SECTIONS'][$arSection['IBLOCK_SECTION_ID']][] = $k;
}

/*echo '<pre>$arResult = '.__FILE__.' LINE: '.__LINE__;	
print_r($arResult['SECTIONS']);		
echo '</pre>';	*/		

?>