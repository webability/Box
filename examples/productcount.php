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

<h1>Product Count box Example</h1>

This is a very simple box:<br />
The box gets no input, and only one param which is the category.<br />
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
      'productcount' => array(
          'name' => 'productcountBox',
          'params' => array(
              'CATEGORY' => array('source' => 'local', 'data' => 'main')
            ),
          'inputs' => null,
          'outputs' => array(
              'quantity' => Box::INTEGER
            )
        )
    ),
  'links' => null,
  'output' => array('box' => 'productcount', 'output' => 'quantity')
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
