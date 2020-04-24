<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BreadcumbUserLocationComponent extends Component

{
    public $previousLinks;

    public $pageTitle;

    public function __construct($previousLinks, $pageTitle)
    {
        $this->previousLinks = $previousLinks;
        $this->pageTitle = $pageTitle;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.breadcumb-user-location-component');
    }
}
