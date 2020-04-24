<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputSelectComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $label;
    public $name;
    public $current;
    public $options;


    public function __construct($label, $name, $options, $current = null, $id = null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->current = $current;
        $this->options = $options;

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
        return view('components.input-select-component');
    }
}
