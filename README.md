
## Installation

	composer require jinas/moosun

## Packages used 

    *Guzzle

## Basic Usage
	>You can pass any station name available bellow to get the data

	$rp = new MoosunMv('Gan');
	echo $rp->stationname;
    echo $rp->temperature;

## Available Stations
	Male
	Hanimadhoo
	Kahdhoo
	Kaadehdhoo
	Gan

## Available Objects
	stationname
    hastide
    sunrise
    sunset
    moonrise
    moonset
    humidity
    temperature
    description
    dayicon
    nighticon
    rainamount
    wind
    sunshine

    >Predicted data of tommorow

    first_date
    first_condition
    first_sea
    first_wind
    first_icon

    >Predicted data of day after tommorow
    second_date
    second_condition
    second_sea
    second_wind
    second_icon

    >Predicted data of 3rd day
<<<<<<< HEAD
    third_date
    third_condition
    third_sea
    third_wind
    third_icon
=======
    third_date;
    third_condition;
    third_sea;
    third_wind;
    third_icon;
>>>>>>> ec6e5f6a67a8ccfa6c99ca148ba474b3327d5c41
