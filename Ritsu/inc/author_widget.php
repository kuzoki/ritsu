<?php
/*
@package ritsuTheme
	This Wideget is Made By KUZOKITHEM Developers
	https://themeforest.net/user/kuzokithemes
===================
    WIDGET CLASSS
*/





/**
 * Adds Authors widget.
 */
class author_widgets extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'author_widgets', // Base ID
			esc_html__( 'A Author Widget', 'ritsu_domaine' ), // Name
			array( 'description' => esc_html__( 'Display Your Author Widget', 'ritsu_domaine' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {


		echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
            
                    
            $user_info = get_userdata($instance['user_id']);
            $user_avatar = get_avatar_url($instance['user_id']) ;
            //echo '<strong>Name: </strong><br>' . $user_info->display_name . '<br>';
       
			echo '<img src="'.$user_avatar.'" class="img-round"><div class="body-text about-sec-text text-aling">
             <span class="name-color">' . $user_info->display_name . '</span> ' . $user_info->description . '</div>';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Your Title... ', 'ritsu_domaine' );
		$user_id = ! empty( $instance['user_id'] ) ? $instance['user_id'] : esc_html__( 1, 'ritsu_domaine' );
		



        $blogusers = get_users( array( 'role__in' => array( 'author', 'Administrator') ) );
        //echo $user_name;
        //print_r($blogusers)
		?>

		<!-- Title Of Widget  -->
			<p  style="margin-bottom:20px;">
				<label style=" text-transform: capitalize;font-weight: 800; margin-bottom:20px;" 
					for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'ritsu_domaine' ); ?>
				</label> 
				<input class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
					type="text"
					value="<?php echo esc_attr( $title ); ?>"
				/>		
			</p>




            <p  style="margin-bottom:20px;">
				<label style=" text-transform: capitalize;font-weight: 800; margin-bottom:20px;" 
					for="<?php echo esc_attr( $this->get_field_id( 'user_id' ) ); ?>"><?php esc_attr_e( 'User Name:', 'ritsu_domaine' ); ?>
				</label> 
				<select class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'user_id' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'user_id' ) ); ?>"
				/>	
                
                <?php  

                    foreach ( $blogusers as $user ) {
                       
                       $name = $user->ID;
                       //echo esc_html($name); 
                    ?>
                     
                        <option 
                            value="<?php echo esc_html( $name) ?>"
                            <?php echo ($user_id == $name)? 'selected' : '' ?>

                        >
                            <?php echo esc_html(  $user->display_name); ?>
                        </option>
                        
                    <?php 
                            
                    }
                
                ?>
               
                </select>	

                <img src="<?php echo get_avatar_url($user_id) ?>" alt="avatar"
                 style="margin:10px auto; border-radius:50%; display: block;"
                
                ><br>
                
                <?php 
                    
                    $user_info = get_userdata($user_id);
                    echo '<strong>Name: </strong><br>' . $user_info->display_name . '<br>';
                    echo '<strong> User roles: </strong><br> ' . implode(', ', $user_info->roles) . '<br>';
                    echo '<strong>User Description: </strong><br>' . $user_info->description . '<br>';
                ?>
                
			</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['user_id'] = ( ! empty( $new_instance['user_id'] ) ) ? sanitize_text_field( $new_instance['user_id'] ) : '';
		
		return $instance;
	}

} 

// register facebook_page widget
function register_author_widgets_widget() {
    register_widget( 'author_widgets' );
}
add_action( 'widgets_init', 'register_author_widgets_widget' );