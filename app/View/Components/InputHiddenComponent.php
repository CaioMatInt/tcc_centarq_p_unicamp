<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputHiddenComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $value;
    public $id;

    public function __construct($name, $value = null, $id = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if(!$this->id){
            $this->id = $this->name;
        }
        return view('components.input-hidden-component');
    }
}
