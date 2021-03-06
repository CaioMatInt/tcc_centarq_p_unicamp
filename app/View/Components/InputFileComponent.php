<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputFileComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $label;
    public $class;
    public $name;
    public $value;

    public function __construct($name, $value = null, $class = null, $id = null, $label = null)
    {
        $this->id = $id;
        $this->label = $label;
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
        return view('components.input-file-component');
    }
}
