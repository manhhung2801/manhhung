<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter;


class MenuController extends Controller
{
     protected $menuService;

     public function __construct(MenuService $menuService)
     {
         $this->menuService = $menuService;
     }
     public function create(){
         return view('admin.menu.add', [
             'title' => 'Thêm Danh Mục mới',
             'menus' => $this->menuService->getParent()
         ]);
     }

     public function store(CreateFormRequest $request){
            $this->menuService->create($request);

           return redirect()->back();
     }

     public function index()
     {
         return view('admin.menu.list', [
             'title' => 'Danh Sách Danh Mục Mới Nhất',
             'menus' => $this->menuService->getAll()
         ]);
     }

     public function destroy(Request $request)
     {
          $result = $this->menuService->destroy($request);

          if($result) {
              return response()->json([
                  'error' => false,
                  'message' => 'Xóa thành công danh '
              ]);
          }

             return response()->json([
                 'error' => true
             ]);

     }
}
