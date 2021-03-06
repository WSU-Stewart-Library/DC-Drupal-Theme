<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<div id="bg-wrapper">
<div id="lg-container" class="container">
		
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?> top-bar">
  <div class="container-fluid">
    <div class="navbar-header col-xs-12 col-sm-6 col-md-5 col-lg-5">
      
      <!--  DISPLAY STEWART LIBRARY LOGO -->
      <?php if ($logo): ?>
          <div class="logo navbar-btn pull-left">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" usemap="#slLogo"/>
              <map name='slLogo'>
                <area  alt="" title="Weber State University" href="http://www.weber.edu" shape="rect" coords="0,0,53,54" style="outline:none;" target="_self"     />
                <area  alt="" title="WSU Digital Collection" href="https://library.weber.edu" shape="rect" coords="56,6,304,54" style="outline:none;" target="_self"     />
              </map>
              </div>
          <?php endif; ?>
          <!-- END DISPLAY STEWART LIBRARY LOGO -->

          <!-- DISPLAY SITE NAME -->
          <?php if (!empty($site_name)): ?>
            <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
          <?php endif; ?>
          <!-- END DISPLAY SITE NAME -->
    </div>

    <div class="col-xs-12 col-sm-6" id="DC-logo">

          <!-- DISPLAY DIGITAL COLLECTION SITE TITLE -->
          <div class="dc_logo" >
        	<a href="<?php print $base_path; ?>"><img alt="" class="digital_collections_logo" src="<?php print $base_path . 'sites/all/themes/wsu_dc/images/dc_logo.png'; ?>" style="height:58px; width:255px" /></a>
          </div>
          <!-- END DISPLAY DIGITAL COLLECTION SITE TITLE -->        
    </div>
  </div>

  <!-- DISPLAYS MENU OPTIONS -->
  <div class="container-fluid" id="menu-container">
          <div class="container-fluid" id="megaMenu_slot">
                  <nav role="navigation">
                          <?php if (!empty($page['mega_menu'])): ?>
                                  <div id="mega-menu">
                                          <?php print render($page['mega_menu']); ?>
                                  </div>
                          <?php endif; ?>
                  </nav>
          </div>
  </div>
  <!-- END DISPLAYS MENU OPTIONS -->

  <!-- FEATURED IMAGE -->
  <div id="featured-image" class="container-fluid">
    <?php if (!empty($page['featured_image'])): ?>
      <?php print render($page['featured_image']); ?>
    <?php endif; ?>
  </div>
  <!-- END FEATURED IMAGE -->

  <!-- GLOBAL SEARCH -->
<div id="global-search" class="container-fluid">
  <?php if (!empty($page['global_search'])): ?>
    <?php print render($page['global_search']); ?>
  <?php endif; ?>
</div>
<!-- END GLOBAL SEARCH -->
</header>

<div class="main-container <?php print $container_class; ?>">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h2 class="title" id="page-title">
          <?php print $title; ?>
        </h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      
      <?php if(!empty($page['content'])) : ?> 
        <?php if(drupal_is_front_page()) { ?>
          <?php unset($page['content']['system_main']['default_message']); ?>
        <?php } ?>
        <?php print render($page['content']); ?>
      <?php endif; ?>

    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>
</div><!-- end lg-container -->
</div><!-- end big-wrapper -->

<!-- FOOTER -->
<div id="footer" class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4">
      <?php if (!empty($page['footer1'])): ?>
        <footer class=" <?php print $container_class; ?>">
            <?php print render($page['footer1']); ?>
        </footer>
      <?php endif; ?>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-4">
      <?php if (!empty($page['footer2'])): ?>
        <footer class=" <?php print $container_class; ?>">
            <?php print render($page['footer2']); ?>
        </footer>
      <?php endif; ?>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-4">
      <?php if (!empty($page['footer3'])): ?>
        <footer class=" <?php print $container_class; ?>">
            <?php print render($page['footer3']); ?>
        </footer>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- END FOOTER -->

<!-- STEWART LIBRARY FOUNDATION -->
<div id="ste_edu_foundation">
  <div class="row">
    <div class="col-xs-12">
      <?php if (!empty($page['footer4'])): ?>
        <footer class="footer <?php print $container_class; ?>">
            <?php print render($page['footer4']); ?>
        </footer>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- END STEWART LIBRARY FOUNDATION -->