<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository;
use App\Http\Requests\CreateProjectRequest;
// App\Repositories\ProjectsRepository

class ProjectsController extends Controller
{
    protected $repo;
    // public function index(ProjectRepository $repo){

    // }

    public function __construct(ProjectsRepository $repo){
        //$repo为ProjectRepository这个实例
        $this->repo = $repo;
    }

    public function store(CreateProjectRequest $request){
        //CreateProjectRequest,是通过命令 php aritsan make:request CreateProjectRequest 创建的一个位于Requests目录下表单验证请求的一个类，用来控制表单提交是否重复、图片大小是否合理等需求。如果CreateProjectRequest中验证不通过，则程序不再继续进行。
        /*
            dd($request->all()); //仅输出 接收到的数据
            dd($request->user());   //输出登录用户信息，具体查看  attributes 下表内的数据
            将接收的数据插入到数据库方法一：
            $request->user()->projects()->create([
                'name' => $request->name,
                'thumbnail' => $this->thumb($request)
            ]);
            将接收的数据插入到数据库方法二：
            Project::create([
                'name' => $request->name,
                'thumbnail' => $this->thumb($request),
                'user_id' => $request->user()->id
            ]);
        */
        dd($request);
        $this->repo->create($request);

    }

}
