<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Title tag content.
     *
     * @var string
     */
    public string $title = '';

    /**
     * Header of the page.
     *
     * @var string
     */
    public string $header = '';

    public bool $contentTop;

    public function __construct(string $title, string $header, bool $contentTop = false)
    {
        $this->title = $title;
        $this->header = $header;
        $this->contentTop = $contentTop;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): \Illuminate\View\View
    {
        return view('layouts.app');
    }
}
