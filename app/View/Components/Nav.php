<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Nav extends Component
{
    public array $links = [
        ["title" => "главная", "href" => "/"],
        ["title" => "мои заказы", "href" => "#"],
        ["title" => "новости", "href" => "#"],
        ["title" => "о компании", "href" => "#"],
    ];

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav');
    }
}
