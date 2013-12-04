<?php
/*
 * set_include_path ( get_include_path () . PATH_SEPARATOR .
 * dirname(__FILE__).'/Payment'); echo get_include_path();
 */
// include_once dirname(__FILE__).'/Payment';
namespace PHPpayments;
class Loader {
	static function load($paymentmethod) {
		$paymentmethod = strtolower ( $paymentmethod );

		$arr_folders = explode ( "_", $paymentmethod );
		
		require_once dirname ( __FILE__ ) . "/Common/Payment.php";
		require_once dirname ( __FILE__ ) . "/Common/PaymentResult.php";
		
		switch (trim ( strtolower ( ($arr_folders [1]) ) )) {
			case "gateway" :
				require_once dirname ( __FILE__ ) . "/Common/GatewayInterface.php";
				require_once dirname ( __FILE__ ) . "/Common/Gateway.php";
				require_once dirname ( __FILE__ ) . "/Payment/Gateway/" . ucfirst ( $arr_folders [2] ) . ".php";
				break;
			case "integration" :
				require_once dirname ( __FILE__ ) . "/Common/IntegrationInterface.php";
				require_once dirname ( __FILE__ ) . "/Common/Integration.php";
				require_once dirname ( __FILE__ ) . "/Payment/Integration/" . ucfirst ( $arr_folders [2] ) . ".php";
				break;
			case "offline" :
				require_once dirname ( __FILE__ ) . "/Common/OfflineInterface.php";
				require_once dirname ( __FILE__ ) . "/Common/Offline.php";
				require_once dirname ( __FILE__ ) . "/Payment/Offline/" . ucfirst ( $arr_folders [2] ) . ".php";
				break;
		}
	
		return new $paymentmethod ( array (
				"paymentmethod" => $paymentmethod 
		) );
	}
}

?>
