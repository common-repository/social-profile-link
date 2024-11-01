<?php

/**
 * Adds Ap_Social_Widget widget.
 */
class Ap_Social_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'apsocial_widget', // Base ID
            esc_html__('Socail profile', 'apsocial_domain'), // Name
            array('description' => esc_html__('Socail contacts', 'apsocial_domain')) // Args
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
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        // var_dump($instance['facebooku']);
        $fb = get_option('facebook_link') == '' ? 'invisible' : '';
        $tw = get_option('twitter_link') == '' ? 'invisible' : '';
        $insta = get_option('insta_link') == '' ? 'invisible' : '';
        $pint = get_option('pint_link') == '' ? 'invisible' : '';

        // var_dump($pint);

        $style = get_option('style_radio');

        switch ($style) {
            case "item1":
            $item = esc_url(plugins_url('../images/Set1.png', __FILE__));
            break;
            case "item2":
            $item = esc_url(plugins_url('../images/Set2.png', __FILE__));
            break;
            case "item3":
            $item = esc_url(plugins_url('../images/Set3.png', __FILE__));
            break;
            case "item4":
            $item = esc_url(plugins_url('../images/Set4.png', __FILE__));
            break;
            case "item5":
            $item = esc_url(plugins_url('../images/Set5.png', __FILE__));
            break;
            case "item6":
            $item = esc_url(plugins_url('../images/Set6.png', __FILE__));
            break;
            case "item7":
            $item = esc_url(plugins_url('../images/Set7.png', __FILE__));
            break;
            case "item8":
            $item = esc_url(plugins_url('../images/Set8.png', __FILE__));
            break;
            case "item9":
            $item = esc_url(plugins_url('../images/Set9.png', __FILE__));
            break;
            case "item10":
            $item = esc_url(plugins_url('../images/Set10.png', __FILE__));
            break;
            default:
            echo "Your favorite color is neither red, blue, nor green!";
        }

        $display = get_option('display_style');
        if ($display == 'vertical') {
            $ver = 'v';
        } else {
            $ver = 'h';
        }

        $title_potions = get_option('display_title');
        if ($title_potions == 'title_no') {
            $title = 'invisible';
            $w_title = 'no_title';
        } else {
            $title = '';
            $w_title = 'with_title';
        }

        $col_size = get_option('column_size');
        if ($col_size == 'col1') {
            $col = 'col1';
        }
        if ($col_size == 'col2') {
            $col = 'col2';
        }
        if ($col_size == 'col3') {
            $col = 'col3';
        }
        // var_dump($w_title);
        echo '
        <div class="apsara-social-main ' . $display . '">
        <ul>

        <li class="' . $w_title . ' facebook' . $fb . ' ' . $col . ' ">
        <a href="https://www.facebook.com/' . get_option('facebook_link') . '" title="" target="_blank">
        <div class="fb-icon-' . $ver . '" style="background-image:url(' . $item . ' )">
        </div>
        <span class="apsara-social-title ' . $title . '">Facebook</span> </a>
        </li>

        <li class="' . $w_title . ' twitter ' . $tw . ' ' . $col . ' ">
        <a href="https://twitter.com/' . get_option('twitter_link') . '" title="" target="_blank">
        <div class="tw-icon-' . $ver . '" style="background-image:url(' . $item . ' )">
        </div>
        <span class="apsara-social-title ' . $title . '">Twitter</span> </a></li>

        <li class="' . $w_title . ' instagram ' . $insta . ' ' . $col . ' ">
        <a href="https://www.instagram.com/' . get_option('insta_link') . '" title="" target="_blank">
        <div class="insta-icon-' . $ver . '" style="background-image:url(' . $item . ' )">
        </div>
        <span class="apsara-social-title ' . $title . '">Instagram</span> </a></li>

        <li class="' . $w_title . ' pinterest ' . $pint . ' ' . $col . ' ">
        <a href="https://pinterest.com/' . get_option('pint_link') . '" title="" target="_blank">
        <div class="pint-icon-' . $ver . '" style="background-image:url(' . $item . ' )">
        </div>
        <span class="apsara-social-title ' . $title . '">Pinterest</span> </a></li>

        </ul>
        </div>
        ';
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Socail Profile', 'apsocial_domain');

        // $facebooku = !empty($instance['facebooku']) ? $instance['facebooku'] : esc_html__('apsaraaruna', 'apsocial_domain');
        // $fbicon = !empty($instance['fbicon']) ? $instance['fbicon'] : esc_html__('facebook', 'apsocial_domain');

        // $twitteru = !empty($instance['twitteru']) ? $instance['twitteru'] : esc_html__('apsaraaruna', 'apsocial_domain');
        // $twicon = !empty($instance['twicon']) ? $instance['twicon'] : esc_html__('twitter', 'apsocial_domain');

        ?>
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Widget Title', 'apsocial_domain');?></label>
          <input
          class="widefat"
          id="<?php echo esc_attr($this->get_field_id('title')); ?>"
          name="<?php echo esc_attr($this->get_field_name('title')); ?>"
          type="text"
          value="<?php echo esc_attr($title); ?>">
      </p>

      <!-- facebook username feild -->
		<!-- <p>
		<label for="<?php echo esc_attr($this->get_field_id('facebooku')); ?>"><?php esc_attr_e('Facebook username:', 'apsocial_domain');?></label>
		<input
		class="widefat"
		id="<?php echo esc_attr($this->get_field_id('facebooku')); ?>"
		name="<?php echo esc_attr($this->get_field_name('facebooku')); ?>"
		type="text"
		value="<?php echo esc_attr($facebooku); ?>">
	</p> -->
	<!-- fb icon -->
		<!-- <p>
		<label for="<?php echo esc_attr($this->get_field_id('fbicon')); ?>">
		<?php esc_attr_e('Icon:', 'apsocial_domain');?>
		</label>
		<select
		class="widefat"
		id="<?php echo esc_attr($this->get_field_id('fbicon')); ?>"
		name="<?php echo esc_attr($this->get_field_name('fbicon')); ?>">
		<option value="facebook" <?=($fbicon == 'facebook' ? 'selected' : '')?> >facebook</option>
		<option value="facebook-square" <?=($fbicon == 'facebook-square' ? 'selected' : '')?> >facebook-square</option>
		<option value="facebook-official" <?=($fbicon == 'facebook-official' ? 'selected' : '')?> >facebook-official</option>
		</select>
	</p> -->

	<!-- twitter username feild -->
		<!-- <p>
		<label for="<?php echo esc_attr($this->get_field_id('twitteru')); ?>"><?php esc_attr_e('Twitter username:', 'apsocial_domain');?></label>
		<input
		class="widefat"
		id="<?php echo esc_attr($this->get_field_id('twitteru')); ?>"
		name="<?php echo esc_attr($this->get_field_name('twitteru')); ?>"
		type="text"
		value="<?php echo esc_attr($twitteru); ?>">
	</p> -->
	<!-- tw icon -->
		<!-- <p>
		<label for="<?php echo esc_attr($this->get_field_id('twicon')); ?>">
		<?php esc_attr_e('Icon:', 'apsocial_domain');?>
		</label>
		<select
		class="widefat"
		id="<?php echo esc_attr($this->get_field_id('twicon')); ?>"
		name="<?php echo esc_attr($this->get_field_name('twicon')); ?>">
		<option value="twitter" <?=($twicon == 'twitter' ? 'selected' : '')?> >twitter</option>
		<option value="twitter-square" <?=($twicon == 'twitter-square' ? 'selected' : '')?> >twitter-square</option>
		</select>
	</p> -->
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
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        $instance['facebooku'] = (!empty($new_instance['facebooku'])) ? strip_tags($new_instance['facebooku']) : '';
        $instance['fbicon'] = (!empty($new_instance['fbicon'])) ? strip_tags($new_instance['fbicon']) : '';

        $instance['twitteru'] = (!empty($new_instance['twitteru'])) ? strip_tags($new_instance['twitteru']) : '';
        $instance['twicon'] = (!empty($new_instance['twicon'])) ? strip_tags($new_instance['twicon']) : '';

        return $instance;
    }

} // class Foo_Widget

// <li class="' . $insta . ' instagram"><a href="https://www.instagram.com/' . get_option('insta_link') . '" title="" target="_blank"><i class="fa fa-' . $instance['twicon'] . '"></i> Instagram </a></li>