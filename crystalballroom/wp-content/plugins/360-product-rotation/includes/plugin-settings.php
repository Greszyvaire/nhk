<?php

class Yofla_360_product_rotation_settings {

    /**
     * Holds the values to be used in the fields callbacks
     */
    protected $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }
    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            '360&deg; Product Rotation',
            '360&deg; Product Rotation',
            'manage_options',
            'yofla-360-admin',
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'yofla_360_options' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>360&deg; Product Rotation Plugin Settings</h2>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields( 'yofla_360_option_group' );
                do_settings_sections( 'yofla-360-admin' );
                submit_button();
                ?>
            </form>
        </div>
    <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'yofla_360_option_group', // Option group
            'yofla_360_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'yofla_360_settings_section', // ID
            '3DRT License details', // Title
            array( $this, 'print_section_info' ), // Callback
            'yofla-360-admin' // Page
        );

        add_settings_section(
            'yofla_360_settings_section_shortcode', // ID
            'Shortcode defaults', // Title
            array( $this, 'print_section_info_shortcode' ), // Callback
            'yofla-360-admin' // Page
        );

        //license id
        add_settings_field(
            'license_id',
            '<strong>License Id:</strong>',
            array( $this, 'licenseid_callback' ),
            'yofla-360-admin',
            'yofla_360_settings_section'
        );

        //iframe styles
        add_settings_field(
            'iframe_styles',
            '<strong>iframe_styles:</strong>',
            array( $this, 'iframe_styles_callback' ),
            'yofla-360-admin',
            'yofla_360_settings_section_shortcode'
        );

    }

    /**
     * Sanitize each setting field as needed
     * 
     * @param array $input Contains all settings fields as array keys
     * @return array
     */
    public function sanitize( $input )
    {
        $new_input = array();
        
        if( isset( $input['license_id'] ) ){
            $new_input['license_id'] = sanitize_text_field( $input['license_id'] );
        }

        if( isset( $input['iframe_styles'] ) ){
            $new_input['iframe_styles'] = sanitize_text_field( $input['iframe_styles'] );
            //remove trailing/leading " or '
            $new_input['iframe_styles']= trim($new_input['iframe_styles']," '\"");
        }

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        if(isset($this->options['license_id']) && strlen($this->options['license_id']) > 0)
        {
            $data = $this->_get_order_data($this->options['license_id']);
            if(gettype($data) == 'array')
            {
                //$updates_end_days = round((strtotime($data['updatesend'])-time())/(60*60*24));
                //$updatesend = date_format(date_create(strtotime($data['updatesend'])), 'g:ia \o\n l jS F Y');

                $updatesend = date('jS F Y', strtotime($data['updatesend']));

                //$updatesend = $data['updatesend'];

                $out =  "<table>";
                $out .=  "<tr>";
                $out .=  "    <td>";
                $out .=  "    360&deg; Rotations by:";
                $out .=  "    </td>";
                $out .=  "    <td>";
                $out .=  "    <strong>{$data['license_holder']}</strong>";
                $out .=  "    </td>";
                $out .=  "</tr>";
                $out .=  "<tr>";
                $out .=  "    <td>";
                $out .=  "    License type:";
                $out .=  "    </td>";
                $out .=  "    <td>";
                $out .=  "    {$data['productid']}";
                $out .=  "    </td>";
                $out .=  "</tr>";
                $out .=  "<tr>";
                $out .=  "    <td>";
                $out .=  "    Free updates until:";
                $out .=  "    </td>";
                $out .=  "    <td>";
                $out .=  "    {$updatesend}";
                $out .=  "    </td>";
                $out .=  "</tr>";
                $out .=  "</table>";

                echo $out;
            }
            elseif(gettype($data) == 'string')
            {
                echo '<p><span style="color: red">'.$data.'</span></p>';
            }
            else
            {
                echo '<p><span style="color: red">License Id is invalid!</span></p>';
                //remove void option
                $this->options['license_id'] = '';
                update_option('yofla_360_options', $this->options);

            }
        }

        $msg = '<p>Please enter your License Id to replace the free 360&deg; player with a licensed version.';
        $msg .= ' If you are already using a licensed player, entering the License Id here will make ';
        $msg .= ' all 360&deg; product rotations use the latest 360&deg; player from the cloud.</p>';
        echo $msg;
    }

    /**
     * Print the Section text for shortcode options
     */
    public function print_section_info_shortcode()
    {
        $msg = '<p>Set default site-wide default shortcode values for embedding the 360&deg; product rotation.';
        $msg .= '</p>';
        echo $msg;

    }

    /**
     * Get the settings option array and print one of its values
     */
    public function licenseid_callback()
    {
        printf(
            '<input type="text" id="license_id" name="yofla_360_options[license_id]" value="%s" />',
            isset( $this->options['license_id'] ) ? esc_attr( $this->options['license_id']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function iframe_styles_callback()
    {

        $desc = '<br />When not set, this default is used: "max-width: 100%; border: 1px solid silver;"';

        printf(
            '<input type="text" id="iframe_styles" name="yofla_360_options[iframe_styles]" value="%s" />%s',
            isset( $this->options['iframe_styles'] ) ? esc_attr( $this->options['iframe_styles']) : '', $desc
        );
    }

    /**
     * Checks if order data is valid
     *
     * @param $license_id
     * @return array|null
     */
    private function _get_order_data($license_id)
    {
        $url = YOFLA_LICENSE_ID_CHECK_URL.$license_id;
        $response = wp_remote_get($url);

        if(is_wp_error($response))
            return 'Error communicating with server!';

        if($response && isset($response['body']))
        {
            $body = $response['body'];
            $data = explode('|',$body);
            if($data[0]=='ok')
            {
                $order_data = array();
                $order_data['license_holder'] = $data[1];
                $order_data['updatesend'] = $data[2];
                $order_data['productid'] = $data[3];
                return $order_data;
            }
        }

        return null;
    }

}
