<?php
function menu($name = 'Main', $main = 'ul', $mClass = '', $sclass = '', $smclass = '', $ssclass = '')
{
    $out = '<' . $main . ' class="' . $mClass . '">';
    foreach (getMenu($name) as $menus) {
        $out .= '<li class="' . $sclass . '" data-id="' . $menus['item']['id'] . '">';
        foreach ($menus as $key => $menu) {
            if ($key == 'item') {
                $out .= extractHtml($menu);
            }
            if ($key == 'sub') {
                $out .= extractSubMenu($menu, $main, $smclass, $ssclass);
            }
        }
        $out .= '</li>';
    }
    $out .= '</' . $main . '>';
    return $out;
}

function getMenu($name)
{

    if ($name == 'Admin') {
        $user = Auth::user();
        $permissionsModel = new \App\Application\PermissionTraits\PermissionsModel();
        $array = [];
        foreach (get($name) as $mainKey => $main) {
            foreach ($main as $m) {
                if ($mainKey == 0) {
                    if (getModalFromItem($m->link) != "home") {
                        $can = $permissionsModel->can($user, 'view', getModalFromItem($m->link));
                        if (count($can) > 0) {
                            $array[$m->id] = ['item' => menuArray($m)];
                        } else {
                            if (foundItem($user, $permissionsModel, $m))
                                $array[$m->id] = ['item' => menuArray($m)];
                        }
                    } else {
                        $array[$m->id] = ['item' => menuArray($m)];
                    }
//                    $array[$m->id] = ['item' => menuArray($m)];


                } else {
                    if (array_key_exists($m->parent_id, $array)) {
                        if (array_key_exists('sub', $array[$m->parent_id])) {
                            $can = $permissionsModel->can($user, 'view', getModalFromItem($m->link));
                            if (count($can) > 0)
                                $array[$m->parent_id]['sub'] = array_merge($array[$m->parent_id]['sub'], [menuArray($m)]);
                        } else {
                            $can = $permissionsModel->can($user, 'view', getModalFromItem($m->link));
                            if (count($can) > 0)
                                $array[$m->parent_id] = array_merge($array[$m->parent_id], ['sub' => [menuArray($m)]]);
                        }
                    } else {
                        $can = $permissionsModel->can($user, 'view', getModalFromItem($m->link));
                        if (count($can) > 0)
                            $array[$m->id] = ['item' => menuArray($m)];
                    }
                }
            }
        }

        return $array;
    } else {
        $array = [];
        foreach (get($name) as $mainKey => $main) {
            foreach ($main as $m) {
                if ($mainKey == 0) {
                    $array[$m->id] = ['item' => menuArray($m)];


                } else {
                    if (array_key_exists($m->parent_id, $array)) {
                        if (array_key_exists('sub', $array[$m->parent_id])) {
                            $array[$m->parent_id]['sub'] = array_merge($array[$m->parent_id]['sub'], [menuArray($m)]);
                        } else {
                            $array[$m->parent_id] = array_merge($array[$m->parent_id], ['sub' => [menuArray($m)]]);
                        }
                    } else {
                        $array[$m->id] = ['item' => menuArray($m)];
                    }
                }
            }
        }

        return $array;

    }


}

function get($name)
{
    return \App\Application\Model\Menu::where('name', $name)->with(['item' => function ($query) {
        return $query->orderBy('order', 'asc');
    }])->first()->item->groupBy('parent_id');
}

function menuArray($main)
{
    return [
        'name' => $main->name,
        'icon' => $main->icon,
        'link' => $main->link,
        'type' => $main->type,
        'id' => $main->id,
        'order' => $main->order,
        'parent_id' => $main->order,
    ];
}

function extractHtml($main)
{
    $out = '<a href="' . $main['link'] . '" title="' . $main['name'] . '" target="' . $main['type'] . '">';
    if ($main['icon'] != '') {
        $out .= $main['icon'];
    }
    $out .= getDefaultValueKey($main['name']);
    $out .= '</a>';
    return $out;
}

function extractSubMenu($sub, $main = 'ul', $smclass = '', $ssclass = '')
{
    $out = '<' . $main . ' class="' . $smclass . '">';
    foreach ($sub as $s) {
        $out .= '<li class="' . $ssclass . '" data-id="' . $s['id'] . '">';
        $out .= extractHtml($s);
        $out .= '</li>';
    }
    $out .= '</' . $main . '>';
    return $out;
}

////////////////////////////
//moutaz

function foundItem($user, $permissionsModel, $main)
{
    $items = \App\Application\Model\Item::where('parent_id', $main->id)->get();
    foreach ($items as $item) {
        $can = $permissionsModel->can($user, 'view', getModalFromItem($item->link));
        if (count($can) > 0)
            return true;
    }
    return false;
}

function getModalFromItem($link)
{
    $model = str_replace("/", "", str_replace("admin/", "", $link));

//    getPermissionModel($model);
    return $model;

}

function checkMenuSelect($link){

    if (strpos( Route::getFacadeRoot()->current()->uri(),$link) !== false) {

       return true;
    }else{
        return false;
    }


}




