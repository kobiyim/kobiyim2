<?php

namespace Kobiyim\Metronic\Components;

use Illuminate\View\Component;

class SystemLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Init layout file
        app(config('metronic.KT_THEME_BOOTSTRAP.system'))->init();
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('kobiyim.'.config('metronic.KT_THEME_LAYOUT_DIR').'._system');
    }
}
