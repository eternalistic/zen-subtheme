<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<header id="header" role="banner">
  <div class="header__inner">

    <?php if ($logo): ?>
      <div class="header-logo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header-logo__link">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header-logo__image" />
        </a>
      </div>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div class="header-name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header-name-and-slogan__name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header-name-and-slogan__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header-name-and-slogan__slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php print render($page['header']); ?>
    <?php print render($page['navigation']); ?>

  </div><!-- /.header__inner -->

</header>

<?php print render($page['preface']); ?>

<div class="layout-container">
  <div id="main">
    <div class="main__inner">
      <div class="main-content" role="main">
        <?php print render($page['highlighted']); ?>
        <?php print $breadcrumb; ?>
        <a id="main-content"></a>

        <?php if(isset($node) && !$is_front): ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h1 class="page__title title"><?php print $title; ?></h1>
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
        $sidebar_first  = '' . render($page['sidebar_first']) . '';
        $sidebar_second = render($page['sidebar_second']);
      ?>

      <?php if ($sidebar_first || $sidebar_second): ?>
        <div class="sidebars">
          <?php if ($sidebar_first): ?>
            <aside class="region-sidebar-first" role="complementary">
              <?php print $sidebar_first; ?>
            </aside>
          <?php endif; ?>

          <?php if ($sidebar_second): ?>
            <aside class="region-sidebar-second" role="complementary">
              <?php print $sidebar_second; ?>
            </aside>
          <?php endif; ?>
        </div>
      <?php endif; ?>

    </div><!-- /.main__inner -->
  </div><!-- /#main -->
</div><!-- /.layout-container -->

<?php print render($page['postscript']); ?>
<?php print render($page['footer']); ?>
<?php print render($page['bottom']); ?>
