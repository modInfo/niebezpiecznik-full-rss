<?PHP
/*
 * Wyswietla 'wszystkie' pobrane adresy wpisów
 * 
 * */
require_once('db.php');

$sql = $db->query("SELECT * FROM `posts` ORDER BY data DESC LIMIT 30");
foreach ($sql as $row) {
	echo '<a href="post.php?url=' . $row['post'] . '">' . $row['post'] . '</a> <br />';
}
?>
