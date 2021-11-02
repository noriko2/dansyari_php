<?php
// app/View/Components/GuestLayout.php
// ...<x-guest-layout>として呼び出される本体
// ...resources/views/layouts/guest.blade.php(レイアウトファイル) が返される

namespace App\View\Components;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.guest');
    }
}
