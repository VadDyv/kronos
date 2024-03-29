<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
//$css = $APPLICATION->GetCSSArray();
//if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
//{
//	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
//}

$strReturn .= '<div class="breadcrumbs">'       
        . '<ul class="breadcrumbs__list" itemscope itemtype="http://schema.org/BreadcrumbList">'
        . ' <li class="breadcrumbs__mobile"><span>...</span></li>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	$nextRef = ($index < $itemSize-2 && $arResult[$index+1]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index+1).'"' : '');
	$child = ($index > 0? ' itemprop="child"' : '');
	//$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');
        $css = '';
        if( $index == 0 ) {
            $css = 'class="breadcrumbs__hide-mobile"';
        }
        
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<li '.$css.' itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
				<span>'.$title.'</span>
				</a>
				<meta itemprop="name" content="'.$title.'" />
                <meta itemprop="position" content="'. $index .'" />
			</li>';
	}
	else
	{
		$strReturn .= '
			<li>
				<span>'.$title.'</span>
			</li>';
	}
}

$strReturn .= '</ul></div>';

return $strReturn;
