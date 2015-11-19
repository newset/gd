<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class CookController extends Controller
{
    private $ins_name = null;
    private $action_name = null;

    /* 权限添加
     * 第一级为用户类型
     * 第二级为model名
     * 第三级为方法名
     * */
    private $permission_api_set = [];

    public function __construct()
    {
        $this->permission_api_set = config('permission');
    }

    public function lastId($p1 = null, $p2=null)
    {
        if (!$p1) {
            return ee(2, 'ins_not_exists');
        }

        if (class_exists(MName($p1, 'i'))) {
            $ins = M($p1, 'i');
        }

        return $ins->lastId($p2);
    }

    public function has_permission($ins_name, $action_name)
    {
        if (in_array($ins_name, config('permission.public_ins')) || $action_name == 'exist') return true; // for user login or signup.
        if (he_is('employee')) return true;

        foreach ($this->permission_api_set as $test_chara => $user_type_set)
        {
            if (he_is($test_chara))
            {
                if ( ! array_key_exists($ins_name, $this->permission_api_set[$test_chara])) return false;
                if ( ! in_array($action_name, $this->permission_api_set[$test_chara][$ins_name])) return false;
                return true;
            }
        }
    }

    /**
     * page method
     * @return [type] [description]
     */
    public function page($page = '')
    {   
        $exist = View::exists($page);
        if ($exist) {
            return view($page);
        }else{
            abort(404);
        }
        
    }

    /**
     * 请求
     * @param  [type] $ctrl   [description]
     * @param  [type] $action [description]
     * @param  string $params [description]
     * @return [type]         [description]
     */
    public function cook($ctrl, $action, $params = '')
    {
        // If exists model in univ, use it.
        if (class_exists(MName($ctrl, 'v')) && !rq('write_data'))
        {
            $ins = new M($ctrl, 'v');
        }
        else if (class_exists(MName($ctrl, 'i')))
        {
            $ins = M($ctrl, 'i');
        } else {
            return ee(2);
        }

        // 权限检查

        // 方法调用 是否存在
        return call_user_func_array([$ins, $action], explode('/', $params));
    }

}