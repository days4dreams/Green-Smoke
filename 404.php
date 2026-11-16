<?php
$title = 'Page not found';
$description = 'The page you were looking for has been deleted, moved or doesn\'t exist.';
$wfPage = '6641f8343f7a005d7550b3cc';
http_response_code(404); // tell browsers and Google this page doesn't exist
require __DIR__ . '/includes/head.php';
?>
  <div class="wrapper m100-50">
    <div class="section">
      <div class="w-layout-grid headline-grid">
        <div id="w-node-bcbd9f88-ca42-6bca-8659-1e68f3ca050e-7550b3cc">
          <p class="label">PAGE DOES NOT EXIST</p>
          <h1>Page not found.</h1>
          <p>Oh dear. The page you looking for has been deleted, moved or doesn’t exist. You should be able to get where you intended using the site navigation, if not reach out and let me know, I&#x27;ll get it fixed!</p>
        </div>
      </div>
    </div>
  </div>
<?php include __DIR__ . '/includes/footer.php'; ?>
