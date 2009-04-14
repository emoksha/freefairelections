			<div class="bg">
				<h2><?php echo $title; ?> <a href="<?php echo url::base() . 'admin/settings/site' ?>" class="active">Site</a><a href="<?php echo url::base() . 'admin/settings' ?>">Map</a><a href="<?php echo url::base() . 'admin/settings/sms' ?>">SMS</a><a href="<?php echo url::base() . 'admin/settings/sharing' ?>">Sharing</a></h2>
				<?php print form::open(); ?>
				<div class="report-form">
					<?php
					if ($form_error) {
					?>
						<!-- red-box -->
						<div class="red-box">
							<h3>Error!</h3>
							<ul>
							<?php
							foreach ($errors as $error_item => $error_description)
							{
								// print "<li>" . $error_description . "</li>";
								print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
							}
							?>
							</ul>
						</div>
					<?php
					}

					if ($form_saved) {
					?>
						<!-- green-box -->
						<div class="green-box">
							<h3>Your Settings Have Been Saved!</h3>
						</div>
					<?php
					}
					?>				
					<div class="head">
						<h3>Site Settings</h3>
						<input type="image" src="<?php echo url::base() ?>media/img/admin/btn-cancel.gif" class="cancel-btn" />
						<input type="image" src="<?php echo url::base() ?>media/img/admin/btn-save-settings.gif" class="save-rep-btn" />
					</div>
					<!-- column -->		
					<div class="sms_holder">
						<div class="row">
							<h4>Site Name</h4>
							<?php print form::input('site_name', $form['site_name'], ' class="text long2"'); ?>
						</div>
						<div class="row">
							<h4>Site Tagline</h4>
							<?php print form::input('site_tagline', $form['site_tagline'], ' class="text long2"'); ?>
						</div>
						<div class="row">
							<h4>Site Email Address</h4>
							<?php print form::input('site_email', $form['site_email'], ' class="text long2"'); ?>
						</div>
						<div class="row">
							<h4>Site Language (Locale)</h4>
							<span class="sel-holder">
								<?php print form::dropdown('site_language', $site_language_array, $form['site_language']); ?>
							</span>
						</div>
						<div class="row">
							<h4>Items Per Page - Front End</h4>
							<span class="sel-holder">
								<?php print form::dropdown('items_per_page', $items_per_page_array, $form['items_per_page']); ?>
							</span>
						</div>
						<div class="row">
							<h4>Items Per Page - Admin</h4>
							<span class="sel-holder">
								<?php print form::dropdown('items_per_page_admin', $items_per_page_array, $form['items_per_page_admin']); ?>
							</span>
						</div>
						<div class="row">
							<h4>Allow Users To Submit Reports?</h4>
							<span class="sel-holder">
								<?php print form::dropdown('allow_reports', $yesno_array, $form['allow_reports']); ?>
							</span>
						</div>
						<div class="row">
							<h4>Allow Users to Submit Comments to Reports?</h4>
							<span class="sel-holder">
								<?php print form::dropdown('allow_comments', $yesno_array, $form['allow_comments']); ?>
							</span>
						</div>
						<div class="row">
							<h4>Include RSS News Feed on Website?</h4>
							<span class="sel-holder">
								<?php print form::dropdown('allow_feed', $yesno_array, $form['allow_feed']); ?>
							</span>
						</div>
						<div class="row">
							<h4>Cluster Reports on Map?</h4>
							<span class="sel-holder">
								<?php print form::dropdown('allow_clustering', $yesno_array, $form['allow_clustering']); ?>
							</span>
						</div>
						<div class="row">
							<h4>Google Analytics</h4>
							Web Property ID - Format: UA-XXXXX-XX &nbsp;&nbsp;
							<?php print form::input('google_analytics', $form['google_analytics'], ' class="text"'); ?>
						</div>
						<div class="row">
							<h4>Twitter Credentials</h4>
							<div class="row">
								Hashtags - Separate with commas
								<?php print form::input('twitter_hashtags', $form['twitter_hashtags'], ' class="text"'); ?>
							</div>
							<div class="row" style="padding-top:5px;">
								Username
								<?php print form::input('twitter_username', $form['twitter_username'], ' class="text"'); ?>
							</div>
							<div class="row" style="padding-top:5px;">
								Password
								<?php print form::password('twitter_password', $form['twitter_password'], ' class="text"'); ?>
							</div>
						</div>
						<div class="row">
				        <h4>Laconica Credentials</h4>
				
				    <div class="row">
					    Username
					    <?php print form::input('laconica_username', $form['laconica_username'], ' class="text"'); ?>
				    </div>
				    <div class="row" style="padding-top:5px;">
					    Password
					    <?php print form::password('laconica_password', $form['laconica_password'], ' class="text"'); ?>
				    </div>
				    <div class="row" style="padding-top:5px;">
					    Laconica Site
					    <?php print form::input('laconica_site', $form['laconica_site'], 'class="text long2"'); ?>
				    </div>
			</div>
					</div>
		
					<div class="simple_border"></div>
		
					<input type="image" src="<?php echo url::base() ?>media/img/admin/btn-save-settings.gif" class="save-rep-btn" />
					<input type="image" src="<?php echo url::base() ?>media/img/admin/btn-cancel.gif" class="cancel-btn" />
				</div>
				<?php print form::close(); ?>
			</div>
