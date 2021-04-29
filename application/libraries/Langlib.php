 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Langlib
{

    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('geolib/geolib');
    }

    public function init_default_language()
    {
        if ($_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '::1') {
            $this->CI->load->database('local');
        } else {
            $this->CI->load->database('default');
        }

        // check ip address
        // require_once APPPATH.'libraries/dbip.class.php';

        // $host       = $this->CI->db->hostname;
        // $dbname     = $this->CI->db->database;
        // $username   = $this->CI->db->username;
        // $password   = $this->CI->db->password;
        // $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);

        // $dbip = new DBIP($db);

        // // Lookup an IP address
        // $inf = $dbip->Lookup($this->CI->input->ip_address());

        // // Show the associated country
        // $this->CI->default_lang = 'OTHER';
        // if($inf->country === 'TH') {
        //   $this->CI->default_lang = 'TH';
        // }


        // echo $this->CI->config->item('default', 'language');
        // print_r($this->CI->config->item('lists', 'language'));
        // exit;

        // $lang_default = $this->CI->config->item('default', 'site_language');
        // $lang_lists   = $this->CI->config->item('lists', 'site_language');
        $lang_lists = $this->CI->lang_lists;

        $langs = array();
        $geo_lang_codes = array();
        $geo_lang_currency_codes = array();

        foreach ($lang_lists as $url => $lang_list) {
            $langs[] = $url;

            if ($lang_list['country_code']) {
                $geo_lang_codes[$lang_list['country_code']] = array(
                    'lang_folder'   => $lang_list['lang_folder'],
                    'currency_code' => $lang_list['currency_code']
                );
            }
        }

        // Language For Google
        $url_lang = $this->CI->uri->segment(1);
        $ar_pages = array('', 'home', 'polo', 'tshirt', 'apron', 'bag', 'about', 'contact');
        if (
            in_array($url_lang, $langs) &&
            in_array($this->CI->uri->segment(2), $ar_pages)
        ) {

            // $lang     = 'english';
            $lang = $lang_lists[$url_lang]['lang_folder'];
            $this->CI->session->set_userdata('lang', $lang);

            // เช็คเข้าครั้งแรกของภาษานั้นๆให้เก็บ currency
            $currency = $lang_lists[$url_lang]['currency_code'];
            // echo "<br><br><br><br><br><br><br><br>";
            // echo $lang.'===='.$currency;
            // echo "<br>";
            // echo $this->CI->session->userdata('first_time_lang');
            // echo "<br>";
            if ($this->CI->session->userdata('first_time_lang') == NULL) {
                $this->CI->session->set_userdata('currency', $currency);
                $this->CI->session->set_userdata('first_time_lang', $lang);
            } else {
                if ($this->CI->session->userdata('first_time_lang') != $lang) {
                    $this->CI->session->set_userdata('first_time_lang', $lang);
                    $this->CI->session->set_userdata('currency', $currency);
                }
            }

            // $currency = "usd";
            // $currency = $lang_lists[$url_lang]['currency_code'];
            // $this->CI->session->set_userdata('currency',$currency);

            $this->CI->session->set_userdata('current_lang', $lang_lists[$url_lang]);

            $this->CI->session->set_userdata('url_lang', $url_lang);
        }

        // Check if click Change Language Button
        if ($this->CI->session->flashdata('click_change_lang')) {
            $lang_changed = $this->CI->session->userdata('lang');

            foreach ($lang_lists as $url => $lang_list) {
                if ($lang_changed === $lang_list['lang_folder']) {

                    $this->CI->session->set_userdata('currency', $lang_list['currency_code']);

                    $this->CI->session->set_userdata('current_lang', $lang_list);

                    $this->CI->session->set_userdata('url_lang', $url);
                    $refresh_lang = $url;
                    break;
                }

            }
            if (isset($refresh_lang)) {
                redirect($refresh_lang . '/' . $this->CI->router->class, 'refresh');
            }

        }

        // Check google bot
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'googlebot')) {
            if (!in_array($this->CI->uri->segment(1), $langs)) {
                $lang = 'thailand';
                $this->CI->session->set_userdata('lang', $lang);

                $currency = "thb";
                $this->CI->session->set_userdata('currency', $currency);

                $this->CI->session->set_userdata('current_lang', $lang_lists['th']);
                $this->CI->session->set_userdata('url_lang', 'th');
            }
        }

        // set lang
        if ($this->CI->session->userdata('lang') == NULL) {

            $lang = "thailand";
            $data = $this->CI->geolib->ip_info();

            $geoplugin_countryCode = $data['geoplugin_countryCode'];

            if ($geoplugin_countryCode != "TH" && $this->CI->input->ip_address() != '127.0.0.1') {
                $lang = "thailand";
                if (array_key_exists($geoplugin_countryCode, $geo_lang_codes)) {
                    $lang = $geo_lang_codes[$geoplugin_countryCode]['lang_folder'];
                }
            }

            $this->CI->session->set_userdata('lang', $lang);
        } else {
            $lang = $this->CI->session->userdata('lang');
        }

        // set currency
        if ($this->CI->session->userdata('currency') == NULL) {

            $currency = "thb";

            if (isset($data['geoplugin_countryCode']) && $data['geoplugin_countryCode'] != "TH" && $this->CI->input->ip_address() != '127.0.0.1') {
                $currency = "usd";
                if (array_key_exists($data['geoplugin_countryCode'], $geo_lang_codes)) {
                    $currency = $geo_lang_codes[$data['geoplugin_countryCode']]['currency_code'];
                }
            }

            $this->CI->session->set_userdata('currency', $currency);
        } else {
            $currency = $this->CI->session->userdata('currency');
        }

        // set current_lang
        if ($this->CI->session->userdata('current_lang') == NULL) {
            $current_lang = array(
                'lang_folder'       => 'thailand',
                'currency_code'     => 'thb',
                'country_code'      => 'TH',
                'decimal'           => 0,
                'paypal_decimal'    => 2,
                'paysbuy_curr_type' => 'TH',
            );

            if (isset($data['geoplugin_countryCode']) && $data['geoplugin_countryCode'] != "TH" && $this->CI->input->ip_address() != '127.0.0.1') {
                if (array_key_exists($data['geoplugin_countryCode'], $geo_lang_codes)) {
                    $key = strtolower($data['geoplugin_countryCode']);
                    $current_lang = $lang_lists[$key];
                }
            }

            $this->CI->session->set_userdata('current_lang', $current_lang);
        }

        $ar_lang = array('language', $lang);
        $this->CI->lang->load($ar_lang, $lang);
        $this->CI->PAGE['lang'] = $lang;
        $this->CI->PAGE['currency'] = $currency;

        // echo $this->CI->session->userdata('lang').'<hr>';
        // echo $this->CI->session->userdata('currency');
        // print_r($this->CI->session->userdata('current_lang'));
        // exit;
    }

    public function chooseLang($type, $design_code = "")
    {
        $this->CI->session->set_userdata('lang', $type);
        //$design_code = $this->CI->session->userdata('design_code');
        $this->CI->session->set_flashdata('click_change_lang', TRUE);

        if ($design_code != "" && $this->CI->router->class == "apps") {
            redirect($this->CI->router->class . "/create/" . $design_code, 'refresh');
        } else {
            redirect($this->CI->router->class, 'refresh');
        }
    }
}