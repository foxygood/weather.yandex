<?php

	// Здесь вы сможете узнать ID нужного Вам города http://weather.yandex.ru/static/cities.xml
	// Например, 28440 - Екатеринбург
	$city = '28440';
	$data_file = 'http://export.yandex.ru/weather-ng/forecasts/'.$city.'.xml';
	$xml = simplexml_load_file($data_file);

	$out = array(); // Массив вывода прогноза
	$counter = 0 ; // Счетчик количества дней, для которых доступен прогноз


	foreach ( $xml->day as $day )  {
		if ($day['date'] == $current_date_yandex ) {
		    $day->day_part['type'] == 'day';
		    $get_date = explode ("-" , $day['date']) ;

		    $out[$counter]['day'] = $get_date[2] ;


		    for ($i=1;$i<=1;$i++) {
			if($day->day_part[$i]->temperature == '') {

			     $get_temp_from =  $day->day_part[$i]->temperature_from;
			     $get_temp_to =  $day->day_part[$i]->temperature_to;

			}  else {

			    $get_temp_from = (integer)$day->day_part[$i]->temperature-1 ;
			    $get_temp_to = (integer)$day->day_part[$i]->temperature+1 ;

			}
			if($get_temp_from>0 ) {$get_temp_from = '+'.$get_temp_from ; }
			if($get_temp_to>0 ) {$get_temp_to = '+'.$get_temp_to ; }


		    }
		}



	}
