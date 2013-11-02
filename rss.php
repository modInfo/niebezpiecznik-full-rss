<?php
/*
 * Generowanie feeda
 * */
	header('Content-Type: application/xml; charset=utf-8');
	require_once('db.php');
	require_once('post-rss.php'); //getDescription
	$sql = $db->query("SELECT * FROM `posts` ORDER BY data DESC LIMIT 14");
	echo '<?xml version="1.0" encoding="utf-8"?>'; ?><rss version="2.0">
<channel>
	<title>Niebezpiecznik.pl | Full RSS</title>
	<link>http://niebezpiecznik.pl</link>
	<description>Artykuły z pełnym wpisem</description>
	<language>pl-pl</language>
	<ttl>5</ttl>
	<?php foreach($sql as $row): ?>
	<item>
		<title><?php echo getTitle($row["post"]); ?></title>
		<link>http://tmp.spytajsie.com/niebezpiecznik/post.php?url=<?php echo $row["post"]; ?></link>
		<description><?php echo getDescription($row["post"]); ?></description>
		<guid>http://niebezpiecznik.pl<?php echo $row["post"]; ?></guid>
	</item>
	<?php endforeach; ?>
</channel>
</rss>
