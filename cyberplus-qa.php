<?php
/*
Plugin Name: CyberPlus Q&A
Plugin URI: https://www.tudorache.me
Description: Adds an accordion of questions and answers with multiple functionality
Version: 1.0.0
Author: Adrian Emil Tudorache
Author URI: https://www.tudorache.me
License: Copyright CyberPlus
*/

define( 'CPQAPATH', plugin_dir_path( __FILE__ ) );
define( 'CPQABASE', plugin_basename( __FILE__ ) );
define( 'CPQAURL', plugin_dir_url( __FILE__ ) );

class CPQA_Fire {

    public static function init() {

        require_once( __DIR__ . '/global/init.php' );
        //
        require_once( __DIR__ . '/frontend/init.php' );
        //
        // require_once( __DIR__ . '/admin/init.php' );

        //add_shortcode( 'cyberplus_qa', 'CPQA_Fire::cyberplus_qa' );

    }

    public static function cyberplus_qa( $atts, $content = null ) {
        ob_start();
?>
        <div class="et_pb_module et_pb_accordion et_pb_accordion_0">


                <div class="et_pb_toggle et_pb_module et_pb_accordion_item et_pb_accordion_item_0 et_pb_toggle_open">


                <h5 class="et_pb_toggle_title">Q1. Which of these categories best describes your business?</h5>
                <div class="et_pb_toggle_content clearfix" style="display: block;">
                    <p>• Retail and Wholesale • Technology, Media and Communications • Pharmaceuticals and Healthcare • Manufacturing • Professional Services • Financial Services • Construction • Business Services • Government • Non-profit • Travel and Leisure • Food &amp; Drink • Transport &amp; Distribution • Property • Energy • Other<br><span style="text-decoration: underline;">Answer</span>: <br>All of the sectors named in this list are recognised as being exposed to Cyber risk. However, even if your business is in the ‘Other’ category, you are still likely to have a Cyber risk as it is hard to imagine a business that has risk features e.g. no online presence (website, social channels) , uses no IT devices or systems including email, holds or processes no employee, customer or supplier data and can easily evidence its compliance with GDPR or other data privacy regulations.</p>
                </div> <!-- .et_pb_toggle_content -->
            </div> <!-- .et_pb_toggle --><div class="et_pb_toggle et_pb_module et_pb_accordion_item et_pb_accordion_item_1 et_pb_toggle_close">


                <h5 class="et_pb_toggle_title">Q2. Does your business have a website or a presence on any social channel?</h5>
                <div class="et_pb_toggle_content clearfix" style="display: none;">
                    <p>Simply having a website or a social channel presence creates a Cyber risk. In today’s world, only a minority of companies will avoid this risk.</p>
                </div> <!-- .et_pb_toggle_content -->
            </div> <!-- .et_pb_toggle --><div class="et_pb_toggle et_pb_module et_pb_accordion_item et_pb_accordion_item_2 et_pb_toggle_close">


                <h5 class="et_pb_toggle_title">Q3. Does your business use mobile phones, tablets, laptops or PCs?</h5>
                <div class="et_pb_toggle_content clearfix" style="display: none;">
                    <p>The use of mobile technology has grown dramatically in recent years and mobile traffic has now overtaken non mobile traffic. Not all devices are equally secure and mobile technology is generally accepted as presenting special cyber risk issues that fixed technology may not present. Trends such as bring your own device (BYOD) introduce new risks to the workplace.</p>
                </div> <!-- .et_pb_toggle_content -->
            </div> <!-- .et_pb_toggle -->
            </div>
<?php
        return ob_get_clean();
    }

}

CPQA_Fire::init();

?>
