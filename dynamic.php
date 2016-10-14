/* This code is unteseted but should be close enough*/
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//setup our arguments array	
$args = array (
	'post_type'              => array( 'post' ), //post type, custom post type
	'post_status'            => array( 'publish' ), //post statues
	'category_name'          => 'CategoryName', //type in cateogry name
	'nopaging'               => false,
	'posts_per_page'         => '10', //posts per page
	'meta_query'             => array( //meta key array
		array(
			'key'       => 'MetaKeyName',
			'value'     => 'EnterMetaKeyValue',
			'compare'   => 'LIKE',
		),
	),
);

	query_posts($args);
?>
<div class="itemsContainer"><!-- If we have posts do the following-->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?><!-- If we have posts do the following-->

  <div class="item"><!-- template for each item-->
  <a href="<?php the_permalink();?>" class="postLink"><!-- permalink pointing to link for the post -->
  <?php if ( has_post_thumbnail($post->ID) ){ ?><!-- Check if post has thumbnail -->
        <div class="img">
                  <div class="topLinks">
                <div class="topLinksBox">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="topLinksBox">
                    <i class="fa fa-flag" aria-hidden="true"></i>

                </div>
            </div>
           <?php } ?><!-- End If -->
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?><!--Get the attachment/image url and store it as image -->
            <img src="<?php echo $image; ?>"> <!-- echo image url -->
        </div>
        <div class="caption">
            <div class="author"><i class="fa fa-user" aria-hidden="true"></i>
 Cool beans</div>
            <p><?php echo the_title();?></p>
        </div></a>
    </div>

<?php endwhile; else : ?>
<!-- If no posts were found do the following-->
<?php endif; ?><!-- End Post Query-->
</div><!-- End Post container-->
