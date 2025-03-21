<?php
/**
 * Title: Photo with latest posts
 * Slug: blankspace/banner-latest-posts
 * Categories: query
 * Block Types: core/query
 * Viewport width: 1400
 * Description: A list of posts, 3 columns, with only featured images.
 *
 */
?>

<!-- wp:pattern {"slug":"blankspace/hidden-heading-kicker-latest-posts"} /-->
 
<!-- wp:latest-posts {"postsToShow":3,"displayPostContent":true,"displayAuthor":true,"displayPostDate":true,"postLayout":"grid","displayFeaturedImage":true,"featuredImageSizeSlug":"large","addLinkToFeaturedImage":true,"align":"wide","TrpContentRestriction":{"restriction_type":"exclude","selected_languages":[],"panel_open":false}} /-->
 
<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"align":"right"} -->
<p class="has-text-align-right"><a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" data-type="page" data-id="<?php esc_html( get_option( 'page_for_posts' ) ); ?>"><?php esc_html_e( 'Read all articles', 'blankspace' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->