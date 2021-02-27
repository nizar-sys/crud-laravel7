<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type_bg;
    public $title_msg;
    public $alertmsg;
    public function __construct($type, $title, $alertmsg)
    {
        $this->type_bg = $type;
        $this->title_msg = $title;
        $this->alertmsg = $alertmsg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
