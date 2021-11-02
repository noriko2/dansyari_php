<?php
// app/View/Components/AppLayout.php
// ...<x-app-layout>として呼び出される本体
// ...resources/views/layouts/app.blade.php(レイアウトファイル) が返される

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
