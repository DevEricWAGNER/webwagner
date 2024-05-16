<?php

namespace App\View\Components;

use App\Models\Menu;
use App\Models\Service;
use App\Models\SiteInfo;
use Illuminate\View\Component;
use Illuminate\View\View;

class HomeLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $siteinfos = SiteInfo::all();
        $services = Service::all();
        $menus = Menu::where('group_id', NULL)->orderBy('ordre')->get();

        foreach($menus as $menu) {
            if($menu->is_group) {
                $menu->subMenus = Menu::where('group_id', $menu->id)->orderBy('ordre')->get();
                foreach($menu->subMenus as $subMenu) {
                    $subMenu->subMenus = Menu::where('group_id', $subMenu->id)->orderBy('ordre')->get();
                }
            }
        }
        return view('layouts.home', [
            'siteinfo' => $siteinfos[0],
            'services' => $services,
            'menus' => $menus
        ]);
    }
}