<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

use Validator, Schema, Carbon\Carbon;

class BaseModel extends Model
{
	//use SoftDeletes;

    public $model;
    public $defaultOrderRule = 'id asc';

    /**
     * The validator rule
     */
    public $createRule = [];
    public $updateRule = [];

    public $messages = [
        'required' => '该值必须能填写.',
        'unique' => '该值已存在.',
    ];

    public function __construct($prefix = '')
    {
        $this->table = table_name($this->ins_name, $prefix);
    }

    /**
     * @return array of all fields.
     */
    public function all_fields()
    {
        return Schema::getColumnListing($this->table);
    }

    /**
     * 把Model安全的字段返回给前台
     */
    public function getSafeColumns($model = null)
    {
        if ($model) {
            foreach ($this->guarded as $coloum){
                if ($coloum != 'id'){
                    $model->$coloum = null;
                }
            }
            return $model;
        } else{
            foreach ($this->guarded as $coloum){
                if ($coloum != 'id'){
                    $this->$coloum = null;
                }
            }
        }
    }
}