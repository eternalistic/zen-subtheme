<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for more information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   zen_subtheme_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: zen_subtheme_field()
 *
 *   where STARTERKIT is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Override or insert variables into the html template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered. This is usually "html", but can
 *   also be "maintenance_page" since zen_preprocess_maintenance_page() calls
 *   this function to have consistent variables.
 */
function zen_subtheme_preprocess_html(&$vars) {

  global $base_path;

  // Add path to theme
  $vars['path_to_theme'] = drupal_get_path('theme', 'zen_subtheme');

  // Apple touch icon
  // $appleIcon = array('#tag' => 'link', '#attributes' => array('href' => $base_path . $vars['path_to_theme'] . '/apple-touch-icon.png', 'rel' => 'apple-touch-icon'),);
  // drupal_add_html_head($appleIcon, 'apple-touch-icon');

}


/** 
 * Implements hook_preprocess_page().
 */
// function zen_subtheme_preprocess_page(&$vars) {

//   // global $base_path;

//   // Add path to theme
//   $vars['path_to_theme'] = drupal_get_path('theme', 'zen_subtheme');

//   // Logo - SVG
// 	$vars['logo'] = $base_path . $vars['path_to_theme'] . '/logo.svg';

// }


/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
// function zen_subtheme_preprocess_node(&$vars, $hook) {

//   // print dsm($vars);

//   $node = $vars['node'];

//   switch ($node->type) {

//     // Case study
//     case 'case_study':

//       switch ($vars['view_mode']) {

//         case 'teaser':

//         	// Remove title
// 					$vars['title'] = '';

//           // Add read more to body suffix
//           $vars['content']['body']['#suffix'] = l(t('> View case study'), 'node/' . $node->nid, array('html' => TRUE, 'attributes' => array('class' => 'readmore')));

//           // Unset variables
// 					unset($vars['content']['field_company']);

//       	break;
//     }
//     break;

//   }
// }


/**
 * Implements hook_breadcrumb
 */
function zen_subtheme_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $crumb_arrow = '<span class="crumbs-divider"> / </span>';

  if (!empty($breadcrumb)) {
    $array_size = count($breadcrumb);
    while ($array_size > 2):
      array_pop($breadcrumb);
      $array_size--;
    endwhile;

    $arr_crumbs = array();
    array_push($arr_crumbs, '<span class="crumbs">' . implode($crumb_arrow, $breadcrumb) . '</span>');

    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= array_pop($arr_crumbs);

  	return '<div class="breadcrumb">' . $output . '</div>';
  }

}