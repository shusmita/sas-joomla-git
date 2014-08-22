<?php

class modSasPortfolioHelper
{
    /**
     * Retrieves the hello message
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    

    public static function getCategory( $params )
    {
        $cids = $params->get('category_id', NULL); /*get catid from admin by xml*/
        $all_category_commaseperated = implode(",", $cids);

        $db        = JFactory::getDbo();
        $queryCateId   = $db->getQuery(true);
        $queryCateId = "SELECT `id`, `name`, `alias`  FROM `#__k2_categories` WHERE `published` = 1 AND `id` IN ($all_category_commaseperated) ORDER BY `name`";
        $db->setQuery($queryCateId);
        $db->getQuery();
        $cates = $db->loadObjectList();
        
        return $cates;
    }

    public static function getTag( $params )
    {
       
        $db        = JFactory::getDbo();
        $queryTagId   = $db->getQuery(true);
        $queryTagId = "SELECT `id`, `name`  FROM `#__k2_tags` WHERE `published` = 1 ORDER BY `name`";
        $db->setQuery($queryTagId);
        $db->getQuery();
        $tags = $db->loadObjectList();
        
        return $tags;
    }
    public static function getItem( $params )
    {
        $cids = $params->get('category_id', NULL); /*get catid from admin by xml*/
        $all_category_commaseperated = implode(",", $cids);
        $db        = JFactory::getDbo();
        $queryItemId   = $db->getQuery(true);
        $queryItemId = "SELECT `id`, `title`, `alias` FROM `#__k2_items` WHERE `published` = 1 AND `catid` IN ($all_category_commaseperated) ORDER BY `title`";
        $db->setQuery($queryItemId);
        $db->getQuery();
        $items = $db->loadObjectList();
        
        return $items;
    }
    public static function getItemTags( $params )
    {
        //echo $params;
        $db        = JFactory::getDbo();
        $queryItemTagId   = $db->getQuery(true);
        //$queryItemTagId = "SELECT `id`, `tagID`, `itemID`  FROM `#__k2_tags_xref`";
        //$queryItemTagId = "SELECT `#__k2_tags_xref`.`tagID`, `#__k2_tags_xref`.`itemID`, `#__k2_tags`.`name`  FROM `#__k2_tags_xref`, `#__k2_tags` WHERE `#__k2_tags`.`id` = `#__k2_tags_xref`.`tagID` AND `#__k2_tags`.`id` = $params ";
        $queryItemTagId = "SELECT  `#__k2_tags_xref`.`tagID`,`#__k2_tags_xref`.`itemID`,`#__k2_tags`.`name`  FROM  `#__k2_tags_xref`, `#__k2_tags` WHERE `#__k2_tags_xref`.`tagID` = `#__k2_tags`.`id` AND `#__k2_tags_xref`.`itemID` = '$params'";
        $db->setQuery($queryItemTagId);
        $db->getQuery();
        $itemtags = $db->loadObjectList();
        
        return $itemtags;
    }
    public static function getItemCates( $params )
    {
        $db        = JFactory::getDbo();
        $queryItemCatName = "SELECT  `#__k2_items`.`id`, `#__k2_items`.`catid`, `#__k2_categories`.`name`  FROM  `#__k2_items`, `#__k2_categories` WHERE `#__k2_items`.`catid` =`#__k2_categories`.`id` AND `#__k2_items`.`id` = '$params'";
        $db->setQuery($queryItemCatName);
        $db->getQuery();
        $itemcates = $db->loadObjectList();
        
        return $itemcates;
    }
}
?>