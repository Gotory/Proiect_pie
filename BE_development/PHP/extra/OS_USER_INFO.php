<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 10/22/2017
 * Time: 7:27 PM
 */

class OS_USER_INFO{

    private $agent = "";
    private $info = array();

    function __construct(){
        $this->agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : NULL;
        $this->getBrowser();
        $this->getOS();
    }

    function getBrowser(){
        $browser = array("Navigator"            => "/Navigator(.*)/i",
            "Firefox"              => "/Firefox(.*)/i",
            "Internet Explorer"    => "/MSIE(.*)/i",
            "Google Chrome"        => "/chrome(.*)/i",
            "MAXTHON"              => "/MAXTHON(.*)/i",
            "Opera"                => "/Opera(.*)/i",
        );
        foreach($browser as $key => $value){
            if(preg_match($value, $this->agent)){
                $this->info = array_merge($this->info,array("Browser" => $key));
                $this->info = array_merge($this->info,array(
                    "Version" => $this->getVersion($key, $value, $this->agent)));
                break;
            }else{
                $this->info = array_merge($this->info,array("Browser" => "UnKnown"));
                $this->info = array_merge($this->info,array("Version" => "UnKnown"));
            }
        }
        return $this->info['Browser'];
    }

    function getOS(){
        $OS = array("Windows"   =>   "/Windows/i",
            "Linux"     =>   "/Linux/i",
            "Unix"      =>   "/Unix/i",
            "Mac"       =>   "/Mac/i"
        );

        foreach($OS as $key => $value){
            if(preg_match($value, $this->agent)){
                $this->info = array_merge($this->info,array("Operating System" => $key));
                break;
            }
        }
        return $this->info['Operating System'];
    }

    function getVersion($browser, $search, $string){
        $browser = $this->info['Browser'];
        $version = "";
        $browser = strtolower($browser);
        preg_match_all($search,$string,$match);
        switch($browser){
            case "firefox": $version = str_replace("/","",$match[1][0]);
                break;

            case "internet explorer": $version = substr($match[1][0],0,4);
                break;

            case "opera": $version = str_replace("/","",substr($match[1][0],0,5));
                break;

            case "navigator": $version = substr($match[1][0],1,7);
                break;

            case "maxthon": $version = str_replace(")","",$match[1][0]);
                break;

            case "google chrome": $version = substr($match[1][0],1,10);
        }
        return $version;
    }

    function showInfo($switch){
        $switch = strtolower($switch);
        switch($switch){
            case "browser": return $this->info['Browser'];
                break;

            case "os": return $this->info['Operating System'];
                break;

            case "version": return $this->info['Version'];
                break;

            case "all" : return array($this->info["Version"],
                $this->info['Operating System'], $this->info['Browser']);
                break;

            default: return "Unkonw";
                break;

        }
    }
}


// using
// create an new instant of OS_BR class
#$obj = new OS_USER_INFO();
// if you want to show one by one information then try showInfo() function

// get browser
#echo $obj->showInfo('browser').'<BR>';

// get browser version
#echo $obj->showInfo('version').'<BR>';

// get Operating system
#echo $obj->showInfo('os').'<BR>';

// get all information and it returns an array
#echo "<pre>".print_r($obj->showInfo("all"),true)."</pre>";
