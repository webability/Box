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
This example uses a box flow hard coded in the code (the array is explicit) and the parameters are directly set and red within the PHP code too.<br />
The same example using an XML box definition and an extra box to read the parameters can be found <a href="productauto.php">here</a><br />
<br />
<b>The template is bootstrap-like so it is extremely easy to integrate into any responsive design you may want to use.</b><br />
<br />

Matrix:<br />
<form method="get" action="">
Max per page:<select name="maxperpage"><option value="1">1</option><option value="2">2</option><option value="3" selected="selected">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select><br />
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

$boxdef = array(
  'boxes' => array(
    'productcount' => array(
      'box' => 'productcountBox',
      'inputs' => array(
        'CATEGORY' => array('from' => 'inputs', 'data' => 'CATEGORY')
      )
    ),
    'productpages' => array(
      'box' => 'paginationBox',
      'inputs' => array(
        'PAGE' => array('from' => 'inputs', 'data' => 'PAGE'),
        'VARPAGE' => array('from' => 'inputs', 'data' => 'VARPAGE'),
        'DEFAULTPAGE' => array('from' => 'inputs', 'data' => 'DEFAULTPAGE'),
        'VARMAXPERPAGE' => array('from' => 'inputs', 'data' => 'VARMAXPERPAGE'),
        'MAXPERPAGE' => array('from' => 'inputs', 'data' => 'MAXPERPAGE'),
        'PAGENUMLEFT' => array('from' => 'inputs', 'data' => 'PAGENUMLEFT'),
        'PAGENUMCENTER' => array('from' => 'inputs', 'data' => 'PAGENUMCENTER'),
        'PAGENUMRIGHT' => array('from' => 'inputs', 'data' => 'PAGENUMRIGHT'),
        'quantity' => array('from' => 'productcount', 'data' => 'quantity'),
        'language' => array('from' => 'inputs', 'data' => 'productpages.language'),
        'template' => array('from' => 'inputs', 'data' => 'productpages.template')
      )
    ),
    'productquery' => array(
      'box' => 'productqueryBox',
      'inputs' => array(
        'CATEGORY' => array('from' => 'inputs', 'data' => 'CATEGORY'),
        'min' => array('from' => 'productpages', 'data' => 'min'),
        'num' => array('from' => 'productpages', 'data' => 'num')
      ),
    ),
    'productloop' => array(
      'box' => 'templateloopBox',
      'inputs' => array(
        'SELECTED' => array('from' => 'inputs', 'data' => 'SELECTED'),
        'list' => array('from' => 'productquery', 'data' => 'list'),
        'language' => array('from' => 'inputs', 'data' => 'productloop.language'),
        'template' => array('from' => 'inputs', 'data' => 'productloop.template')
      ),
    ),
    'productmatrix' => array(
      'box' => 'matrixBox',
      'inputs' => array(
        'ORIENTATION' => array('from' => 'inputs', 'data' => 'ORIENTATION'),
        'NUMCELL' => array('from' => 'inputs', 'data' => 'NUMCELL'),
        'NUMMAX' => array('from' => 'inputs', 'data' => 'MAXPERPAGE'),
        'list' => array('from' => 'productloop', 'data' => 'list'),
        'language' => array('from' => 'inputs', 'data' => 'productmatrix.language'),
        'template' => array('from' => 'inputs', 'data' => 'productmatrix.template')
      ),
    ),
    'producttemplate' => array(
      'box' => 'templateBox',
      'inputs' => array(
        'elements' => array('from' => 'integrator', 'data' => array(
            '__MATRIX__' => array('from' => 'productmatrix', 'data' => 'template'),
            '__PAGINATION__' => array('from' => 'productpages', 'data' => 'template'),
            '__PAGECATALOG__' => array('from' => 'inputs', 'data' => 'PAGECATALOG'),
            '__PAGEPRODUCT__' => array('from' => 'inputs', 'data' => 'PAGEPRODUCT'),
            '__PAGECART__' => array('from' => 'inputs', 'data' => 'PAGECART'),
            '__VARMAXPERPAGE__' => array('from' => 'inputs', 'data' => 'VARMAXPERPAGE'),
            '__VARCATEGORY__' => array('from' => 'inputs', 'data' => 'VARCATEGORY'),
            '__CATEGORY__' => array('from' => 'inputs', 'data' => 'CATEGORY'),
            '__VARPRODUCT__' => array('from' => 'inputs', 'data' => 'VARPRODUCT'),
        )),
        'language' => array('from' => 'inputs', 'data' => 'producttemplate.language'),
        'template' => array('from' => 'inputs', 'data' => 'producttemplate.template')
      )
    ),
  ),
  'outputs' => array(
    'result' => array('from' => 'producttemplate', 'data' => 'template'),
    'result1' => array('from' => 'productcount', 'data' => 'quantity'),
    'result11' => array('from' => 'productpages', 'data' => 'num'),
    'result12' => array('from' => 'productpages', 'data' => 'min'),
    'result13' => array('from' => 'productpages', 'data' => 'template'),
    'result21' => array('from' => 'productquery', 'data' => 'list'),
    'result31' => array('from' => 'productloop', 'data' => 'list'),
    'result41' => array('from' => 'productmatrix', 'data' => 'template')
  )
);

$maxperpage = $_GET['maxperpage'];
if (!$maxperpage)
  $maxperpage = 3;

$eb = new engineBox($boxdef);
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
