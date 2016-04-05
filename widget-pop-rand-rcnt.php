<?php
if ( !defined('ABSPATH')) exit;

class dt_custom_query extends WP_Widget {
 
    function dt_custom_query() {
        $widget_ops = array( 'classname' => 'distinctive_themes-poprandom', 'description' => 'Popular, Random or Recent Entries' );
        $control_ops = array( 'width' => 520, 'height' => 350, 'id_base' => 'dt_custom_query' );
        parent::__construct( 'dt_custom_query', 'DistinctiveThemes: Random, Recent or Popular', $widget_ops, $control_ops);
    }
 
    public function widget($args, $instance) {      
        extract( $args );
        $title    = $instance['title'];
        $postnr    = $instance['postnr'];
		$post_order    = $instance['post_order'];
        $d_thumb    = $instance['d_thumb'] ? '1' : '0';
        $postmeta    = $instance['postmeta'] ? '1' : '0';
        $thumbalign    = $instance['thumbalign'];
		$postcls    = $instance['postcls'];
		$titlecls    = $instance['titlecls'];
        
        echo $before_widget;
		
            if ( $title ) {
				echo $before_title;
					echo $title;
				echo $after_title;
            }
			
            $count = 0;
			global $do_not_duplicate, $post, $page;
			$args = array(
			  'post__not_in'=>$do_not_duplicate,
			  'posts_per_page' => $postnr,
			  'orderby' => $post_order
			);	?>

            <div class="panes">
            <ul>
            <?php

            $dt_query = new WP_Query();$dt_query->query($args); 
            while ($dt_query->have_posts()) : $dt_query->the_post();
			if (function_exists('dt_media')) {
				if (of_get_option('of_dnd') == 1) { $do_not_duplicate[] = $post->ID; }
			}
            ?>
                <li class="<?php if ( $postcls ) { echo $postcls; } else { echo 'featuredpost'; } if($count == $postnr) { echo ' lastpost'; } ?>">

					<?php
					if ( $d_thumb ) { 
						$postimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						echo "<img src='$postimage' class='$thumbalign'>";	
					} ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'distinctive_themes-widget-pack' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
					
					<?php
                    if ( $postmeta ) {
						$author_id=$post->post_author;
						echo '<span class="distinctive_themes_meta distinctive_themesmeta_bydate">';
						$authorlink = '<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a href="'.get_author_posts_url($post->post_author).'" rel="author" class="fn" itemprop="name">'.  get_the_author_meta( 'display_name', $post->post_author ) . '</a></span>';
						$date = '<time class="published updated" itemprop="datePublished" datetime="'. get_the_date() . 'T' . get_the_time() .'">'. get_the_date() . '</time>';
						printf(esc_attr__('By %1$s on %2$s','distinctive_themes'), $authorlink, $date);
						echo '</span>';
                    } ?>
                    
                </li>

            <?php $count++; endwhile; wp_reset_query(); ?>
        </ul>
    </div>
    <?php         
        echo "<div class='clear'></div>$after_widget"; 
    }
    
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['postnr']     = ( ! empty( $new_instance['postnr'] ) ) ? sanitize_text_field( (int)$new_instance['postnr'] ) : '';
		$instance['post_order']     = ( ! empty( $new_instance['post_order'] ) ) ? sanitize_text_field( $new_instance['post_order'] ) : '';
        $instance['d_thumb']     = $new_instance['d_thumb'] ? '1' : '0';
        $instance['postmeta']     = $new_instance['postmeta'] ? '1' : '0';
        $instance['thumbalign']     = ( ! empty( $new_instance['thumbalign'] ) ) ? sanitize_text_field( $new_instance['thumbalign'] ) : '';
		$instance['postcls']     = ( ! empty( $new_instance['postcls'] ) ) ? sanitize_text_field( $new_instance['postcls'] ) : '';
		$instance['titlecls']     = ( ! empty( $new_instance['titlecls'] ) ) ? sanitize_text_field( $new_instance['titlecls'] ) : '';
        return $instance;
    }

    function form( $instance ) {
        $defaults = array(
			'video' => '0',
			'swap'=> '0',
			'postnr' => '5',
			'postids' => '',
			'c_link' => '',
			'c_image' => '',
			'cat_or_postpage' => '',
			'post_order' => 'date',
			'd_thumb' => '0',
			'postmeta' => '0',
			'media_w' => '35',
			'media_h' => '35',
			'excerpt_l' => '25',
			'thumbalign' => 'alignleft',
			'title' => 'Recent Posts',
			'postcls' => 'featuredpost',
			'titlecls' => 'posttitle'
		);
        $instance = wp_parse_args( (array) $instance, $defaults ); 
        ?>
        	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Section or Category Title','distinctive_themes-widget-pack'); ?> <span style="color:#aaa"><?php _e('(leave empty for no heading)','distinctive_themes-widget-pack'); ?></span></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>	
		
        <p>
            <label for="<?php echo $this->get_field_id('post_order'); ?>"><?php _e('Popular or Random Entries','distinctive_themes-widget-pack'); ?></label><br />
            <select id="<?php echo $this->get_field_id( 'post_order' ); ?>" name="<?php echo $this->get_field_name( 'post_order' ); ?>" style="width:480px">
				<option value="date" <?php if ( 'date' == $instance['post_order'] ) echo 'selected="selected"'; ?>><?php _e('Most Recent','distinctive_themes-widget-pack'); ?></option>
				<option value="rand" <?php if ( 'rand' == $instance['post_order'] ) echo 'selected="selected"'; ?>><?php _e('Random','distinctive_themes-widget-pack'); ?></option>
				<option value="comment_count" <?php if ( 'comment_count' == $instance['post_order'] ) echo 'selected="selected"'; ?>><?php _e('Most Popular (Criteria: Comment Count)','distinctive_themes-widget-pack'); ?></option>
            </select>
        </p>			
    		
        <p style="float:left;width:235px">
            <label for="<?php echo $this->get_field_id( 'd_thumb' ); ?>"><?php _e('Show Thumbnails','distinctive_themes-widget-pack'); ?></label><br />
            <select id="<?php echo $this->get_field_id( 'd_thumb' ); ?>" name="<?php echo $this->get_field_name( 'd_thumb' ); ?>" style="width:235px">
                <option value="1" <?php if ( '1' == $instance['d_thumb'] ) echo 'selected="selected"'; ?>><?php _e('Yes','distinctive_themes-widget-pack'); ?></option>
                <option value="0" <?php if ( '0' == $instance['d_thumb'] ) echo 'selected="selected"'; ?>><?php _e('No','distinctive_themes-widget-pack'); ?></option>    
            </select>
        </p>
				
        <p style="float:right;width:235px">
            <label for="<?php echo $this->get_field_id( 'thumbalign' ); ?>"><?php _e('Thumbnail Alignment','distinctive_themes-widget-pack'); ?></label><br />
            <select id="<?php echo $this->get_field_id( 'thumbalign' ); ?>" name="<?php echo $this->get_field_name( 'thumbalign' ); ?>" style="width:235px">
                <option value="alignleft" <?php if ( 'alignleft' == $instance['thumbalign'] ) echo 'selected="selected"'; ?>><?php _e('Left','distinctive_themes-widget-pack'); ?></option>
                <option value="alignright" <?php if ( 'alignright' == $instance['thumbalign'] ) echo 'selected="selected"'; ?>><?php _e('Right','distinctive_themes-widget-pack'); ?></option>
                <option value="aligncenter" <?php  if ( 'aligncenter' == $instance['thumbalign'] ) echo 'selected="selected"'; ?>><?php _e('Center','distinctive_themes-widget-pack'); ?></option>            
            </select>
        </p>
		        
        <p style="float:left;width:235px">
            <label for="<?php echo $this->get_field_id( 'postmeta' ); ?>"><?php _e('Display post meta','distinctive_themes-widget-pack'); ?></label> 
            <select id="<?php echo $this->get_field_id( 'postmeta' ); ?>" name="<?php echo $this->get_field_name( 'postmeta' ); ?>">
                <option value="1" <?php if ( '1' == $instance['postmeta'] ) echo 'selected="selected"'; ?>><?php _e('Enable','distinctive_themes-widget-pack'); ?></option>
                <option value="0" <?php if ( '0' == $instance['postmeta'] ) echo 'selected="selected"'; ?>><?php _e('Disable','distinctive_themes-widget-pack'); ?></option>    
            </select>
        </p>
		
		
        <p style="float:right;width:235px">
            <label for="<?php echo $this->get_field_name( 'postnr' ); ?>"><?php _e('Number of entries to display','distinctive_themes-widget-pack'); ?></label>
            <select id="<?php echo $this->get_field_id( 'postnr' ); ?>" name="<?php echo $this->get_field_name( 'postnr' ); ?>">            
            <?php
                for ( $i = 1; $i <= 15; ++$i )
                echo "<option value='$i' " . ( $instance['postnr'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
            ?>
            </select>
        </p>   		
		
		<h4 style="clear:both"><?php _e('Advanced - For Developers Only','distinctive_themes-widget-pack'); ?></h4>
		
		<p style="background-color: #efefef;border:1px solid #ddd;padding:10px;"><?php _e('For developers only. Do not edit any of classes below unless you know what you are doing.','distinctive_themes-widget-pack'); ?></p>
		
        <p style="float:left;width:235px">
            <label for="<?php echo $this->get_field_id('postcls'); ?>"><?php _e('CSS Class of Post Wrapper Div','distinctive_themes-widget-pack'); ?></label>
            <input class="widefat"  id="<?php echo $this->get_field_id('postcls'); ?>" name="<?php echo $this->get_field_name('postcls'); ?>" type="text" value="<?php echo esc_attr( $instance['postcls'] ); ?>" />
        </p>

        <p style="float:right;width:235px">
            <label for="<?php echo $this->get_field_id('titlecls'); ?>"><?php _e('CSS Class of Post Title','distinctive_themes-widget-pack'); ?></label>
            <input class="widefat"  id="<?php echo $this->get_field_id('titlecls'); ?>" name="<?php echo $this->get_field_name('titlecls'); ?>" type="text" value="<?php echo esc_attr( $instance['titlecls'] ); ?>" />
        </p>		
<?php
    }
}

function register_dt_custom_query() {
	register_widget('dt_custom_query');
}

add_action('widgets_init', 'register_dt_custom_query');