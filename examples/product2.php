<?php
  // have to put this into a php block or the <?xml will be put as a PHP syntax error on extended code escape
  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <!-- Generic browser family -->
  <title>Box Model Demos, a WebAbility&reg; Network Project</title>
  <meta http-equiv="PRAGMA" content="NO-CACHE" />
  <meta http-equiv="Expires" content="-1" />

  <meta name="Keywords" content="Box Model, Pattern, WebAbility" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="Charset" content="UTF-8" />
  <meta name="Language" content="en" />
  <link rel="stylesheet" href="/skins/css/boxmodel.css" type="text/css" />

</head>
<body>

<div class="container">

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />
<br />

<h1>Product Catalog Example</h1>

Matrix:<br />
<form method="get" action="">
Max per page:<select name="maxperpage"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4" selected="selected">4</option><option value="5">5</option><option value="6">6</option></select><br />
Category:<select name="category"><option value="main">Main</option><option value="other">Other</option></select><br />
<input type="submit" value="Ver" />
</form>

<?php

// We assure any Box library we call will be automatically loaded
include_once '../include/__autoload.lib';

setlocale(LC_ALL, 'es_MX.UTF8');
date_default_timezone_set('America/Mexico_City');

define('WADEBUG', false);
WADebug::setLevel(WADebug::SYSTEM);

$maxperpage = $_GET['maxperpage'];
if (!$maxperpage)
  $maxperpage = 4;

$eb = new engineBox('product.box.xml');
$eb->setInputs( array(
  'CATEGORY' => $_GET['category'],
  'PAGE' => $_GET['page'],
  'VARPAGE' => 'page',
  'DEFAULTPAGE' => 1,
  'VARMAXPERPAGE' => 'maxperpage',
  'MAXPERPAGE' => $maxperpage,
  'PAGENUMLEFT' => 2,
  'PAGENUMCENTER' => 2,
  'PAGENUMRIGHT' => 2,
  'SELECTED' => null,
  'ORIENTATION' => 'HORIZONTAL',
  'NUMCELL' => 2,
  'PAGECATALOG' => 'product.php',
  'PAGEPRODUCT' => 'product.php',
  'PAGECART' => 'product.php',
  'VARCATEGORY' => 'category',
  'VARPRODUCT' => 'product',
));
$eb->setInputData('productpages.language', './pagination.en.xml');
$eb->setInputData('productpages.template', './pagination.template');
$eb->setInputData('productloop.language', './product.en.xml');
$eb->setInputData('productloop.template', './product.template');
$eb->setInputData('productmatrix.language', './matrix.en.xml');
$eb->setInputData('productmatrix.template', './matrix.template');
$eb->setInputData('producttemplate.language', './productpage.en.xml');
$eb->setInputData('producttemplate.template', './productpage.template');

print $eb->getOutputData('result');

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
