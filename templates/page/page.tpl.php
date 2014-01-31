<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>


<?php /*
<div id="redline-nav"></div>
<a id="gridtoggle" href="#">GRID</a><div id="grid"></div>
<div id="redline-first" class="redline"></div>
<div id="redline-second" class="redline"></div>
*/ ?>

<div id="page">

  <header id="header" role="banner">

    <?php if ($logo): ?>
      <div id="header-logo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" />
        </a>
      </div>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div class="header__name-and-slogan" id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header__site-name" id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <nav id="navigation" role="navigation">
      <?php print render($page['navigation']); ?>
    </nav><!-- /nav -->

  </header>

  <div id="main">
    <div class="inner">

      <div id="content" role="main">
        <?php print render($page['highlighted']); ?>

        <?php print $breadcrumb; ?>
        <a id="main-content"></a>
        <?php print render($page['content_top']); ?>

        <?php if(isset($node) && $node->type !== 'team_member'): ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
        <?php elseif(!isset($node)): ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
        <?php endif; ?>

        <?php print $messages; ?>
        <?php print render($tabs); ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
        <?php print render($page['content_bottom']); ?>

      </div><!-- /#content -->

      <?php
        // Render the sidebars to see if there's anything in them.
        $sidebar_first  = render($page['sidebar_first']);
        $sidebar_second = render($page['sidebar_second']);
      ?>

      <?php if ($sidebar_first): ?>
        <?php print $sidebar_first; ?>
      <?php endif; ?>

      <?php print render($page['background']); ?>

      <div id="content-fade"></div>

    </div><!-- /.main-inner -->
  </div><!-- /#main -->

  <?php if ($sidebar_second): ?>
    <?php print $sidebar_second; ?>
  <?php endif; ?>

  <?php print render($page['footer']); ?>

</div><!-- /#page -->

<?php print render($page['bottom']); ?>
