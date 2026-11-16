<?php
$title = 'Graphic, web and UX design in Ponteland, Northumberland';
$description = 'Green Smoke Studio is an independent design studio in Ponteland, Northumberland, offering considered graphic, print, digital, web and user experience design.';
require __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/content.php';

// The newest published Journal post, for the "latest" link in the hero.
$latest = null;
foreach (journal_posts() as $p) {
    if ($p['has_page'] && $p['draft'] !== true) { $latest = $p; break; }
}
?>
  <div class="wrapper m0-100">
    <div class="hero-with-background-wrap hero2-wrap">
      <div class="w-layout-grid hero2-grid">
        <div id="w-node-b57a745b-9d24-e8be-e6f9-e49ad3fddd1b-e38d26fc" class="hero2-content">
          <div class="hero-title">
            <h1>Design that is <span class="text-span">considered</span> as well as <span class="text-span">creative</span>.</h1>
            <h5>Meet Green Smoke Studio. For print, digital, web and user experience design.</h5>
          </div>
          <a href="<?= $latest ? e($latest['url']) : '/the-journal' ?>" class="hero-latest w-inline-block">
            <div class="hero2-image-collection"></div>
            <div>
              <h5>The Journal</h5>
              <div class="text-block-12"><?= $latest ? e($latest['title']) : 'A place to share good news stories, updates from the studio and helpful advice on design and web topics.' ?></div>
            </div>
          </a>
          <a href="/the-journal" data-w-id="b57a745b-9d24-e8be-e6f9-e49ad3fddd2e" class="button-large hero3-button w-inline-block">
            <div class="text-block-5">Browse articles from The Journal</div><img src="/images/arrow-light2x.svg" alt="" class="button-arrow">
          </a>
        </div>
        <div id="w-node-b57a745b-9d24-e8be-e6f9-e49ad3fddd32-e38d26fc" class="hero-image">
          <a href="/services" class="hero-link-wrap w-inline-block">
            <div class="hero2-product-name">Explore services</div><img src="/images/arrow-dark2x.svg" alt="" class="button-arrow">
          </a>
        </div>
      </div>
      <div class="w-layout-grid hero2-background">
        <div id="w-node-b57a745b-9d24-e8be-e6f9-e49ad3fddd38-e38d26fc" class="hero2-image"></div>
      </div>
    </div>
  </div>
  <div class="section wrapper m100">
    <div class="content-grid">
      <div id="w-node-_63fc4bd2-b787-ab35-1a25-d998b760308c-e38d26fc" class="content16-left-column">
        <div class="content16-headline-wrap">
          <h6>12 YEARS OF DESIGN EXPERIENCE</h6>
          <h2>I design and create in a way that looks good and does good.</h2>
        </div>
        <a href="/work" data-w-id="63fc4bd2-b787-ab35-1a25-d998b7603093" class="button-small w-inline-block">
          <div class="button-h6">View recent work</div><img src="/images/arrow-light2x.svg" alt="" class="button-arrow">
        </a>
      </div>
    <p id="w-node-_63fc4bd2-b787-ab35-1a25-d998b7603097-e38d26fc">Whether you’re building a brand, in search of creative support, or have a digital project to deliver, I&#x27;m here to help. Together, we can design products and services that are sustainably made, ethically sourced, accessible and inclusive.<br><br>I believe in doing things - big or small - that make the world a bit of a better place, and support others to do the same. I belong to a community who are a force for good. Who reduce, re-use, repair, recover and recycle.<br><br>I help others to stop wasting time, money and resources. I ask ‘Could it be made better? More beautiful? For longer? For less cost to the planet and the customer?’</p>
    </div>
  </div>
  <div class="section wrapper m100">
    <div class="content-grid">
      <div id="w-node-_77bbd182-468a-7062-eb51-db8b3926698c-e38d26fc" class="content19-sticky-wrap">
        <div class="content19-image"></div>
      </div>
      <div id="w-node-_77bbd182-468a-7062-eb51-db8b3926698e-e38d26fc">
        <div class="content19-items-wrap">
          <div class="content19-headline-wrap">
            <h3>Over a decade of design industry experience</h3>
            <p>I&#x27;m multidisciplinary designer. That's a fancy way of saying I work across various kinds of design. Here&#x27;s a summary of the kind of work that I do:</p>
          </div>
          <div class="content19-item-wrap">
            <div class="deco-dot"></div>
            <div>
              <h6>WEB DESIGN AND DEVELOPMENT</h6>
              <p>From getting a new business their first site up and running, to supporting an established brand with a new look or piece of content. I&#x27;ll help out with everything from picking out a domain name (site address) to publishing your own blog post, or integrating a booking platform.</p>
            </div>
          </div>
          <div class="content19-item-wrap">
            <div class="deco-dot"></div>
            <div>
              <h6>USER EXPERIENCE (UX) DESIGN</h6>
              <p>Making improvements to your website or app not only makes for happier customers, but an improved set of performance metrics, too. I can help to alleviate pain points of your visitors, speed up the journey to your all-important end goals and make your site sustainable, at the same time.<br></p>
            </div>
          </div>
          <div class="content19-item-wrap">
            <div class="deco-dot"></div>
            <div>
              <h6>DIGITAL DESIGN</h6>
              <p class="paragraph-70">Whether a product brochure, email campaign or social media assets, I&#x27;m on hand to help you work out what tells your story best, and make it easy for you to share.<br></p>
            </div>
          </div>
          <div class="content19-item-wrap">
            <div class="deco-dot"></div>
            <div>
              <h6>PRINT DESIGN</h6>
              <p>From business cards to bespoke stationery, magazine publications to marketing material, I&#x27;m happy to help.<br></p>
            </div>
          </div>
          <div class="content19-item-wrap">
            <div class="deco-dot"></div>
            <div>
              <h6>BRANDING AND CONSULTANCY</h6>
              <p>No matter if you&#x27;re a brand-new business, or an established firm, your brand is in safe hands. From understanding your target market to point-of-sale design materials, I have the understanding and experience to support.<br></p>
            </div>
          </div>
        </div>
        <a href="/services" data-w-id="77bbd182-468a-7062-eb51-db8b392669c1" class="button-small w-inline-block">
          <div class="button-h6">Explore services</div><img src="/images/arrow-light2x.svg" alt="" class="button-arrow">
        </a>
      </div>
    </div>
  </div>
  <div class="section wrapper m100">
    <div class="w-layout-grid content-grid">
      <div id="w-node-_4a2cdaf8-cedc-8e5b-f623-3241689f6ac9-e38d26fc" class="content-headline-wrap">
        <h3>The right design can transform any business.</h3>
      </div>
      <div id="w-node-_4a2cdaf8-cedc-8e5b-f623-3241689f6acc-e38d26fc" class="image-wrap">
        <div class="content-image"></div>
      </div>
      <div id="w-node-_4a2cdaf8-cedc-8e5b-f623-3241689f6ace-e38d26fc" class="image-wrap">
        <div class="content-image2"></div>
      </div>
      <div id="w-node-_4a2cdaf8-cedc-8e5b-f623-3241689f6ad0-e38d26fc" class="content-product-name-wrap">
        <h2>Kind words from recent clients.</h2>
      </div>
      <div id="w-node-_4a2cdaf8-cedc-8e5b-f623-3241689f6ad3-e38d26fc">
        <h4>“Lauren gave so much helpful advice along the way and <em>totally took the stress away</em>. Nothing was never too much bother.” </h4>
        <p>Martha Waterton – <a href="https://www.google.com/search?q=green+smoke+studio&amp;oq=green+smoke+studio&amp;gs_lcrp=EgZjaHJvbWUqBggAEEUYOzIGCAAQRRg7Mg0IARAAGIYDGIAEGIoFMg0IAhAAGIYDGIAEGIoFMg0IAxAAGIYDGIAEGIoFMgYIBBBFGEEyBggFEEUYPDIGCAYQRRhBMgYIBxBFGEHSAQg2OTAyajBqN6gCALACAA&amp;sourceid=chrome&amp;ie=UTF-8#" target="_blank"><em class="italic-text">Google Reviews</em></a></p>
          <h4>“Lauren has the rare ability to make everyone around her better. Lauren is a true master of her UX craft.”</h4><p>David Keats-Croft – </em>
          <a href="https://www.linkedin.com/in/lauren-jane-young/" target="_blank"><em class="italic-text">LinkedIn</em></a></p>
          <h4>“Lauren’s eye for detail is second to none. Her great design is holistic and considered. I found Lauren super approachable and lovely to work with.”</h4>
          <p>Laura Mace – </em>
          <a href="https://www.google.com/search?q=green+smoke+studio&amp;oq=green+smoke+studio&amp;gs_lcrp=EgZjaHJvbWUqBggAEEUYOzIGCAAQRRg7Mg0IARAAGIYDGIAEGIoFMg0IAhAAGIYDGIAEGIoFMg0IAxAAGIYDGIAEGIoFMgYIBBBFGEEyBggFEEUYPDIGCAYQRRhBMgYIBxBFGEHSAQg2OTAyajBqN6gCALACAA&amp;sourceid=chrome&amp;ie=UTF-8#" target="_blank"><em class="italic-text">Google Reviews</em></a></p>
      </div>
    </div>
  </div>
<?php include __DIR__ . '/includes/footer.php'; ?>
