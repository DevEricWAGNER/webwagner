<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Menu::class);
        $menus = Menu::orderBy('ordre')->get();
        $menusExemple = Menu::where('group_id', NULL)->orderBy('ordre')->get();

        foreach($menusExemple as $menu) {
            if($menu->is_group) {
                $menu->subMenus = Menu::where('group_id', $menu->id)->orderBy('ordre')->get();
                foreach($menu->subMenus as $subMenu) {
                    $subMenu->subMenus = Menu::where('group_id', $subMenu->id)->orderBy('ordre')->get();
                }
            }
        }
        return view('admin.menu.index', [
            'menus' => $menus,
            'menusExemple' => $menusExemple
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('viewAny', Menu::class);
        $menus = Menu::where('is_group', 1)->orderBy('ordre')->get();

        return view('admin.menu.create', [
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('viewAny', Menu::class);
        $latestMenu = Menu::orderBy('ordre', 'desc')->first();
        if ($request["is_group"]) {
            $request["is_group"] = 1;
            if ($request["backoffice_color"] == "-") {
                return redirect()->back()->with('error', 'Vous devez spécifier une couleur.');
            }
            else {
                if ($request["belongstogroup"]) {
                    if ($request["group_id"]) {
                        $data = [
                            'name' => $request["name"],
                            'backoffice_color' => $request["backoffice_color"],
                            'link' => null,
                            'is_route_link' => 0,
                            'is_group' => $request["is_group"],
                            'group_id' => intval($request["group_id"]),
                            'ordre' => $latestMenu->ordre + 1
                        ];
                    } else {
                        return redirect()->back()->with('error', 'Vous devez spécifier un groupe.');
                    }
                } else {
                    $data = [
                        'name' => $request["name"],
                        'link' => null,
                        'backoffice_color' => $request["backoffice_color"],
                        'group_id' => null,
                        'is_route_link' => 0,
                        'is_group' => $request["is_group"],
                        'ordre' => $latestMenu->ordre + 1
                    ];
                }
            }
        } else {
            $request["is_group"] = 0;
            if ($request["link"] != "") {
                if ($request["is_route_link"]) {
                    $request["is_route_link"] = 1;
                    if ($request["belongstogroup"]) {
                        if ($request["group_id"]) {
                            $data = [
                                'name' => $request["name"],
                                'link' => $request["link"],
                                'is_group' => $request["is_group"],
                                'is_route_link' => $request["is_route_link"],
                                'backoffice_color' => "",
                                'group_id' => intval($request["group_id"]),
                                'ordre' => $latestMenu->ordre + 1
                            ];
                        } else {
                            return redirect()->back()->with('error', 'Vous devez spécifier un groupe.');
                        }
                    } else {
                        $data = [
                            'name' => $request["name"],
                            'link' => $request["link"],
                            'backoffice_color' => "",
                            'is_group' => $request["is_group"],
                            'group_id' => null,
                            'is_route_link' => $request["is_route_link"],
                            'ordre' => $latestMenu->ordre + 1
                        ];
                    }
                } else {
                    $request["is_route_link"] = 0;
                    if (strpos($request["link"], "/#") === 0) {
                        if ($request["belongstogroup"]) {
                            if ($request["group_id"]) {
                                $data = [
                                    'name' => $request["name"],
                                    'link' => $request["link"],
                                    'backoffice_color' => "",
                                    'is_group' => $request["is_group"],
                                    'is_route_link' => $request["is_route_link"],
                                    'group_id' => intval($request["group_id"]),
                                    'ordre' => $latestMenu->ordre + 1
                                ];
                            } else {
                                return redirect()->back()->with('error', 'Vous devez spécifier un groupe.');
                            }
                        } else {
                            $data = [
                                'name' => $request["name"],
                                'link' => $request["link"],
                                'is_route_link' => $request["is_route_link"],
                                'backoffice_color' => "",
                                'group_id' => null,
                                'is_group' => $request["is_group"],
                                'ordre' => $latestMenu->ordre + 1
                            ];
                        }
                    } elseif (strpos($request["link"], "http") === 0) {
                        if ($request["belongstogroup"]) {
                            if ($request["group_id"]) {
                                $data = [
                                    'name' => $request["name"],
                                    'link' => $request["link"],
                                    'is_route_link' => $request["is_route_link"],
                                    'backoffice_color' => "",
                                    'is_group' => $request["is_group"],
                                    'group_id' => intval($request["group_id"]),
                                    'ordre' => $latestMenu->ordre + 1
                                ];
                            } else {
                                return redirect()->back()->with('error', 'Vous devez spécifier un groupe.');
                            }
                        } else {
                            $data = [
                                'name' => $request["name"],
                                'link' => $request["link"],
                                'backoffice_color' => "",
                                'is_route_link' => $request["is_route_link"],
                                'group_id' => null,
                                'is_group' => $request["is_group"],
                                'ordre' => $latestMenu->ordre + 1
                            ];
                        }
                    } else {
                        return redirect()->back()->with('error', 'Vous devez spécifier un lien sous le format /# pour la page d\'accueil ou commençant par http:// ou https://.');
                    }
                }
            } else {
                return redirect()->back()->with('error', 'Vous devez spécifier un lien.');
            }
        }
        $menu = new Menu();
        $menu->fill($data);
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $this->authorize('viewAny', Menu::class);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $this->authorize('viewAny', Menu::class);
        $menus = Menu::where('is_group', 1)->orderBy('ordre')->get();
        return view('admin.menu.edit', [
            'menu' => $menu,
            'menus' => $menus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $this->authorize('viewAny', Menu::class);
        if ($request["is_group"]) {
            $request["is_group"] = 1;
            if ($request["backoffice_color"] == "-") {
                return redirect()->back()->with('error', 'Vous devez spécifier une couleur.');
            }
            else {
                if ($request["belongstogroup"]) {
                    if ($request["group_id"]) {
                        $data = [
                            'name' => $request["name"],
                            'backoffice_color' => $request["backoffice_color"],
                            'link' => null,
                            'is_route_link' => 0,
                            'is_group' => $request["is_group"],
                            'group_id' => intval($request["group_id"]),
                            'ordre' => $menu->ordre
                        ];
                    } else {
                        return redirect()->back()->with('error', 'Vous devez spécifier un groupe.');
                    }
                } else {
                    $data = [
                        'name' => $request["name"],
                        'link' => null,
                        'backoffice_color' => $request["backoffice_color"],
                        'group_id' => null,
                        'is_route_link' => 0,
                        'is_group' => $request["is_group"],
                        'ordre' => $menu->ordre
                    ];
                }
            }
        } else {
            $request["is_group"] = 0;
            if ($request["link"] != "") {
                if ($request["is_route_link"]) {
                    $request["is_route_link"] = 1;
                    if ($request["belongstogroup"]) {
                        if ($request["group_id"]) {
                            $data = [
                                'name' => $request["name"],
                                'link' => $request["link"],
                                'is_group' => $request["is_group"],
                                'is_route_link' => $request["is_route_link"],
                                'backoffice_color' => "",
                                'group_id' => intval($request["group_id"]),
                                'ordre' => $menu->ordre
                            ];
                        } else {
                            return redirect()->back()->with('error', 'Vous devez spécifier un groupe.');
                        }
                    } else {
                        $data = [
                            'name' => $request["name"],
                            'link' => $request["link"],
                            'backoffice_color' => "",
                            'is_group' => $request["is_group"],
                            'group_id' => null,
                            'is_route_link' => $request["is_route_link"],
                            'ordre' => $menu->ordre
                        ];
                    }
                } else {
                    $request["is_route_link"] = 0;
                    if (strpos($request["link"], "/#") === 0) {
                        if ($request["belongstogroup"]) {
                            if ($request["group_id"]) {
                                $data = [
                                    'name' => $request["name"],
                                    'link' => $request["link"],
                                    'backoffice_color' => "",
                                    'is_group' => $request["is_group"],
                                    'is_route_link' => $request["is_route_link"],
                                    'group_id' => intval($request["group_id"]),
                                    'ordre' => $menu->ordre
                                ];
                            } else {
                                return redirect()->back()->with('error', 'Vous devez spécifier un groupe.');
                            }
                        } else {
                            $data = [
                                'name' => $request["name"],
                                'link' => $request["link"],
                                'is_route_link' => $request["is_route_link"],
                                'backoffice_color' => "",
                                'group_id' => null,
                                'is_group' => $request["is_group"],
                                'ordre' => $menu->ordre
                            ];
                        }
                    } elseif (strpos($request["link"], "http") === 0) {
                        if ($request["belongstogroup"]) {
                            if ($request["group_id"]) {
                                $data = [
                                    'name' => $request["name"],
                                    'link' => $request["link"],
                                    'is_route_link' => $request["is_route_link"],
                                    'backoffice_color' => "",
                                    'is_group' => $request["is_group"],
                                    'group_id' => intval($request["group_id"]),
                                    'ordre' => $menu->ordre
                                ];
                            } else {
                                return redirect()->back()->with('error', 'Vous devez spécifier un groupe.');
                            }
                        } else {
                            $data = [
                                'name' => $request["name"],
                                'link' => $request["link"],
                                'backoffice_color' => "",
                                'is_route_link' => $request["is_route_link"],
                                'group_id' => null,
                                'is_group' => $request["is_group"],
                                'ordre' => $menu->ordre
                            ];
                        }
                    } else {
                        return redirect()->back()->with('error', 'Vous devez spécifier un lien sous le format /# pour la page d\'accueil ou commençant par http:// ou https://.');
                    }
                }
            } else {
                return redirect()->back()->with('error', 'Vous devez spécifier un lien.');
            }
        }
        $menu->fill($data);
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $this->authorize('viewAny', Menu::class);
        //
    }
}