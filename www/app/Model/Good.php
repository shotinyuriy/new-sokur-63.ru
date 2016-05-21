<?php
class Good extends AppModel {
	public $belongsTo = 'Category';
	public $hasMany = 'Portion';
}