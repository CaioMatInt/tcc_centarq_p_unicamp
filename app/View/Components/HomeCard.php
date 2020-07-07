<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HomeCard extends Component
{

    public $title;
    public $number;
    public $iconClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $number, $iconClass)
    {
        $this->title = $title;
        $this->number = $number;
        $this->iconClass = $iconClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.home-card');
    }
}
