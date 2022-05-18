<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Page;

class PageComposer
{
    protected $Pages;
    //
    public function __construct(Page $Pages)
    {
        $this->Pages = $Pages;
    }
    //
    public function compose(View $view)
    {
        # code...
        return $view->with('pages', $this->Pages->all());
    }
}
