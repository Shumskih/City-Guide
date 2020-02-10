<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<?if (!empty($arResult)):?>
        <ul class="navbar-nav mr-auto">

            <?
            $previousLevel = 0;
            foreach($arResult as $arItem):?>

            <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
            <?endif?>

            <?if ($arItem["IS_PARENT"]):?>

            <?if ($arItem["DEPTH_LEVEL"] == 1):?>
            <li class="nav-item <?if ($arItem["SELECTED"]):?>active<?endif?>">
    <a class="nav-link"  href="#">
        <?if (!empty($arItem["ADDITIONAL_LINKS"][0])):?>
            <i class="<?=$arItem["ADDITIONAL_LINKS"][0]?>"></i>
        <?endif;?>

        <?=$arItem["TEXT"]?>
    </a>
                <ul>
                    <?else:?>
                    <li class="nav-item <?if ($arItem["SELECTED"]):?>active<?endif?>"><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
                        <ul>
                            <?endif?>

                            <?else:?>

                                <?if ($arItem["PERMISSION"] > "D"):?>

                                    <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                        <li class="nav-item <?if ($arItem["SELECTED"]):?>active<?endif?>">
                                            <a class="nav-link" href="<?=$arItem["LINK"]?>">
                                                <?if (!empty($arItem["ADDITIONAL_LINKS"][0])):?>
                                                    <i class="<?=$arItem["ADDITIONAL_LINKS"][0]?>"></i>
                                                <?endif;?>
                                                <?=$arItem["TEXT"]?>
                                            </a>
                                        </li>

                                    <?else:?>
                                        <?//my_dump($arItem);?>
    <li class="nav-item <?if ($arItem["SELECTED"]):?>active<?endif?>">
        <a  class="nav-link" href="<?=$arItem["LINK"]?>">
            <?=$arItem["TEXT"]?>

        </a>
        <?=(isset($arItem["ADDITIONAL_LINKS"][0]))?
            '<span class="menu_count_green">'.$arItem["ADDITIONAL_LINKS"][0].'</span>':'';?>

        <?=(isset($arItem["ADDITIONAL_LINKS"][0]))?
            '<span class="menu_count_yellow">'.$arItem["ADDITIONAL_LINKS"][1].'</span>':'';?>

        <?=(isset($arItem["ADDITIONAL_LINKS"][0]))?
            '<span class="menu_count_red">'.$arItem["ADDITIONAL_LINKS"][2].'</span>':'';?>
    </li>
                                    <?endif?>

                                <?else:?>

                                    <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                        <li><a  href="" class="nav-link" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                                    <?else:?>
                                        <li><a href=""  class="denied nav-link" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                                    <?endif?>

                                <?endif?>

                            <?endif?>

                            <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

                            <?endforeach?>

                            <?if ($previousLevel > 1)://close last item tags?>
                                <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
                            <?endif?>

                        </ul>

<?endif?>