<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>


<!-- inner-section : starts -->
<section class="inner-section">

    <!-- Container element for a single portfolio item. Do not remove! -->
    <div id="item_container" class="clearfix"></div>

    <!-- Filter -->
    <div id="filter" class="clearfix">
        <div id="filter_wrapper">
            <ul id="filters">
                <li class="filter active" data-filter="all">All</li>
                  
                <!--<?php //foreach($tags as $key=> $tag){ ?>-->
                <?php foreach($cates as $key=> $cate){ ?>
                    <li class="filter" data-filter=".<?php echo strtolower(str_replace(" ","_",$cate->name)); ?>"><?php echo $cate->name; ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- End: Filter -->


   

            <ul id="grid" class="pcontainer">

               <?php
                    foreach($items as $key=> $item){
                    	//$tag_name = array();
                      $cate_name = array();
                     /* 
                    foreach (modSasPortfolioHelper::getItemTags($item->id) as $itemtag) {
                        $tName = str_replace(" ", "_", $itemtag->name);
                        $tag_name[] = strtolower($tName);
                      }*/
                        foreach (modSasPortfolioHelper::getItemCates($item->id) as $itemcate) {
                        $cName = str_replace(" ", "_", $itemcate->name);
                        $cate_name[] = strtolower($cName);
                        
                    }
                   $filter= implode(" ", $cate_name);
                   $iid = $item->id;
                   $ialias= $item->alias;
					//arsort($filter);
                    //echo $filter;

					
					$k2img = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_S.jpg';;
                ?>

               
                    <li class="mix <?php echo $filter; ?> mix_all " >
            
                        <img src="<?php echo $k2img; ?>" alt="" title="" />
                   
                       
                        <!--<a href="<?php //echo 'index.php?option=com_k2&view=item&id='.$item->id.'&tmpl=component'; ?>" class="more_info">-->
                        <a href="<?php echo "index.php/component/k2/item/$iid-$ialias"; ?>" class="more_info">
                   
                            <div class="item_info">
                                <span class="project-name"><?php echo $item->title; ?></span>
                                <!--
                                <?php //foreach ($tag_name as $tag): ?>
                                      <?php //$tagFinal = str_replace("_", " ", $tag); ?>
                                    <span><?php //echo $tagFinal; ?></span>
                                <?php //endforeach; ?>
                              -->
                            </div>
                        </a>
                    </li>
                <?php } ?>

            </ul>

       
    <!-- End: Portfolio Wrap -->


</section>
<!-- inner-section : ends-->
