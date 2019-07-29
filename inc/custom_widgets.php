<?php
class VeneraRelatedPortfolioItemsWidget extends WP_Widget {

    public function VeneraRelatedPortfolioItemsWidget() {
        $widget_ops = array( 'description' => __('Display a list of related portfolio items on a single portfolio page', 'venera') );

        parent::__construct(
            'related_portfolio_items',
            'Related Portfolio Items',
            $widget_ops
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );

        //Our variables from the widget settings.
        $title = apply_filters( 'widget_title', $instance['title'] );
        $number_of_posts = $instance['number_of_posts'];
        $show_only_same_taxonomy = isset( $instance['show_only_same_taxonomy'] ) ? $instance['show_only_same_taxonomy'] : false;


        //Calculate number of columns and class
        $column_class = VENERA_TOTAL_COLUMNS / $number_of_posts;

        $show_specific_taxonomy_ids = false;
        if ( $show_only_same_taxonomy ){
            $terms = get_the_terms( $post->ID, 'portfolio-category' );

            if ( $terms && ! is_wp_error( $terms ) ) {

                $show_specific_taxonomy_ids = array();

                foreach ( $terms as $term ) {
                    $show_specific_taxonomy_ids[] = $term->term_id;
                }

            }
        }

        $loop = venera_get_related_portfolio_items( $show_specific_taxonomy_ids, $number_of_posts );

        if ( $loop->have_posts() ) :
            echo $before_widget;
            // Display the widget title
            if ( ! empty( $title ) ) echo $before_title . $title . $after_title; ?>
            <div class="framed-posts">
                <div class="row">
                <?php
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="span<?php echo $column_class; ?>">
                        <a href="<?php the_permalink(); ?>" class="framed-post">
                            <?php
                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it
                                echo '<div class="fp-featured-img">' . get_the_post_thumbnail() . '</div>';
                            } ?>
                        </a>
                    </div>
                <?php
                endwhile; ?>
                </div>
            </div>
            <?php
            echo $after_widget;
        endif;

        wp_reset_postdata();

    }

    //Update the widget

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['number_of_posts'] = strip_tags( $new_instance['number_of_posts'] );
        $instance['show_only_same_taxonomy'] = $new_instance['show_only_same_taxonomy'];

        return $instance;
    }


    public function form( $instance ) {

        //Set up some default widget settings.
        $defaults = array( 'title' => __('Related Work', 'venera'), 'number_of_posts' => 6, 'show_only_same_taxonomy' => false );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'venera'); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e('Number of items:', 'venera'); ?></label>
            <select id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" style="width:100%;" >
                <option value="2" <?php if ($instance['number_of_posts'] == 2){ echo 'selected="selected"'; } ?>>2</option>
                <option value="3" <?php if ($instance['number_of_posts'] == 3){ echo 'selected="selected"'; } ?>>3</option>
                <option value="4" <?php if ($instance['number_of_posts'] == 4){ echo 'selected="selected"'; } ?>>4</option>
                <option value="6" <?php if ($instance['number_of_posts'] == 6){ echo 'selected="selected"'; } ?>>6</option>
                <option value="12" <?php if ($instance['number_of_posts'] == 12){ echo 'selected="selected"'; } ?>>12</option>
            </select>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance['show_only_same_taxonomy'], true ); ?> id="<?php echo $this->get_field_id( 'show_only_same_taxonomy' ); ?>" name="<?php echo $this->get_field_name( 'show_only_same_taxonomy' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'show_only_same_taxonomy' ); ?>"><?php _e('Show only items from same category?', 'venera'); ?></label>
        </p>

    <?php
    }
}


/**
 * Register custom widgets
 */
function venera_widgets_init() {
    register_widget( 'VeneraRelatedPortfolioItemsWidget' );
}
add_action( 'widgets_init', 'venera_widgets_init' );