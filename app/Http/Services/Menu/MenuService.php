<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\returnArgument;


class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
                  Menu::create([
                      'name' => (string) $request->input('name'),
                      'parent_id' => (integer) $request->input('parent_id'),
                      'description' => (string) $request->input('description'),
                      'content' => (string) $request->input('content'),
                      'active' => (string) $request->input('active')
                  ]);
                  Session::flash('success', 'Tạo Danh Mục Thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $menu)
    {
        if($request->input('parent_id') == $menu->id){
             $menu->parent_id = (int) $request->input('parent_id');
             return false;
        }

        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->parent_id = (int) $request->input('parent_id');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active');
        $menu->save();

        Session::flash('success', 'Cập nhật thành công danh mục');
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');

        $menu = Menu::where('id', $id)->first();
        if($menu){
           return  Menu::where('id', $id)->orWhere('parent_id', $id)->delete();


        }

        return false;
    }
}
