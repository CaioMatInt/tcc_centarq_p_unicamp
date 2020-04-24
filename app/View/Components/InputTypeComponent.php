<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputTypeComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $label;
    public $type;
    public $class;
    public $name;
    public $value;

    public function __construct($label, $type, $name, $value = null, $class = null, $id = null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->class = $class;
        $this->name = $name;
        $this->value = $value;
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

        return view('components.input-type-component');
    }
}
