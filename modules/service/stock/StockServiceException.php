<?php
namespace app\modules\service\stock;

use app\modules\service\ServiceException;
 
class StockServiceException extends ServiceException {
	function __construct($message = null, $code = 0) {
		parent::__construct($message, $code);
	}
}
