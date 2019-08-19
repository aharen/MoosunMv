<?php
namespace moosun;

use GuzzleHttp\Client;
class MoosunMv
{
    public $stationname;
    public $hastide;
    public $sunrise;
    public $sunset;
    public $moonrise;
    public $moonset;
    public $humidity;
    public $temperature;
    public $description;
    public $dayicon;
    public $nighticon;
    public $rainamount;
    public $wind;
    public $sunshine;

    //tommorow data
    public $first_date;
    public $first_condition;
    public $first_sea;
    public $first_wind;
    public $first_icon;

    //Day after tommorow data
    public $second_date;
    public $second_condition;
    public $second_sea;
    public $second_wind;
    public $second_icon;

    // Day 3 data
    public $third_date;
    public $third_condition;
    public $third_sea;
    public $third_wind;
    public $third_icon;


    public $api_return;

    //Gan, kaadehdhoo, Kahdhoo, Hanimadhoo, Male
    public function __construct($station = 'Male')
    {
        $bIsConnected = $this->check_internet_connection();
        if($bIsConnected) {

            $this->getData($station);

        }else{
            echo ('Please Connect to internet!!');
        }
    }

    public function check_internet_connection($sCheckHost = 'www.google.com')
    {
        return (bool) @fsockopen($sCheckHost, 80, $iErrno, $sErrStr, 5);
    }

    public function retrieve($url)
    {
  
        try {
			$client = new Client();
            $response = $client->request('GET', $url);
            $rawdata = $response->getBody();
            $removeUTF8BOM = substr($rawdata, 3);
		    $cleanData = stripslashes($removeUTF8BOM);
			$this->api_return = (array) json_decode($cleanData);
		
 		} catch (Exception $e) {			
			return $this->output('Error', 'Error communicating with Weather API: '.$e->getMessage());

		}
    }

    public function setValues($data)
    {
        try {
        //Setting the values from api to the objects in the class
        $this->stationname = $data['station_name'];
        $this->hastide = $data['hastide'];
        $this->sunrise = $data['sunrise'];
        $this->sunset = $data['sunset'];
        $this->moonrise = $data['moonrise'];
        $this->moonset = $data['moonset'];
        $this->humidity = $data['humidity'];
        $this->temperature = $data['temp'];
        $this->description = $data['description'];
        $this->dayicon = $data['dayicon1'];
        $this->nighticon = $data['nighticon1'];
        $this->rainamount = $data['rainamount'];
        $this->wind = $data['wind'];
        $this->sunshine = $data['sunshine'];

        //Setting tommorow data
        $this->first_date = $data['1_date'];
        $this->first_condition = $data['1_cond'];
        $this->first_sea = $data['1_sea'];
        $this->first_wind = $data['1_wind'];
        $this->first_icon = $data['1_icon'];

        //Setting Day after tommorow data
        $this->second_date = $data['2_date'];
        $this->second_condition = $data['2_cond'];
        $this->second_sea = $data['2_sea'];
        $this->second_wind = $data['2_wind'];
        $this->second_icon = $data['2_icon'];

        // Day 3 data
        $this->third_date = $data['3_date'];
        $this->third_condition = $data['3_cond'];
        $this->third_sea = $data['3_sea'];
        $this->third_wind = $data['3_wind'];
        $this->third_icon = $data['3_icon'];
    } catch (Exception $e) {			
        return $this->output('Error', 'Error communicating with Weather API: '.$e->getMessage());

    }

    }

    public function getData($url) 
	{

		$apiUrl = "http://www.meteorology.gov.mv/fetchweather/". $url;
		
        $this->retrieve($apiUrl);
        
        $this->setValues($this->api_return);

    
	}

}