<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategpris = Kategori::all();
        $menus = Menu::join('kategoris','menus.idkategori','=','kategoris.idkategori')->select(['menus.*','kategoris.*'])->paginate(3);
        return view('Backend.menu.select',['menus'=>$menus,'kategoris'=>$kategpris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategpris = Kategori::all();
        return view('Backend.menu.insert',['kategoris'=>$kategpris]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gambar' => 'required|max:2048',
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required'
        ]);

        $id = $request->idkategori;

        $namagambar = $request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('images'),$namagambar);

        Menu::create([
            'idkategori' => $id,
            'menu' => $data['menu'],
            'deskripsi' => $data['deskripsi'],
            'harga' => $data['harga'],
            'gambar' => $namagambar
        ]);
        return redirect('admin/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($idmenu)
    {
        Menu::where('idmenu','=',$idmenu)->delete();
        return redirect('admin/menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($idmenu)
    {
        $kategoris = Kategori::all();
        $menu = Menu::where('idmenu',$idmenu)->first();
        return view('Backend.menu.update',['menu'=>$menu,'kategoris'=>$kategoris]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idmenu)
    {
        if (isset($request->gambar)){
            $namagambar = $request->file('gambar')->getClientOriginalName();
            $data = $request->validate([
                'gambar' => 'required|max:2048',
                'menu' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required'
            ]);

            Menu::where('idmenu',$idmenu)->update([
                'gambar' => $data['gambar'],
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'gambar' => $namagambar
            ]);
            $request->gambar->move(public_path('images'),$namagambar);
        }
        
        else{
            $data = $request->validate([
                'menu' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required'
            ]);

            Menu::where('idmenu',$idmenu)->update([
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'harga' => $data['harga']
            ]);
    
        }

        return redirect('admin/menu');
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

    public function select(Request $request)
    {
        $id = $request->idkategori;
        $kategpris = Kategori::all();
        $menus = Menu::join('kategoris','menus.idkategori','=','kategoris.idkategori')
        ->select(['menus.*','kategoris.*'])
        ->where('menus.idkategori',$id)
        ->paginate(3);
        return view('Backend.menu.select',['menus'=>$menus,'kategoris'=>$kategpris]);
    }
}
