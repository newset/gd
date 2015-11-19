<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SoapBox\Formatter\Formatter;
use Response;

class ITicket extends BaseModel
{
	public $ins_name = 'tickets';

    public function sync($params = '')
    {
    	$rq = rq();	
    	$fields = [
    		'address' => '',
    		'helpdeskNumber' => '1234567',
	    	"reportedDate" => 201501012020,
	    	"event" => 'CREATE',
	    	"customerName" => "Test Customer",
			"customerAccountNumber" => "995",
			"customerHelpdeskNumber" => '',
			"customerTimezone" => "UTC",
			"project" => '',
			"projectNumber" => '',
			"productSerialNumber" => "SN123123",
			"productTag" => "Store12Device5",
			"productSystem" => '',
			"productDescription" => "POS",
			"productCustomerSerialnumber" => '',
			"installedAddress1" =>  "Heinz-Nixdorf-Ring 1",
			"installedAddress2" => '',
			"installedAddress3" => '',
			"installedAddress4" => '',
			"installedCity" => "Paderborn",
			"installedState" => '',
			"installedPostalcode" => "33106",
			"installedCountry" => "DE",
			"installedContact" => '',
			'installedPhone' => '',
			'installedFax' => '',
			'installedEmail' => '',
			"callerFirstName" => "John",
			"callerLastName" => "Doe",
			"callerPhone" => "+49525169330",
			"callerPhoneType" => "PHONE",
			"callerEmail" => "john.doe@wincor-nixdorf.com",
			'callerPreferredLanguage' => '',
			'callerPreferredComm' => '',
			"errorType" => "Partial Failure",
			"urgency" => "High",
			"summary" => "Display does not work",
			"customerErrorCode" => "ERROR12",
			'problemCode' => '',
			"ordertext1" => "Device does not start and display is black.",
			"ordertext2" => "Further analysis required.",
			"customerKey" => "INT_WN",
			"status" => "New",
			"channel" => "HTTP",
			"replyAddress" => "http://customer.com/servlet" ,
			"ownerName" => "PL1 AGT IFSO",
			'serviceRequestNumber' => '',
			'transactionNumber' => '',
			"targetDate" => "201501031200",
			'plannedEndCallback' => '',
			'plannedStartFieldService' => '',
			'plannedEndFieldService' => '',
			'sparepartProposal' => '',
			'preferredEngineer' => '',
			'ServiceProviderID' => '',
			'noteType' => '',
			'noteContent' => ''
    	];
		
    	// 创建 ticket
    	$xml = Formatter::make($fields, Formatter::XML)->toXml();;
    	
    	return Response::make($xml, 200)->header('Content-Type', 'text/xml');
    }
}
