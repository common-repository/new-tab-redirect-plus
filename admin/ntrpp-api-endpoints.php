<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;
//include_once('header.php');

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient pilchards to access this page.')    );
  }


?>
    <style type="text/css">
      .form-table { width: 0px; }
    </style>
  <div class="postbox" style="padding: 30px;">

  <div class="wrap" id="profile-page">
        <center>
   
  <h1 class="wp-heading-inline">
      New Tab Redirect Plus By <a
        href="https://www.pakainfo.com/" target="_blank">Pakainfo</a>
  </h1>
  <p>Custom WordPress Comment Links in New Tab</p>
   
  <hr/>
  <table>
  <tr>
      <th scope="row">Open Link in a New Tab</th>
      <td><label for="ntrpp-open-comment-links-in-new-window"><input type="checkbox" class="franquiaCheckbox" name="ntrpp-open-comment-links-in-new-window" value="1" <?php 
      checked(1, get_option('ntrpp-open-comment-links-in-new-window')); ?> /> Enable the WP Open Comment Links in New Window</label>
        <br/>
        <mark>Open WordPress Comment Links in New Tab/Window (add target=”_blank”)</mark>
      </td>
    </tr>
    <tr> <td colspan="2" align="center"><h3>OR</h3></td></tr>

  <tr>
      <th scope="row">Open Link in a New Tab</th>
      <td><label for="ntrpp-othar-comment-links-in-new-window"><input type="checkbox" class="franquiaCheckbox" name="ntrpp-othar-comment-links-in-new-window" value="1" <?php 
      checked(1, get_option('ntrpp-othar-comment-links-in-new-window')); ?> /> Enable/change a custom link's destination with a redirect</label>
      </td>
    </tr>

  <tr>
    <th><label for="first_name">Website URL</label></th>
    <td><input type="url" size="50" placeholder="Enter redirect Comments URL"  name="ntrpp-website-full-url"
      value="<?php
    echo stripslashes_deep ( esc_attr ( get_option ( 'ntrpp-website-full-url' ) ) );
    ?>"/>
  </td>
  </tr>

  </table>
  <?php 
  submit_button ();
  ?>
  </div>

<p style="text-align:right;">&copy; 2017 - <?php echo date("Y"); ?> <a href="https://www.pakainfo.com/" target="_blank">www.pakainfo.com</a><p>



  </div>