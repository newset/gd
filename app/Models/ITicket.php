<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ITicket extends BaseModel
{
	public $ins_name = 'tickets';

    public function test($params = '')
    {
    	return ss($params);
    }
}
