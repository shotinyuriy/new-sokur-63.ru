<?php
App::uses('AppHelper', 'View/Helper');

class ConversionHelper extends AppHelper {
    public function self_life($hours) {
    	$result = '';
        if($hours > 24) {
        	$days = round($hours / 24, 0);
			$result = $days.' дн.';
        }
		$hours_left = $hours % 24;
		if($hours_left > 0) {
			if(strlen($result) > 0) {
				$result .= ' ';
			}
			$result .= $days.' дн.';
		}
    }
	
	public function mass($gramms) {
		$result = '';
        if($gramms > 100) {
        	$days = round($gramms / 24, 0);
			$result = $days.' дн.';
        }
		$gramms_left = $gramms % 24;
		if($hours_left > 0) {
			if(strlen($result) > 0) {
				$result .= ' ';
			}
			$result .= $days.' дн.';
		}
	}
}