<!-- Learn File -->
<?php
require_once '../database/db_connect.php';
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require '../includes/resources.php';?>
</head>
<body>
  <div class="modules">
  <h3>Web Development</h3>

<?php
require '../includes/header.php';

$modules = array();
getModules('https://www.codecademy.com/catalog/subject/web-development');

function getModules($page) {

  global $modules;
  $html = new simple_html_dom();
  $html->load_file($page);
  $items = $html->find('div[class=shellHeight__2jsuWtXDSQ4ApILdDE7e25]');

  foreach($items as $post) {
    $modules[] = array($post->children(0)->outertext,
                       $post->children(1)->outertext,
                       $post->children(2)->outertext);
                     }

  foreach($modules as $item) {
    echo "<div class='col-sm-4'>";
    echo "<div class='panel-body'>";
    echo $item[0];
    echo $item[1];
    echo $item[2];
    echo "</div>";
    echo "</div>";
  }
}
$html->clear();

?>
</div>
</body>

<?php
require '../includes/footer.php';
?>
</html>
