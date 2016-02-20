<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Get Geo Location by Given/Current IP address
 *
 * @access    public
 * @param    string
 * @return    array
 */
if (!function_exists('get_geolocation')) {

    function get_geolocation() {
        $ip = $_SERVER['REMOTE_ADDR'];      //Get System IP

        // $d = file_get_contents("http://www.ipinfodb.com/ip_query.php?ip=$ip&output=xml");
        /*$d = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

        //Use backup server if cannot make a connection
        if (!$d) {
            $d = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        }

        $result = array(
            "ip"             => @$ip,
            "city"           => @$d->geoplugin_city,
            "state"          => @$d->geoplugin_regionName,
            "country_name"   => @$d->geoplugin_countryName,
            "country_code"   => @$d->geoplugin_countryCode,
            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
            "continent_code" => @$d->geoplugin_continentCode
        );*/
        return $result;
        //Return the data as an array
        // Earlier code to return
        // return array('ip'=>$ip, 'country_code'=>$result->CountryCode, 'country_name'=>$result->CountryName, 'region_name'=>$result->RegionName, 'city'=>$result->City, 'zip_postal_code'=>$result->ZipPostalCode, 'latitude'=>$result->Latitude, 'longitude'=>$result->Longitude, 'timezone'=>$result->Timezone, 'gmtoffset'=>$result->Gmtoffset, 'dstoffset'=>$result->Dstoffset);
    }
}

if (!function_exists('get_language_folder')) {

    function get_language_folder($lang_code) {
        switch ($lang_code) {
            case 'en': $result = 'english_en'; break;
            case 'fr': $result = 'french_fr'; break;
            case 'de': $result = 'deutch_de';  break;
            case 'es': $result = 'espanol_es';  break;
            case 'chi':$result = 'china_chn';  break;
            case 'ru': $result = 'rusia_ru';  break;
            case 'ar': $result = 'arabic_ar';  break;
            default:   $result = 'english_en'; break;
        }
        return $result;
        #look for the output line describing our IP address
    }
}


if (!function_exists('get_mac_address')) {

    function get_mac_address($ipAddress) {       
        $macAddr='';
        $arp=`arp -a $ipAddress`;
        $lines=explode("\n", $arp);
        // print_r($lines);
        foreach($lines as $line)
        {
           $cols=preg_split('/\s+/', trim($line));
           print_r($cols);
           if ($cols[0]==$ipAddress)
           {
               $macAddr=$cols[1];
           }
        }
        return $macAddr;
    }
}

//To Encode Password
function encode($value, $salt = null)
{  
    if($salt == null){
      $CI =& get_instance();
      $ency_key = $CI->config->item('encryption_key');
    }
    else{
      $ency_key = $salt;  
    }
     
     if(!$value){return false;}
     $text = $value;
     $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
     $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
     $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $ency_key , $text, MCRYPT_MODE_ECB, $iv);
     return trim(safe_b64encode($crypttext)); 
}

//To Decode Password
function decode($value, $salt = null)
{
    if($salt == null){
      $CI =& get_instance();
      $ency_key = $CI->config->item('encryption_key');
    }
    else{
      $ency_key = $salt;  
    }

    if(!$value){return false;}
        $crypttext = safe_b64decode($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $ency_key , $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }

//To Encrypt
function safe_b64encode($string)
{
 $data_str = base64_encode($string);
    $data_str = str_replace(array('+','/','='),array('-','_',''),$data_str);
    return $data_str;
}

//To Decrypt
function safe_b64decode($string)
{
 $data_str = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data_str) % 4;
    if ($mod4) 
    {   $data_str .= substr('====', $mod4);     }
    return base64_decode($data_str);
}
/* For Compression */
function compress($source, $destination, $quality) 
{   
    $quality = 60;
    $info = getimagesize($source); if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source); elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source); elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality); 
    return $destination;
}
function getRandomName($length = 5)
{
    $length = $length;
    $image_name = "";       
    $RandName = '';
    $possible = "0123456789abcdefghifklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRST0123456789abcdefghifklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789UVWXYZ0123456789abcdefghifklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRST0123456789abcdefghifklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789UVWXYZ0123456789abcdefghifklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRST0123456789abcdefghifklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789UVWXYZ0123456789abcdefghifklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRST0123456789abcdefghifklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789UVWXYZ0123456789abcdefghifklmnopqrstuvwxyz0123456789abcdefghifklmnopqrstuvwxyz0123456789abcdefghifklmnopqrstuvwxyz0123456789abcdefghifklmnopqrstuvwxyz0123456789abcdefghifklmnopqrstuvwxyz0123456789abcdefghifklmnopqrstuvwxyz0123456789abcdefghifklmnopqrstuvwxyz0123456789abcdefghifklmnopqrstuvwxyz0123456789abcdefghifklmnopqrstuvwxyz0123456789";
    $i = 0;
    while($i < $length)
    {
        $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
        if(!strstr($image_name, $char ))
        {
            $RandName .= $char;
            $i++;
        }
    }
    return $RandName;
}
?>