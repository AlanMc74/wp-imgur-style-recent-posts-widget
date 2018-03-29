<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       mybigbadself.com
 * @since      1.0.0
 *
 * @package    Imgur_Style_Recent_Posts
 * @subpackage Imgur_Style_Recent_Posts/admin/partials
 */

/*
$sortedby = "<span class='imgurSortedBy'>Sorted by Latest</span>";
echo $args['before_widget'];
if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] . $sortedby;
}
echo esc_html__( 'Hello, World!', 'text_domain' );
echo $args['after_widget']; 
*/

$sortedby = "Latest";
$jsonURL = get_site_url() . "/wp-json/wp/v2/posts";
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php echo $args['before_widget']; ?>
<div class="imgurRecentPostsWidgetWrapper" data-jsonurl="<?php echo $jsonURL; ?>">
    <div class="imgurRecentPostsWidgetTitle">
        <?php if ( ! empty( $instance['title'] ) ) { ?>
            <h2><?php  echo  apply_filters( 'widget_title', $instance['title'] ); ?> <i class="imgurSelectLayout menu-grid icon-th"></i> <i class="imgurSelectLayout menu-list icon-th-list"></i></h2>
        <?php  }else { ?>
                <h2>Imgur Style Recent Posts</h2>
        <?php     }   ?>
        <span class="imgurStyleSortedBy">Sorted By <?php  echo  $sortedby ?></span>
    </div>
    <div class="imgurRecentPostsWidgetBody">
        <div class="imgurRecentPostsWidgetFixed">

        </div>
    </div>
</div>
<?php echo $args['after_widget']; ?>


