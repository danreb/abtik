<header id="header" class="top row-fluid"><!--/header -->

<?php if ($page['top'] || $page['userbar1'] || $page['userbar2']) : ?>
  <section id="top" class="shaded row-fluid">
    <div class="container misc">
      
      <?php if ($page['top']) : ?>
        <div id="top-most" class="span12">
          <?php print render($page['top']); ?>
        </div> <!--/ top-most -->
      <?php endif; ?>
      
      <?php if ($page['userbar1'] || $page['userbar2']) : ?>
        <div id="user-bar" class="user-bar row-fluid">
          <?php if ($page['userbar1']) : ?>
           <div class="userbar-1 <?php print abtik($page['userbar2'], 8, 12); ?>">
             <?php print render($page['userbar1']); ?>
           </div>
         <?php endif; ?>
         
         <?php if ($page['userbar2']) : ?>
           <div class="userbar-2 <?php print abtik($page['userbar1'], 4, 12); ?>">
             <?php print render($page['userbar2']); ?>
           </div>
         <?php endif; ?>
        </div><!--/ user-bar -->
      <?php endif; ?>
      
    </div>
  </section><!--/ top -->
<?php endif; ?>

<?php if ($page['branding'] || $page['header'] || $logo || $site_name || $site_slogan) : ?>
  <section id="branding" class="branding row-fluid">
    <div class="container">
    
    <?php if ($page['branding'] || $logo || $site_name || $site_slogan) : ?>
    <div id="brands" class="<?php print abtik($page['header'], 8, 12); ?>">
      <div class="row-fluid">
      <?php if ($logo): ?>
        <div id="logo" class="<?php print abtik(($site_name || $site_slogan), 3, 12); ?>">
          <a href="<?php print $front_page; ?>" title="<?php print $site_name ? $site_name : t('home'); ?>" rel="home">
            <img src="<?php print $logo; ?>" alt="<?php print $site_name ? $site_name : t('home'); ?>" />
          </a>
        </div>
      <?php endif; ?>
    
      <?php if ($site_name || $site_slogan) : ?>
        <div id="site-name-slogan" class="<?php print abtik($logo, 9, 12); ?>">
          <?php if ($site_name && $site_slogan) : print '<hgroup>'; endif; ?>
            <?php if ($site_name): ?>
              <h1 class="site-name">
                <a href="<?php print $front_page; ?>">
                  <?php print $site_name; ?>
                </a>
              </h1>
             <?php endif; ?>
      
            <?php if ($site_slogan) : if ($site_name) : ?>
              <h2 class="site-slogan">
                <span><?php print $site_slogan; ?></span>
              </h2> 
             <?php else : // use h1 if no sitename ?>
               <h1 class="site-slogan">
                 <span><?php print $site_slogan; ?></span>
               </h1>
             <?php endif; endif; ?>
          <?php if ($site_name && $site_slogan) : print '</hgroup>'; endif; ?>
        </div>
      <?php endif; ?>
      </div>
      <?php if ($page['branding']) : print render($page['branding']); endif; ?>
      </div>
      <?php endif; ?>
      
      <?php if ($page['header']) : ?>
        <div id="more-information" class="<?php print abtik(($logo || $site_name || $site_slogan), 4, 4, $page['branding']); ?>">
          <?php print render($page['header']); ?>
        </div>
      <?php endif; ?>
      
    </div>
  </section><!--/ branding -->
<?php endif; ?>
 
<?php if ($main_menu || $page['site_search']) : ?>   
  <section id="menu-search-breadcrumb" class="theme-menu row-fluid">
    <div class="container">
 
      <?php if ($main_menu): ?>
        <nav id="abtik-nav" class="<?php print abtik($page['site_search'], 9, 12); ?>">
          <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'abtik-main-menu', 'class' => array('abtik-main-menu', 'inline')))); ?>   
        </nav>
      <?php endif; ?>
      
      <?php if ($page['site_search']) : ?>
        <div id="site-search" class="<?php print abtik($main_menu, 3, 12); ?>">
          <?php print render($page['site_search']); ?>
        </div>
      <?php endif; ?>   
    
    </div>
  </section><!--/ theme-menu -->
<?php endif; ?>

<?php if ($page['header_first'] || $page['header_second'] || $page['header_third']) : ?>
  <section id="header-column" class="header-column row-fluid">
    <div class="container">
      
        <?php if ($page['header_first']) : ?>
          <div id="header-column-1" class="header-first <?php print abtik($page['header_second'], 4, 6, $page['header_third']); ?>">
            <?php print render($page['header_first']); ?>
          </div>
        <?php endif; ?>
        
        <?php if ($page['header_second']) : ?>
          <div id="header-column-2" class="header-second <?php print abtik($page['header_first'], 4, 6, $page['header_third']); ?>">
            <?php print render($page['header_second']); ?>
          </div>
        <?php endif; ?>
        
        <?php if ($page['header_third']) : ?>
          <div id="header-column-3" class="header-third <?php print abtik($page['header_first'], 4, 6, $page['header_second']); ?>">
            <?php print render($page['header_third']); ?>
          </div>
        <?php endif; ?> 

    </div> 
  </section><!--/ header-column -->
<?php endif; ?>

</header><!--/ end header -->

<section id="main-content" class="row-fluid middle"> <!--/ main content -->
  <div id="content-wrapper" class="content-wrapper">
  
    <?php if ($page['menu']): ?>
      <nav class="row-fluid" id="navigation" role="navigation">
        <div class="container">
          <?php print render($page['menu']); ?>
        </div>
      </nav>
    <?php endif; ?>
    
    <?php if ($page['promotions']) : ?>
      <section class="row-fluid" id="promotions">
        <div class="container">
          <?php print render($page['promotions']); ?>
        </div>
      </section>
    <?php endif; ?>
    
    <?php if ($page['topcolumn1'] || $page['topcolumn2'] || $page['topcolumn3']) : ?>
      <section class="row-fluid" id="featured-services">
        <div class="container">
        <?php if ($page['topcolumn1']) : ?>
          <div class="<?php print abtik($page['topcolumn2'], 4, 6, $page['topcolumn3']); ?>">
            <?php print render($page['topcolumn1']); ?>
          </div>
        <?php endif; ?>
        
        <?php if ($page['topcolumn2']) : ?>
          <div class="<?php print abtik($page['topcolumn1'], 4, 6, $page['topcolumn3']); ?>">
            <?php print render($page['topcolumn2']); ?>
          </div>
        <?php endif; ?>
        
        <?php if ($page['topcolumn3']) : ?>
          <div class="<?php print abtik($page['topcolumn1'], 4, 6, $page['topcolumn2']); ?>">
            <?php print render($page['topcolumn3']); ?>
          </div>
        <?php endif; ?>      
       </div>
      </section>
    <?php endif; ?>
    
    <section class="row-fluid" id="main" role="document">
      <div class="container">
      <?php if ($page['sidebar_first']): ?>
        <aside class="span4" id="sidebar-first">
          <?php print render($page['sidebar_first']); ?>
        </aside>
      <?php endif; ?>
      
      <article class="<?php print abtik($page['sidebar_first'], 4, 8, $page['sidebar_second']); ?>" id="article-content" role="article">
        <?php if ($tabs): print render($tabs); endif; ?>
        <?php if ($messages): print $messages; endif; ?>
        <?php if ($title): ?><h<?php print $site_name ? 2 : 1; ?> class="main-content-title"><?php print $title; ?></h<?php print $site_name ? 2 : 1; ?>><?php endif; ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
        
        <?php if ($page['column_1'] || $page['column_2']) : ?>
          <div class="row-fluid content-bottom">
          
            <?php if ($page['column_1']) : ?>
              <aside class="<?php print abtik($page['column_2'], 8, 12); ?>">
                <?php print render($page['column_1']); ?>
              </aside>
            <?php endif; ?>
        
            <?php if ($page['column_2']) : ?>
              <aside class="<?php print abtik($page['column_1'], 4, 12); ?>">
                <?php print render($page['column_2']); ?>
              </aside>
            <?php endif; ?>
                      
          </div>
        <?php endif; ?>
        
        <?php if ($page['content_bottom']) : ?>
          <div class="raw-fluid">
            <?php print render($page['content_bottom']); ?>
          </div>
        <?php endif; ?>
         
      </article>

      <?php if ($page['sidebar_second']): ?>
        <aside class="span4" id="sidebar-second">
          <?php print render($page['sidebar_second']); ?>
        </aside>
      <?php endif; ?>
     </div>
    </section><!--/ main -->    
 </div><!--/ content-wrapper -->

 <?php if ($page['post_scripts_1'] || $page['post_scripts_2'] || $page['post_scripts_3'] || $page['post_scripts_4']) : ?>
    <section id="post-scripts" class="row-fluid">
     <div class="container">
      <div class="post-scripts span6">
        <div class="row-fluid">
        
          <?php if ($page['post_scripts_1']) : ?>
            <div class="<?php print abtik($page['post_scripts_2'], 6, 12); ?>">
              <?php print render($page['post_scripts_1']); ?>
            </div>
          <?php endif; ?>
          
          <?php if ($page['post_scripts_2']) : ?>
            <div class="<?php print abtik($page['post_scripts_1'], 6, 12); ?>">
              <?php print render($page['post_scripts_2']); ?>
            </div>
          <?php endif; ?>
          
        </div>
      </div>
      
      <div class="post-scripts span6">
        <div class="row-fluid">
        
          <?php if ($page['post_scripts_3']) : ?>
            <div class="<?php print abtik($page['post_scripts_4'], 6, 12); ?>">
              <?php print render($page['post_scripts_3']); ?>
            </div>
          <?php endif; ?>
          
          <?php if ($page['post_scripts_4']) : ?>
            <div class="<?php print abtik($page['post_scripts_3'], 6, 12); ?>">
              <?php print render($page['post_scripts_4']); ?>
            </div>
          <?php endif; ?>
          
        </div>
      </div>
     </div> 
    </section><!--/ end post_scripts -->
 <?php endif; ?>

</section> <!--/ end main content -->

<?php if ($page['footer']) : ?>
  <footer id="footer" class="row-fluid bottom"><!--/footer -->
    <div class="container">
      <div class="span12">
        <?php print render($page['footer']); ?>
      </div>
    </div>
  </footer> <!--/ end footer -->
<?php endif; ?>

<?php if (theme_get_setting('footer_credits')): ?>
  <section id="credits" class="row-fluid"><!--/ credits -->
    <div class="container">
      <div class="span12">
      <?php 
      $footer_credits_url = explode('|', check_plain(theme_get_setting('footer_credits_url'))); 
      if(isset($footer_credits_url[1])) {
      	$footer_credits_url = l($footer_credits_url[1], $footer_credits_url[0]);
      } else {
      	$footer_credits_url = l('Abtik Base Theme','http://github.com/danreb/abtik',array('title' => 'Doing it fast!'));
      }
      ?>
        <span class="credits"><?php print t(theme_get_setting('footer_credits_label')) . $footer_credits_url;?></span>
        
      </div>
    </div>
  </section><!--/ end credits -->
<?php endif; ?>