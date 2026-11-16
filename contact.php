<?php
$title = 'Contact';
$description = 'Get in touch with Green Smoke Studio, an independent design studio in Ponteland, Northumberland. Local to the North East? Let\'s meet for a coffee.';
$wfPage = '6641f8befd0856ee1936834c';
require __DIR__ . '/includes/head.php';
?>
  <div class="wrapper m100-80">
    <div class="section">
      <div class="w-layout-grid headline-grid">
        <div id="w-node-_5a48a308-2426-3bd2-d7b0-9b78e8791812-1936834c">
          <p class="label">Contact</p>
          <h1>Say hello to Green Smoke Studio.</h1>
          <h5>Local to the North East? Let&#x27;s meet for a coffee. Those further afield are welcome to email or connect on social media.</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="divider"></div>
    <div class="w-layout-grid content23-grid">
      <div id="w-node-_4e659e8c-17fb-6a25-20fb-07cfdb3a804b-1936834c" class="content23-item-wrap">
        <div class="content23-item">
          <h3>Registered Address</h3>
          <p><?= implode('<br>', array_map('e', $site['address'])) ?></p>
        </div>
      </div>
      <div id="w-node-_4e659e8c-17fb-6a25-20fb-07cfdb3a8057-1936834c" class="content23-item-wrap">
        <div class="content23-item">
          <h3>Contact details</h3>
          <p>LinkedIn<br>
            <a href="<?= e($site['social']['linkedin']) ?>" target="_blank">linkedin.com/in/lauren-jane-young<br></a><br>Email <br>
            <a href="mailto:<?= e($site['email']) ?>?subject=Website%20contact"><?= e($site['email']) ?><br></a>
          </p>
        </div>
      </div>
    </div>
  </div>
<?php include __DIR__ . '/includes/footer.php'; ?>
