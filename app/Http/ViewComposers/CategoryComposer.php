<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    protected $categories;
    //
    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }
    //
    public function compose(View $view)
    {
        # code...
        return $view->with('categories', Category::all());
    }
}
