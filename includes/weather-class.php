<?php
/**
 * Adds Weather_Widget widget.
 */
class Weather_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'hugeone_widget', // Base ID
			esc_html__( 'Weather Widget', 'yts_domain' ), // Name
			array( 'description' => esc_html__( 'widget to display huge_weather', 'yts_domain' ), ) // Args
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
		echo $args['before_widget']; // what ever you want to display


		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args
			['after_title'];
		}
           // widget content output
		   echo '<iframe src="https://www.meteoblue.com/en/weather/widget/daily?geoloc=detect&days=7&tempunit=FAHRENHEIT&windunit=METER_PER_SECOND&precipunit=MILLIMETER&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&windgust=1&winddirection=0&winddirection=1&uv=0&uv=1&humidity=0&humidity=1&precipitation=0&precipitation=1&precipitationprobability=0&precipitationprobability=1&spot=0&spot=1&pressure=0&pressure=1&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 378px; height: 467px"></iframe><div><!-- DO NOT REMOVE THIS LINK --><a href="https://www.meteoblue.com/en/weather/week/index?utm_source=weather_widget&utm_medium=linkus&utm_content=daily&utm_campaign=Weather%2BWidget" target="_blank" rel="noopener">meteoblue</a></div>';

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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'weather', 'yts_domain' );
		
		$places = ! empty( $instance['places'] ) ? $instance['places'] : esc_html__( 'Huge_one_weather', 'yts_domain' );
		?>

        <!-- Title -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
            <?php esc_attr_e( 'Title:', 'yts_domain' ); ?>
          </label> 
		<input class="widefat"
         id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
         name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
         type="text"
         value="<?php echo esc_attr( $title ); ?>">
		</p>
        
		 <!-- Places -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'places' ) ); ?>">
            <?php esc_attr_e( 'places:', 'yts_domain' ); ?>
          </label> 
		<input class="widefat"
         id="<?php echo esc_attr( $this->get_field_id( 'places' ) ); ?>" 
         name="<?php echo esc_attr( $this->get_field_name( 'places' ) ); ?>"
         type="text"
         value="<?php echo esc_attr( $places ); ?>">
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
		$instance['places'] = ( ! empty( $new_instance['places'] ) ) ? sanitize_text_field( $new_instance['places'] ) : '';

		return $instance;
	
	}

} // class Foo_Widget