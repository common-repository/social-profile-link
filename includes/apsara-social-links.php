<?php
global $chk;
// $dir = plugin_dir_path(__DIR__);
// $plugin_dir = ABSPATH . 'wp-content/plugins/apsara-social/';
// var_dump($plugin_dir);
if (isset($_POST['apsara_submit'])) {
  apsocial_opt();
}
function apsocial_opt() {

    // if ((isset($_POST['fa_options'])) && ($_POST['fa_options'] == 'true')) {
    //     $fa_status = 'true';
    // } else {
    //     $fa_status = 'false';
    // }

  if ((isset($_POST['styles']['radio1'])) && ($_POST['styles']['radio1'] != '')) {
    $ap_styles = sanitize_text_field($_POST['styles']['radio1']);
        // var_dump($ap_styles);
  } else {
    $ap_styles = 'false';
        // var_dump($ap_styles);
  }

  if ((isset($_POST['display']['radio2'])) && ($_POST['display']['radio2'] != '')) {
    $dis_style = sanitize_text_field($_POST['display']['radio2']);
        // var_dump($ap_styles);
  } else {
    $dis_style = 'false';
        // var_dump($ap_styles);
  }

  if ((isset($_POST['title']['radio3'])) && ($_POST['title']['radio3'] != '')) {
    $dis_title = sanitize_text_field($_POST['title']['radio3']);
        // var_dump($dis_title);
  } else {
    $dis_title = 'false';
        // var_dump($ap_styles);
  }

  if ((isset($_POST['column']['radio4'])) && ($_POST['column']['radio4'] != '')) {
    $column_opt = sanitize_text_field($_POST['column']['radio4']);
        // var_dump($column);
  } else {
    $column_opt = 'false';
        // var_dump($column);
  }

    // $fontawesome = $_POST['mine_plugin_options'];
  $fblink = sanitize_text_field($_POST['fb_link']);
  $twlink = sanitize_text_field($_POST['tw_link']);
  $instalink = sanitize_text_field($_POST['insta_link']);
  $pintlink = sanitize_text_field($_POST['pint_link']);
  $styles = sanitize_text_field($_POST['styles']['radio1']);
  $dis_style = sanitize_text_field($_POST['display']['radio2']);
  $dis_title = sanitize_text_field($_POST['title']['radio3']);
  $column_opt = sanitize_text_field($_POST['column']['radio4']);
    // var_dump($_POST);

  global $chk;

    // if (get_option('fawe_status') != trim($fa_status)) {
    //     $chk = update_option('fawe_status', trim($fa_status));
    // }
  if (get_option('facebook_link') != trim($fblink)) {
    $chk = update_option('facebook_link', trim($fblink));
  }
  if (get_option('twitter_link') != trim($twlink)) {
    $chk = update_option('twitter_link', trim($twlink));
  }
  if (get_option('insta_link') != trim($instalink)) {
    $chk = update_option('insta_link', trim($instalink));
  }
  if (get_option('pint_link') != trim($pintlink)) {
    $chk = update_option('pint_link', trim($pintlink));
  }
  if (get_option('display_style') != trim($dis_style)) {
    $chk = update_option('display_style', trim($dis_style));
  }
  if (get_option('display_title') != trim($dis_title)) {
    $chk = update_option('display_title', trim($dis_title));
  }
  if (get_option('style_radio') != trim($ap_styles)) {
    $chk = update_option('style_radio', trim($ap_styles));
  }
  if (get_option('column_size') != trim($column_opt)) {
    $chk = update_option('column_size', trim($column_opt));
  }

}
?>
<div class="wrap">
  <div id="icon-options-general" class="icon32"> <br>
  </div>
  <h2>Social Links Settings</h2>
  <?php if (isset($_POST['apsara_submit']) && $chk): ?>
    <div id="message" class="updated below-h2">
      <p>Content updated successfully</p>
    </div>
  <?php endif;?>
  <div class="metabox-holder">
    <div class="">
      <!-- <h3><strong>Enter you</strong></h3> -->
      <form method="post" action="">
        <table class="form-table">

          <!-- <tr>
            <th scope="row">Your theme already have fontawesome install?</th>
            <td>
              <?php
// $options = get_option('fawe_status');
// $checked = ($options == 'true' ? ' checked="checked"' : '');
// echo "<input id='plugin_checkbox' name='fa_options' type='checkbox' value='true' " . $checked . " />";
?>
            </td>
          </tr> -->

          <tr>
            <th scope="row">Facebook<span style="color:red">*</span></th>
            <td><input type="text" name="fb_link"
              value="<?php echo get_option('facebook_link'); ?>" style="width:350px;" required />
            </td>
          </tr>

          <tr>
            <th scope="row">Twitter</th>
            <td><input type="text" name="tw_link"
              value="<?php echo get_option('twitter_link'); ?>" style="width:350px;" />
            </td>
          </tr>


          <tr>
            <th scope="row">Instagram</th>
            <td><input type="text" name="insta_link"
              value="<?php echo get_option('insta_link'); ?>" style="width:350px;" />
            </td>
          </tr>

          <tr>
            <th scope="row">Pinterest</th>
            <td><input type="text" name="pint_link"
              value="<?php echo get_option('pint_link'); ?>" style="width:350px;" />
            </td>
          </tr>

          <tr>
            <th scope="row">Show Title</th>
            <td>
              <?php
              $title_potions = get_option('display_title');
// var_dump($title_potions);
              ?>
              <input type="radio" name="title[radio3]" value="title_yes" <?php checked('title_yes', $title_potions);?>  />Yes
              <?php echo '<img width="60px" style=" position: relative; top: 14px;"
              src="' . esc_url(plugins_url('../images/with_title.png', __FILE__)) . '" > '; ?>

              <input type="radio" name="title[radio3]" value="title_no" <?php checked('title_no', $title_potions);?>  />No
              <?php echo '<img width="60px" style=" position: relative; top: 14px;"
              src="' . esc_url(plugins_url('../images/without_title.png', __FILE__)) . '" > '; ?>
            </td>
          </tr>

          <tr>
            <th scope="row">Display</th>
            <td>
              <?php
              $display_potions = get_option('display_style');
// var_dump($myplug_options);
              ?>
              <input type="radio" name="display[radio2]" value="horizontal" <?php checked('horizontal', $display_potions);?>  />Horizontal
              <input type="radio" name="display[radio2]" value="vertical" <?php checked('vertical', $display_potions);?>  />Vertical
            </td>
          </tr>

          <tr>
            <th scope="row">Column</th>
            <td>
              <?php
              $column_potions = get_option('column_size');
// var_dump($column_potions);
              ?>
              <input type="radio" name="column[radio4]" value="col1" <?php checked('col1', $column_potions);?>  />Column 1
              <input type="radio" name="column[radio4]" value="col2" <?php checked('col2', $column_potions);?>  />Column 2
              <input type="radio" name="column[radio4]" value="col3" <?php checked('col3', $column_potions);?>  />Column 3
            </td>
          </tr>

          <tr>
            <th scope="row">Themes</th>
            <td>
              <?php
              $myplug_options = get_option('style_radio');
// var_dump($myplug_options);
              ?>
              <div class="ap-admin-theme-block" style="height: 45px;">
                <input class="tests" type="radio" name="styles[radio1]" value="item1" <?php checked('item1', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set1_sample.png', __FILE__)) . '" > '; ?>
              </div>

              <div class="ap-admin-theme-block" style="height: 45px;">
                <input type="radio" name="styles[radio1]" value="item2" <?php checked('item2', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set2_sample.png', __FILE__)) . '" > '; ?>
              </div>

              <div class="ap-admin-theme-block" style="height: 45px;">
                <input type="radio" name="styles[radio1]" value="item3" <?php checked('item3', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set3_sample.png', __FILE__)) . '" > '; ?>
              </div>

              <div class="ap-admin-theme-block" style="height: 45px;">
                <input type="radio" name="styles[radio1]" value="item4" <?php checked('item4', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set4_sample.png', __FILE__)) . '" > '; ?>
              </div>

              <div class="ap-admin-theme-block" style="height: 45px;">
                <input type="radio" name="styles[radio1]" value="item5" <?php checked('item5', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set5_sample.png', __FILE__)) . '" > '; ?>
              </div>

              <div class="ap-admin-theme-block" style="height: 45px;">
                <input type="radio" name="styles[radio1]" value="item6" <?php checked('item6', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set6_sample.png', __FILE__)) . '" > '; ?>
              </div>

              <div class="ap-admin-theme-block" style="height: 45px;">
                <input type="radio" name="styles[radio1]" value="item7" <?php checked('item7', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set7_sample.png', __FILE__)) . '" > '; ?>
              </div>

              <div class="ap-admin-theme-block" style="height: 45px;">
                <input type="radio" name="styles[radio1]" value="item8" <?php checked('item8', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set8_sample.png', __FILE__)) . '" > '; ?>
              </div>

              <div class="ap-admin-theme-block" style="height: 45px;">
                <input type="radio" name="styles[radio1]" value="item9" <?php checked('item9', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set9_sample.png', __FILE__)) . '" > '; ?>
              </div>

              <div class="ap-admin-theme-block" style="height: 45px;">
                <input type="radio" name="styles[radio1]" value="item10" <?php checked('item10', $myplug_options);?> style="width:10px;" />
                <?php echo '<img width="160px" style=" position: relative; top: 14px;"
                src="' . esc_url(plugins_url('../images/Set10_sample.png', __FILE__)) . '" > '; ?>
              </div>


            </td>
          </tr>


          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;  padding-bottom:10px;">
              <input type="submit" name="apsara_submit" value="Save changes" class="button-primary" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
