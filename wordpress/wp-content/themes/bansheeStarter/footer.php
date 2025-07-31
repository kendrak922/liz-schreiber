<?php

use Lean\Load;

/**
 * The template for displaying the footer
 */
global $themeGlobals;

// organism variables
$footerData = [
    'logo'        => get_field('footer_logo', 'options') ? get_field('footer_logo', 'options') : get_field('site_logo', 'options'), // media object
    'nav'        => [
        'theme_location'    => 'footer-menu',
        'depth'                => 2,
        'menu_class'        => 'menu menu--footer',
        'walker'            => new bansheeStarter_nav_walker_footer()
    ]
];

$button = get_field('button', 'options');
// $social_links = get_field('socials', 'options');
$socials = get_field('socials', 'options');
$footer_text = get_field("footer_text", 'option');
$footer_email = get_field("email", 'option');
$footer_link = get_field("footer_link", 'option');


?>

<?php /*****
       * END: MAIN CONTENT 
       ******/ ?>
</main>
<?php // Opened in header.php 
?>

<footer id="footer" class="footer <?php echo $args && $args['hasSidebar']?'has-sidebar':'';?> ">
    <?php /*****
           * FOOTER MAIN 
           ******/ ?>
    <section class="footer__main">
        <div class="container container--ultra-wide">
            <div class="footer__logo">
                <a href="<?php bloginfo('url'); ?>"  aria-label="Link to homepage">
                    <?php if (get_field('global_imagery', 'options')['footer_logo']) : $logo = get_field('global_imagery', 'options')['footer_logo']; ?>
                            <img height="308px" width="550px" src="<?php echo $logo['url']; ?>" alt="Banshee Starter Logo">
                    <?php elseif (file_exists($themeGlobals['theme_rel'] . '/assets/dist/imgs/logo-footer.png')) : ?>
                            <img height="308px" width="550px" src="<?php echo $themeGlobals['theme_url']; ?>/assets/dist/imgs/logo-footer.png" alt="Banshee Starter Logo" class="u-lg-block" />               
                    <?php else : ?>
                            <strong><?php echo bloginfo('title'); ?></strong>
                    <?php endif; ?>
                </a>
            </div>
            <div class="footer__content">
                        <?php if($footer_email) : ?>
                            <div class="footer__contact">
                                <?php if($footer_text) : ?>
                                    <div class="footer__text">
                                        <p class="text text-lg"><?php echo $footer_text;?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if($footer_link) : ?>
                                    <div class="footer__button">
                                        <a class="btn btn--primary btn--medium" href="<?php echo $footer_link?>" target="_blank">Sign up on substack</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                            <?php /* Footer Menu */ ?>
                            <?php if($socials) : ?>
                                        <div class="footer__social social">
                                            <h3 class="h3">Follow us</h3>
                                            <nav class="menu--footer menu" aria-label="Social Media Menu">
                                                <?php foreach($socials as $social) : ?>
                                                        <?php 
                                                            $link = $social['social_link'];
                                                            $title = $social['social_title'];
                                                        
                                                        ?>
                                                        <a href="<?php echo $link; ?>" target="_blank">
                                                            <?php echo $title; ?>
                                                        </a>
                                                <?php endforeach;?>
                                            </nav>
                                        </div>
                            <?php endif; ?>
                </div>
                <div class="footer__bottom">
                <nav class="menu-wrapper__content"  aria-label="Site Navigation" >
                                        <?php /*****
                                               * Menu 
                                               *****/ ?>
                                        <?php
                                        $header_nav = [
                                        'theme_location'    => 'footer-menu',
                                        'menu_class'        => 'menu--footer menu',
                                        'walker'            => new bansheeStarter_nav_walker()
                                        ];
                                        wp_nav_menu($header_nav); ?>
                                    </nav>
                </div>
        </div>
    </section>

    <?php // WP Footer 
    ?>
    <?php wp_footer(); ?>

</footer>

</div> <?php // END: .wrapper - opened in header.php 
?>
</body>

</html>