<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function store(Request $request){
        // dd($request->all()); //仅输出 接收到的数据
        // dd($request->user());   //输出登录用户信息，具体查看  attributes 下表内的数据
        //将接收的数据插入到数据库方法一：
        $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' => $this->thumb($request)
        ]);

        // 将接收的数据插入到数据库方法二：
        // Project::create([
        //     'name' => $request->name,
        //     'thumbnail' => $this->thumb($request),
        //     'user_id' => $request->user()->id
        // ]);
    }

    /**
     * 存储文件，文件名随机生成，返回值为文件路径
     * $request->thumbnail->store('path')
     *
     * 自定义文件名存储文件，返回值为文件路径
     * $request->thumbnail->storeAs('path','file_name')
     *
     *  获取文件后缀，如png,jpeg,gif...
     * $request->thumbnail->extension();
     */
    public function thumb($request){
        return $request->hasFile('thumbnail') ? $request->thumbnail->store('public/thumbs') : null;
    }
}
