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

<h1>Product pagination box Example</h1>

This is a native standard box:<br />
It has 2 functions:<br />
1. Calculate the index and quantity of elements to get from the original data (in sight to make a query with limits)<br />
2. Calculate the pagination template based on the first data.<br />
The box gets one input, the quantity of elements of the original data.<br />
The parameters for pagination are:<br />
- MAXPERPAGE: quantity of elements per page.
The output gives us the quantity of product in our category.<br />
The box simulates a database with 2 product categories:<br />
- 'main', with 5 products,<br />
- 'other', with 3 products.<br />
<br />

-----<br />
|   |<br />
-----<br />

<hr />

We simulate the parameter CATEGORY comes from the URL with value 'main'.<br />
Result of the box:

<?php

// We assure any Box library we call will be automatically loaded
include_once '../include/__autoload.lib';

setlocale(LC_ALL, 'es_MX.UTF8');
date_default_timezone_set('America/Mexico_City');

define('WADEBUG', false);
WADebug::setLevel(WADebug::SYSTEM);

$boxdef = array(
  'boxes' => array(
      'productpage' => array(
          'name' => 'paginationBox',
          'params' => array(
    $this->addParam('VARPAGE', Box::STRING, 'page');
    $this->addParam('DEFAULTPAGE', Box::INTEGER, 1);
    $this->addParam('VARMAXPERPAGE', Box::STRING, '');
    $this->addParam('MAXPERPAGE', Box::INTEGER, null);
    $this->addParam('PAGENUMLEFT', Box::INTEGER, 1);
    $this->addParam('PAGENUMCENTER', Box::INTEGER, 1);
    $this->addParam('PAGENUMRIGHT', Box::INTEGER, 1);


              'CATEGORY' => array('source' => 'inline', 'data' => 'main')
            ),
          'inputs' => array(
    $this->addInput('quantity', Box::INTEGER);
    $this->addInput('language', Box::LANGUAGE);
    $this->addInput('template', Box::TEMPLATE);

            ),
          'outputs' => array(
    $this->addOutput('min', Box::INTEGER);
    $this->addOutput('num', Box::INTEGER);
    $this->addOutput('template', Box::TEMPLATE);
              'quantity' => Box::INTEGER
            )
        )
    ),
  'output' => array('box' => 'productpage', 'output' => '')
);

$be = new boxEngine($boxdef, $category);
$result = $be->getOutput();
print $result;

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
