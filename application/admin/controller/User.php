<?php

namespace app\admin\controller;

use app\admin\model\role;
use think\Controller;
use think\Request;

class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //显示列表
       $data =  role::paginate(1)->toArray();
//       print_r($data);
       return json([
           'code'=>0,
           'msg'=>'',
           'count'=>$data['total'],
           'data'=>$data['data']
       ]);

    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return '显示资源单';
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request->param();
        $rule=[
            'role_name'=>'require|length:1,20|unique:role',
            'describe'=>'max:255'
        ];
        $msg=[
            'role_name.require'=>'角色名称为必填项',
            'role_name.length'=>'角色名称长度为1-20',
            'role_name.unique'=>'角色名称不能重复',
            'describe.max'=>'描述最大为255'
        ];
       $check= $this->validate($data,$rule,$msg);

       if ($check===true){


           if (role::create($data)){
               $this->success('成功');
           }else{
               $this->error('失败');
           }



       }else{
           $this->error($check);
       }






    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
        return '显示指定资源';
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        return '显示编辑资源表单页';
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        return '更新资源';
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        return '删除资源';
    }
}
