<?php
App::uses('AppHelper', 'View/Helper');

class ConversionHelper extends AppHelper {
    public function shelfLife($hours) {
    	$parsed = $this->parseShelfLife($hours);
		$result = '';
    	if($parsed['days'] > 0) {
    		$result .= $parsed['days'].' дн. ';
    	}
        if($parsed['hours'] > 0) {
        	$result .= $parsed['hours'].' ч.';
        }
		return $result;
    }
	
	public function parseShelfLife($value) {
		return $this->parse($value, 24, array('days', 'hours'));
	}
		
	public function parse($value, $threshold, $keys) {
    	$result = array();
		if($value > $threshold) {
	        $result[$keys[0]] = floor($value / $threshold);
			$result[$keys[1]] = round($value % $threshold, 0);
		} else {
			$result[$keys[0]] = 0;
			$result[$keys[1]] = $value;
		}
		return $result;
    }
	
	public function mass($gramms) {
		$result = '';
        if($gramms > 100) {
        	$days = round($gramms / 1000, 0);
			$result = $days.' кг.';
        }
		$gramms_left = $gramms % 1000;
		if($gramms_left > 0) {
			if(strlen($result) > 0) {
				$result .= ' ';
			}
			$result .= $gramms_left.' гр.';
		}
	}
	
	public function money($value) {
        return round($value, 2).' руб.';
	}
}