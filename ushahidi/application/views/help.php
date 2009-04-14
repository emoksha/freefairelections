<div id="content">
	<div class="content-bg">
		<!-- start reports block -->
		<div class="big-block">
			<div class="big-block-top">
				<div class="big-block-bottom">
					<h1>How To Help <?php echo $pagination_stats; ?></h1>
					<div class="org_rowtitle">
	                	<div class="org_col1">
	                    	<strong>Organization</strong>
	                    </div>
	                </div>
                    <?php
                   	foreach ($organizations as $organization)
                    {
                        $organization_id = $organization->id;
                        $organization_name = $organization->organization_name;
                        $organization_description = $organization->organization_description;

                        // Trim to 150 characters without cutting words (Text Helper)
                        //XXX: Perhaps delcare 150 as constant
						$organization_description = text::limit_chars($organization_description, 150, "...", true);
                    
                        echo "<div class=\"org_row1\">";
                        echo "	<h3><a href=\"" . url::base() . "help/view/" . $organization_id . "\">" . $organization_name . "</a></h3>";
                        echo $organization_description;
                        echo "</div>";
                    }
                ?>
				<?php echo $pagination; ?>
				</div>
			</div>
		</div>
		<!-- end reports block -->
	</div>
</div>
