<?php

namespace App\View\Components;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    public LengthAwarePaginator|null $paginator;

    public function __construct(string $title, string $header, bool $contentTop = false, LengthAwarePaginator|null $paginator = null)
    {
        $this->title = $title;
        $this->header = $header;
        $this->contentTop = $contentTop;
        $this->paginator = $paginator;
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
