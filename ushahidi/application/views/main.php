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
        <li><a id="media_0" class="active" href="#" name="media_0"><span><?php echo Kohana::lang('ui_main.reports'); ?></span></a></li>
        <li><a id="media_4" href="#" name="media_4"><span><?php echo Kohana::lang('ui_main.news'); ?></span></a></li>
        <li><a id="media_1" href="#" name="media_1"><span><?php echo Kohana::lang('ui_main.pictures'); ?></span></a></li>
        <li><a id="media_2" href="#" name="media_2"><span><?php echo Kohana::lang('ui_main.video'); ?></span></a></li>
        <li><a id="media_0" href="#" name="media_0"><span><?php echo Kohana::lang('ui_main.all'); ?></span></a></li>
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
          <a class="active" id="cat_0" href="#" name="cat_0"><span style="background:no-repeat url(<?php echo url::base() . 'swatch/?c=#990000&w=16&h=16&.png'?>;); background-position:left center;">All Categories</span></a>
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
      
      <div class="category how_to_submit">
      <?php if (!empty($phone_array)) { ?>
          <h3 class="title"><h3>Report in four ways</h3>
          <ol> 
            <li>
            <?php echo Kohana::lang('ui_main.submit_sms1'); ?><?php echo Kohana::lang('ui_main.submit_shortcode'); ?>
              <?php foreach ($phone_array as $phone) {
                echo "<strong>". $phone ."</strong>";
                if ($phone != end($phone_array)) {
                 echo ", ";
                }
               } ?>
             <?php } ?>       
            </li>
            <li><?php echo Kohana::lang('ui_main.submit_email'); ?></li>
            <li><?php echo Kohana::lang('ui_main.submit_twitter'); ?></li>
            <li><?php echo Kohana::lang('ui_main.submit_form'); ?></li>
           </ol>      
         <h3>Example SMS Report</h3>
         <p class="example"> votereport #Pune #VIOL Violence in Pune’s Boat Club area. 6 injured. Situation under control. Source: NDTV.</p>
         <p class="guide"><?php echo Kohana::lang('ui_main.submit_guide');?> </p>

        <div class="report-btns">
          <a class="btn-red" href="<?php echo url::base() . 'reports/submit/';?>">
            <span><?php echo Kohana::lang('ui_main.submit'); ?></span></a>
         </div>
        </div> <!-- /how_to_submit -->
     </div>
    </div>
   </div>
  </div><!-- end map and media filter <> start incidents and news blocks -->

<!-- ============== -->
<!-- = aggregator = -->
<!-- ============== -->

<script type="text/javascript" charset="utf-8">
  $(document).ready(function() { $('table tbody tr:odd').addClass('odd'); });
</script>

<div class="feeds">
    <div class="single_feed videos">
     <h2>Related Videos</h2>
      
      
      
      
      <ul class="video">      
         <?php 
          foreach ($video_feeds as $feed) {
            $feed_id = $feed->id;
            $feed_title = text::limit_chars($feed->item_title, 140, '...', True);
            $feed_link = $feed->item_link;
        ?>
         <li class="feed_item">     
           <object width="250" height="200"><param name="movie" value="<?php echo $feed_link; ?>"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="<?php echo $feed_link; ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="250" height="200"></embed></object>
           <a href="#" class="title"><?php echo $feed_title; ?></a>
         </li>
            <?php } ?>


      <!-- ==================== -->
      <!-- = begin dummy feed = -->
      <!-- ==================== -->
      <!--
         <li class="feed_item">     
           <object width="250" height="200"><param name="movie" value="http://www.youtube.com/v/ZdV37K_NlFA&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/ZdV37K_NlFA&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="250" height="200"></embed></object>
           <a href="#" class="title">Indian Elections Begin</a>
         </li>
       
          <li class="feed_item">     
            <object width="250" height="200"><param name="movie" value="http://www.youtube.com/v/-IdgqLJwIaY&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/-IdgqLJwIaY&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="250" height="200"></embed></object>
            <a href="#" class="title">Navin Chawla reviewing election preparation</a>
          </li>

          <li class="feed_item">     
            <object width="250" height="200"><param name="movie" value="http://www.youtube.com/v/Gidhf90hbIw&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/Gidhf90hbIw&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="250" height="200"></embed></object>
            <a href="#" class="title">Villagers respond to non-performing politicians</a>
          </li> 
   -->
              <!-- ================== -->
              <!-- = end dummy feed = -->
              <!-- ================== -->
     </ul> 

      
      
    </div> <!-- / single_feed videos -->
  
  <div class="single_feed incidents">
    <table>
      <h2>Reported Incidents</h2>
      <thead>
        <tr>
          <th scope="col" abbr="title"><?php echo Kohana::lang('ui_main.title'); ?></th>
          <th scope="col" abbr="location"><?php echo Kohana::lang('ui_main.location'); ?></th>  
          <th scope="col" abbr="date"><?php echo Kohana::lang('ui_main.date'); ?></th>
        </tr> 
      </thead>
      <tbody>
        <tr>  
          <?php foreach ($incidents as $incident) {
             $incident_id = $incident->id;
             $incident_title = text::limit_chars($incident->incident_title, 140, '...', True);
             $incident_date = $incident->incident_date;
             $incident_date = date('M j Y G:i', strtotime($incident->incident_date));
             $incident_location = $incident->location->location_name;
           ?>
          <td><a href="<?php echo url::base() . 'reports/view/' . $incident_id; ?>"><?php echo $incident_title ?></a></td>
          <td><?php echo $incident_location ?></td>
          <td><?php echo $incident_date; ?></td>
        </tr>
      <?php } ?>    
    </tbody>
  </table>
  <a class="btn-more" href="<?php echo url::base() . 'reports/'; ?>"><span>MORE</span></a>
  </div>

  <div class="single_feed news">
  <table>
    <h2>Related News</h2>
    <thead>
    <tr>
      <th scope="col" abbr="title"><?php echo Kohana::lang('ui_main.title'); ?></th>
      <th scope="col" abbr="source"><?php echo Kohana::lang('ui_main.source'); ?></th>  
      <th scope="col" abbr="date"><?php echo Kohana::lang('ui_main.date'); ?></th>
    </tr> 
    </thead>
      <tbody>
        <tr>
        <?php foreach ($feeds as $feed) {
         $feed_id = $feed->id;
         $feed_title = text::limit_chars($feed->item_title, 140, '...', True);
         $feed_link = $feed->item_link;
         $feed_date = date('M j Y G:i', strtotime($feed->item_date));
         $feed_source = "NEWS";
        ?>
          <td><a href="<?php echo $feed_link; ?>"><?php echo $feed_title ?></a></td>
          <td><?php echo $feed_source ?></td>
          <td><?php echo $feed_date; ?></td>
        </tr>
        <?php } ?>    
      </tbody>
    </table>
   </div> <!-- /single_feed -->

     <div class="single_feed photos">
     <table>
      <h2>Related Photos</h2>
      
      
      <!-- ==================== -->
      <!-- = begin dummy feed = -->
      <!-- ==================== -->
      
      
      <ul class="photos">      
   <?php 
        foreach ($photo_feeds as $feed) {
            $feed_id = $feed->id;
            $feed_title = text::limit_chars($feed->item_title, 140, '...', True);
            $feed_link = $feed->item_link;
        ?>
            <li class="feed_item">     
          <a href="#"><img src="<?php echo $feed_link; ?>" width="170" height="140"/></a>
          <a href="#" class="title"><?php echo $feed_title; ?></a>
         </li>
            <?php } ?>
            <!-- 
        <li class="feed_item">     
          <a href="#"><img src="http://farm4.static.flickr.com/3306/3446469479_be9f840843.jpg"></a>
          <a href="#" class="title">Maoist attacks</a>
         </li>

         <li class="feed_item">     
           <a href="#"><img src="http://cache.daylife.com/imageserve/059o9qA9epdap/610x.jpg"> </a>
           <a href="#" class="title">Election official verifying ID cards near Agartala, Tripura</a>
         </li>

          <li class="feed_item">     
            <a href="#"><img src="http://www.futuregov.net/media/photologue/photos/2009/Mar/24/cache/indian_elections_gallery_display.jpg" /></a>
            <a href="#" class="title">Voters waiting to cast their ballots</a>
           </li>

          <li class="feed_item">     
            <a href="#"><img src="http://www.telegraph.co.uk/telegraph/multimedia/archive/01385/varun-460_1385899c.jpg" /></a>
            <a href="#" class="title">Varun Gandhi on parole outside Lucknow prison</a>
           </li> -->

        </ul>
      </div> <!-- single_feed photos-->
  </div> <!-- /feeds -->
 </div> <!-- /content -->
</div> <!-- /content-bg -->


