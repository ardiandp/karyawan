<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class Menucontroller extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('menu.index', compact('menu'));
    }

    public function create()
    {
        $parents = Menu::where('parent_id', null)->get();
        return view('menu.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:menu',
            'slug' => 'required|unique:menu',
            'parent_id' => 'nullable|exists:menu,id',
            'order' => 'required|integer',
        ]);
        Menu::create($data);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit(Menu $menu)
    {
        $parents = Menu::where('parent_id', null)->get();
        return view('menu.edit', compact('menu', 'parents'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
    
        $data = $request->validate([
            'name' => 'required|unique:menu,name,' . $menu->id,
            'slug' => 'required|unique:menu,slug,' . $menu->id,
            'parent_id' => 'nullable|exists:menu,id',
            'order' => 'required|integer',
        ]);
        $menu->update($data);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diubah');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    }
}
