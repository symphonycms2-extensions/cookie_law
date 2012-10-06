<?php

	if(!defined('__IN_SYMPHONY__')) die('<h2>Error</h2><p>You cannot directly access this file</p>');
	require_once(TOOLKIT . '/class.event.php');

	Class eventCookieLaw extends Event {

		const ROOTELEMENT = 'cookie-law';

		public $eParamFILTERS = array();

		public static function about(){
			return array(
				'name' => 'Cookie Law Event',
				'author' => array(
					'name' => 'Reme Bolte',
					'website' => 'https://github.com/remie/cookie_law',
					'email' => 'r.bolte@gmail.com'),
				'version' => '0.1.0',
				'release-date' => '2012-10-06',
			);
		}

		public static function allowEditorToParse(){
			return false;
		}

		public static function documentation(){
			return '';
		}

		public function load(){
			if(isset($_POST['action'][self::ROOTELEMENT])) return $this->__trigger();
		}

		protected function __trigger(){
			$accept = isset($_POST['action'][self::ROOTELEMENT]['accept']);

			$cookie = new Cookie('eu-cookie-law', YEAR, __SYM_COOKIE_PATH__, null, true);
			$cookie->set('accept',$accept);

			$result = new XMLElement(self::ROOTELEMENT);
			$result->setAttribute('result', ($accept) ? 'accept' : 'reject');
			return $result;
		}		

	}

?>