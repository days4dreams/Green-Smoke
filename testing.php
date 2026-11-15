<!DOCTYPE html>
<html data-wf-page="6641f2fe778c07a55387e918" data-wf-site="663f659b3bb82a36e38d26f1">
<head>
  <meta charset="utf-8">
  <title>Test Page</title>
  <meta content="Test Page" property="og:title">
  <meta content="Test Page" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="../css/webflow.css" rel="stylesheet" type="text/css">
  <link href="../css/style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="../images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="../images/webclip.png" rel="apple-touch-icon">
  <?php $pagedepth = 0; ?>
</head>
<body>
  <?php include "includes/nav.php" ?>
   <p>DOCUMENT_ROOT: <?php echo $_SERVER["DOCUMENT_ROOT"] ?></p>
   <p>SCRIPT_FILENAME: <?php echo $_SERVER["SCRIPT_FILENAME"] ?></p>
   <p>PHP_SELF: <?php echo $_SERVER["PHP_SELF"] ?></p>
   <p>current directory name only: <?php echo basename(__DIR__); ?></p>
   <p>current file name only: <?php echo basename(__FILE__); ?></p>
   <p>parent directory name only: <?php echo basename(dirname(__FILE__)); ?></p>
  <div class="wrapper m0-50">
    <?php include "includes/footer.php" ?>
  </div>
</body> 