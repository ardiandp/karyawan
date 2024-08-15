<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Menu;
class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $menu = Menu::where('parent_id', 0)->get();
       
        foreach ($menu as $key => $value) {
            $menu[$key]->submenu = Menu::where('parent_id', $value->id)->get();
        }
        $menu = Menu::where('parent_id', null)->with('submenu')->get();
        
        view()->share('menu', $menu);
        return $next($request);
    }
}
