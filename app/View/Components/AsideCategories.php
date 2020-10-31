<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AsideCategories extends Component
{
  public array $categories = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.aside-categories');
    }
}
