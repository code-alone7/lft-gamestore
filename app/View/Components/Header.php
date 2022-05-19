<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public string $phone = '33-333-33';

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): \Illuminate\Contracts\View\View|string|\Closure
    {
        return view('components.header');
    }
}
