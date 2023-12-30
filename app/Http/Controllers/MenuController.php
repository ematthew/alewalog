<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Role;
use App\Models\MenuRole;
use Auth, DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::with('menuRoles')->get();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = Route::getRoutes();

        return view('menu.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        //
    }

    public function addOne(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->route = $request->menu_route;
        $menu->save();

        $data = [
            "status" => "success",
            "message" => "Menu created"
        ];

        return redirect()->back()->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function role(Menu $menu, $id)
    {
        $menu = Menu::find($id);

        $roles = Role::all();
        return view('menu.role', compact('roles', 'menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function assignRole(Request $request)
    {
        if (Auth::user()->user_type == 'super') {

            // clean default role
            DB::statement("delete from menu_roles where menu_id = {$request->menu_id}");

            foreach ($request->roles as $key => $value) {
                # code...
                $menu_role = new MenuRole();
                $menu_role->role_id = $value;
                $menu_role->menu_id = $request->menu_id;
                $menu_role->save();
            }

            return redirect('/menus')->with('success', 'Menu Data is successfully updated');
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }
}
