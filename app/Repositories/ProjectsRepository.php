<?php

namespace App\Repositories;
use Image;

class ProjectsRepository{

    public function create($request){
        $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' => $this->thumb($request)
        ]);
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
     *
     * //返回生成随机的文件名字
     * $request->thumbnail->hashName();
     */
    public function thumb($request){
        /**
         * 返回文件路径：
         * return $request->hasFile('thumbnail') ? $request->thumbnail->store('public/thumbs') : null;
         *
         */
        if($request->hasFile('thumbnail')){
            $thumb = $request->thumbnail;
            $name = $thumb->hashName();
            $thumb->storeAs('public/thumbs/original',$name); //储存原始图片位置

            $new_path = storage_path('app/public/thumbs/cropped/'.$name); //storage_path函数返回storage目录的完整路径。你也可以使用storage_path函数来设置存储目录下指定文件的完整路径：
            /**
             * Imgage图象处理类使用文档：http://image.intervention.io/getting_started/installation
             */
            Image::make($thumb)->resize(200,90)->save($new_path);
            return $name;
        }
    }
}
