<?php

/**
 * Block: Container
 * - Slug: container
 * - Docs: https://www.billerickson.net/innerblocks-with-acf-blocks/
 */

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : uniqid($block['id']));
$blocks_allowed = array(
    'acf/container',
);
$blocks_template = array(
    array('acf/container', array()),
);

$blockData = array(
    'vertical_padding' => get_field('vertical_padding') ?? 'default',
    'section_edge' => get_field('section_edge') ?? ''
);

/***** ADMIN LABEL *****/
echo bansheeStarter_blockAdminHead($block);

$classes = [ 'block--section' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}
if ( ! empty( $block['align'] ) ) {
	$classes[] = 'align' . $block['align'];
}
if ( ! empty( $block['backgroundColor'] ) ) {
    // starter colors
    $colorParts = explode('-', $block['backgroundColor']);
    $transformedColor = implode('', array_map('ucwords', $colorParts));
	$classes[] = 'u-bgColor' . $transformedColor;
    if($transformedColor == 'Black' || $transformedColor == 'Blue' || $transformedColor == 'Red' || $transformedColor == 'Green'){
        $classes[] = 'u-darkMode';
    }
}else{
	$classes[] = 'u-bgColorWhite';
}
if ( ! empty( $block['textColor'] ) ) {
    if ($block['textColor'] == 'white') {
        $classes[] = 'u-darkMode';
    }
    $colorParts = explode('-', $block['textColor']);
    $transformedColor = implode('', array_map('ucwords', $colorParts));
	$classes[] = 'u-textColor' . $transformedColor;
}

if ($blockData['vertical_padding']) {
    $classes[] = 'block--padding-'.$blockData['vertical_padding'];
}

if ($blockData['section_edge']) {
    $section_edge = 'block--subwayTile';
    $classes[] = $section_edge;
}

?>

<section id="<?php echo $blockID; ?>" class="block  <?php echo join( ' ', $classes ) ?>">
    <InnerBlocks 
        allowedBlocks="<?php echo esc_attr(wp_json_encode($blocks_allowed)); ?>" 
        template="<?php echo esc_attr(wp_json_encode($blocks_template)); ?>" 
    />
</section>