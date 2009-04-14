<div id="content">
 <div class="content-bg">
  <!-- start map and media filter -->
  <div class="big-block">
   <div class="big-block-top">
    <div class="big-block-bottom">
     <div class="big-map-block">
      <div class="filter">
       <strong><?php echo Kohana::lang('ui_main.media_filter'); ?></strong>
       <ul>
        <li>
         <a id="media_0" class="active" href="#" name="media_0"><span><?php echo Kohana::lang('ui_main.reports'); ?></span></a>
        </li>
        <li>
         <a id="media_4" href="#" name="media_4"><span><?php echo Kohana::lang('ui_main.news'); ?></span></a>
        </li>
        <li>
         <a id="media_1" href="#" name="media_1"><span><?php echo Kohana::lang('ui_main.pictures'); ?></span></a>
        </li>
        <li>
         <a id="media_2" href="#" name="media_2"><span><?php echo Kohana::lang('ui_main.video'); ?></span></a>
        </li>
        <li>
         <a id="media_0" href="#" name="media_0"><span><?php echo Kohana::lang('ui_main.all'); ?></span></a>
        </li>
       </ul>
       <!-- AddThis Button BEGIN -->
       <script type="text/javascript">var addthis_pub="votereport";</script>
       <a href="http://www.addthis.com/bookmark.php?v=20" onmouseover="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><img src="http://s7.addthis.com/static/btn/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
       <script type="text/javascript" src="http://s7.addthis.com/js/200/addthis_widget.js"></script>
       <!-- AddThis Button END -->
      </div>
      <div style="padding:10px;">
       <strong><?php echo "Click on the dots to view reports"; ?></strong>
      </div>
      <div id="map" class="map-holder"></div>
      <div class="slider-holder">
       <form action="#">
        <input type="hidden" value="0" name="currentCat" id="currentCat">
        <fieldset>
         <label for="startDate">From:</label> <select name="startDate" id="startDate">
          <?php echo $startDate; ?>
         </select> <label for="endDate">To:</label> <select name="endDate" id="endDate">
          <?php echo $endDate; ?>
         </select>
        </fieldset>
       </form>
      </div>
      <div id="graph" class="graph-holder"></div>
     </div>
     <div class="category">
      <strong class="title">CATEGORY FILTER</strong>
      <div class="grey-box">
       <div class="grey-box-bg">
        <ul>
         <li>
          <a class="active" id="cat_0" href="#" name="cat_0"><span style="background:no-repeat url(&lt;?php echo url::base() . 'swatch/?c=990000&amp;w=16&amp;h=16&amp;.png' ?&gt;); background-position:left center;">All Categories</span></a>
         </li><?php
              foreach ($categories as $category => $category_info)
              {
                      $category_title = $category_info[0];
                      $category_color = $category_info[1];
                     echo '<li><a href="#" id="cat_'. $category .'"><span style="background:no-repeat url('. url::base() . "swatch/?c=" . $category_color . "&w=16&h=16&.png" . '); background-position:left center;">' . $category_title . '</span></a></li>';
                    }
             ?>
        </ul>
       </div>
      </div>
      <div class="report-btns">
       <a class="btn-red" href="<?php echo url::base() . 'reports/submit/';?>"><span><?php echo Kohana::lang('ui_main.submit'); ?></span></a>
       <div style="clear:both;margin:0;padding:0;height:1px;"></div>
      </div><?php if (!empty($phone_array)) { ?>
      <br /><br />
      <div class="category">
      <strong class="title">You can report incidents in four ways</strong>
      <div class="grey-box">
       <div class="grey-box-bg">
          <div style="padding:10px 10px 10px 10px;">
        <?php echo Kohana::lang('ui_main.submit_sms1'); ?><?php echo Kohana::lang('ui_main.submit_shortcode'); ?><?php foreach ($phone_array as $phone) {
                    echo "<strong>". $phone ."</strong>";
                    if ($phone != end($phone_array)) {
                     echo ", ";
                    }
                   } ?>
       <?php } ?>
       
        <br /><?php echo Kohana::lang('ui_main.submit_email'); ?><br />
        <?php echo Kohana::lang('ui_main.submit_twitter'); ?><br />
       <?php echo Kohana::lang('ui_main.submit_form'); ?><br />
       </div>
         </div>
      </div>
                                                </div>
      <p>It will help us map your reports if you send them to us in a pre-specified format: votereport #TOWN or PIN-CODE #CATEGORY DETAILS SOURCE.</p>
      <p>Example: votereport #Pune #VIOL Violence in Pune’s Boat Club area. 6 injured. Situation under control. Source: NDTV.</p>
      <?php echo Kohana::lang('ui_main.submit_guide');?>     
     </div>
    </div>
   </div>
  </div><!-- end map and media filter <> start incidents and news blocks -->
  <div class="blocks-holder">
   <div class="small-block incidents">
    <h3>
     <?php echo Kohana::lang('ui_main.incidents_listed'); ?>
    </h3>
    <div class="block-bg">
     <div class="block-top">
      <div class="block-bottom">
       <ul>
        <li>
         <ul class="title">
          <li class="w-01">
           <?php echo Kohana::lang('ui_main.title'); ?>
          </li>
          <li class="w-02">
           <?php echo Kohana::lang('ui_main.location'); ?>
          </li>
          <li class="w-03">
           <?php echo Kohana::lang('ui_main.date'); ?>
          </li>
         </ul>
        </li><?php
            if ($total_items == 0)
                    {
           ?>
        <li>
         <ul>
          <li class="w-01">No Reports In The System
          </li>
          <li class="w-02">&nbsp;
          </li>
          <li class="w-03">&nbsp;
          </li>
         </ul>
        </li><?php 
                    }
           foreach ($incidents as $incident)
                      {
                        $incident_id = $incident->id;
                $incident_title = text::limit_chars($incident->incident_title, 40, '...', True);
                        $incident_date = $incident->incident_date;
                        $incident_date = date('M j Y', strtotime($incident->incident_date));
                        $incident_location = $incident->location->location_name;
              ?>
        <li>
         <ul>
          <li class="w-01">
           <a href="<?php echo url::base() . 'reports/view/' . $incident_id; ?>"><?php echo $incident_title ?></a>
          </li>
          <li class="w-02">
           <?php echo $incident_location ?>
          </li>
          <li class="w-03">
           <?php echo $incident_date; ?>
          </li>
         </ul>
        </li><?php
             }
            ?>
       </ul><a class="btn-more" href="<?php echo url::base() . 'reports/'; ?>"><span>MORE</span></a>
      </div>
     </div>
    </div>
   </div>
   <div class="small-block news">
    <h3>
     <?php echo Kohana::lang('ui_main.official_news'); ?>
    </h3>
    <div class="block-bg">
     <div class="block-top">
      <div class="block-bottom">
       <ul>
        <li>
         <ul class="title">
          <li class="w-01">
           <?php echo Kohana::lang('ui_main.title'); ?>
          </li>
          <li class="w-02">
           <?php echo Kohana::lang('ui_main.source'); ?>
          </li>
          <li class="w-03">
           <?php echo Kohana::lang('ui_main.date'); ?>
          </li>
         </ul>
        </li><?php
           foreach ($feeds as $feed)
           {
            $feed_id = $feed->id;
            $feed_title = text::limit_chars($feed->item_title, 40, '...', True);
            $feed_link = $feed->item_link;
            $feed_date = date('M j Y', strtotime($feed->item_date));
            $feed_source = "NEWS";
            ?>
        <li>
         <ul>
          <li class="w-01">
           <a href="<?php echo $feed_link; ?>" target="_blank"><?php echo $feed_title ?></a>
          </li>
          <li class="w-02">
           <?php echo $feed_source; ?>
          </li>
          <li class="w-03">
           <?php echo $feed_date; ?>
          </li>
         </ul>
        </li><?php
             }
             ?>
       </ul><a class="btn-more" href="#"><span>MORE</span></a>
      </div>
     </div>
    </div>
   </div>
  </div><!-- end start incidents and news blocks -->
 </div>
</div>
