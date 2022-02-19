<?php
/**
 * Widget RS Popular Widget
 *
 * @package rsframework
 * @author Rs Theme
 * @link http://rstheme.com
 */

// Register and load the widget
function wpb_load_widget2() {
    register_widget( 'rsframework_popular_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget2' );
 
// Creating the widget 
class rsframework_popular_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'wpb_widget2', 
 
// Widget name will appear in UI
__('RS Popular Posts Widget', 'rsframework'), 
 
// Widget description
array( 'description' => __( 'RS Popular Posts Widget with different options', 'rsframework' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Popular Posts','rsframework' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
    $title    = apply_filters( 'widget_title', $title, $instance, $this->id_base );
    
    $category = ( ! empty( $instance['category'] ) ) ? ( $instance['category'] ) : "";
    
    $number   = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;

		if ( ! $number )
		$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		
		$show_featured_image = isset( $instance['show_featured_image'] ) ? $instance['show_featured_image'] : false;

		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the Popular Posts.
		 */
        if(!empty($category)):
    		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'meta_key'            => 'vloglab_wpb_post_views_count',
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
               
    		) ) );
        else:
            $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'meta_key'            => 'vloglab_wpb_post_views_count',
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            ) ) );
        endif;
     
    ?>

    <div class="recent-widget main-sidebar widget"> 
		<?php
        if ($r->have_posts()) :
        ?>      
        <?php if ( $title )
        {
          echo wp_kses_post($args['before_title'] . $title . $args['after_title']);
        } ?>
        
        <div class="recent-post-widget clearfix">
          <?php while ( $r->have_posts() ) : $r->the_post(); ?>
          <?php if ($show_featured_image ) { ?>
            <div class="show-featured clearfix">
                <div class="post-img"> 
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('vloglab_thumbnail_size'); ?>
                    </a> 
                </div>
                <div class="post-item">

                    <div class="post-desc"> 
                        <ul>
                            <?php if ( $show_date ) : ?>
                                <li>
                                <span class="date-post">
                                    <i class="fa fa-calendar"></i><?php $post_date = get_the_date();echo esc_attr($post_date); ?>
                                </span>
                            </li>
                            <?php endif; ?>
                            <li><i class="fa fa-user-o"></i><?php the_author();?></li>
                        </ul>
                        <h5>
                          <a href="<?php the_permalink(); ?>">
                            <?php get_the_title() ? the_title() : the_ID(); ?>
                        </a>
                    </h5>                        
                    </div>
                </div>
          </div>
          <?php }
          
            elseif($show_date){?>

            <div class="post-item">

              <div class="post-desc">
                <h3 class="post-title">
                  <a href="<?php the_permalink(); ?>">
                    <?php get_the_title() ? the_title() : the_ID(); ?>
                  </a>
                </h3>
              </div>
              <div class="post-date"> 
                <?php $post_date = get_the_date();
                    echo esc_attr($post_date);
                ?>
              </div>
            </div>
          <?php 
			} else { 
		     ?>
          <div class="post-item">            
            <div class="post-desc">
              <a href="<?php the_permalink(); ?>">
                <?php get_the_title() ? the_title() : the_ID(); ?>
                </a>
            </div>
          </div>
          <?php } ?>
          <?php 
            
            endwhile;  
			
            ?>
        </div>
        </div>
        <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();
            
            endif;
            ?>
        <?php
            
        }

// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
    $instance                        = $old_instance;
    $instance['title']               = sanitize_text_field( $new_instance['title'] );
    $instance['category']            =  $new_instance['category'];
    $instance['number']              = (int) $new_instance['number'];
    $instance['show_date']           = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
    $instance['show_featured_image'] = isset( $new_instance['show_featured_image'] ) ? (bool) $new_instance['show_featured_image'] : false;
		return $instance;
}
         
// Widget Backend 
public function form( $instance ) {
    $title               = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
    $category            = isset( $instance['category'] ) ? ( $instance['category'] ) : '';
    $number              = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
    $show_date           = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
    $show_featured_image = isset( $instance['show_featured_image'] ) ? (bool) $instance['show_featured_image'] : false;
?>
<p>
  <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
    <?php esc_html_e( 'Title:','rsframework' ); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_js($title); ?>" />
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>">
    <?php esc_html_e( 'Enter Category With Comma Separated:','rsframework' ); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text"  value="<?php echo $category; ?>"  />
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
    <?php esc_html_e( 'Number of posts to show:','rsframework' ); ?>
  </label>
  <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_js($number); ?>" size="3" />
</p>
<p>
  <input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr ($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
  <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>">
    <?php esc_html_e( 'Display post date?','rsframework' ); ?>
  </label>
</p>
<p>
  <input class="checkbox" type="checkbox"<?php checked( $show_featured_image ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_featured_image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_featured_image' )); ?>" />
  <label for="<?php echo esc_attr($this->get_field_id( 'show_featured_image' )); ?>">
    <?php esc_html_e( 'Display featured image?','rsframework' ); ?>
  </label>
</p>
<?php
	}

} // Class wpb_widget ends here
