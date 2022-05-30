<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Nav extends Component
{
    public array $links = [];

    public function __construct()
    {   
        $this->links = [
            ["title" => __('nav.home'), "href" => route('home')],
            ["title" => __('nav.my-orders'), "href" => route('order.list')],
            ["title" => __('nav.news'), "href" => route('articles')],
            ["title" => __('nav.about'), "href" => route('about')],
        ];
    }    

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
