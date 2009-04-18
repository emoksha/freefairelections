<?php echo "<?xml version=\"1.0\"?>"; ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom"<?php if(isset($georss)) echo ' xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#"';?>>
	<channel>
		<title><?php echo $feed_title; ?></title>
		<link><?php echo $site_url; ?></link>
		<pubDate><?php echo gmdate("D, d M Y H:i:s T", strtotime($feed_date)); ?></pubDate>
		<description><?php echo $feed_description; ?></description>
		<generator>Ushahidi Engine</generator>
		<atom:link href="<?php echo $feed_url; ?>" rel="self" type="application/rss+xml" /><?php 
		foreach ($items as $item) { ?>

		<item>
			<title><?php echo $item['title']; ?></title>
			<link><?php echo $item['link']; ?></link>
			<description><![CDATA[<?php echo $item['description']; ?>]]></description>
			<pubDate><?php echo gmdate("D, d M Y H:i:s T", strtotime($item['date'])); ?></pubDate>
			<guid><?php if(isset($item['guid'])) echo $item['guid']; else echo $item['link'] ?></guid>
			<?php if(isset($item['point'])) { ?><geo:Point>
				<geo:lat><?php echo $item['point'][0]; ?></geo:lat>
				<geo:long><?php echo $item['point'][1]; ?></geo:long>
			</geo:Point>
			<?php } ?>
		</item><?php 
		}	?>

	</channel>
</rss>
