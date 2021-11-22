<?php 

namespace App\Http\ViewComposer;

use App\Models\Category;
use Illuminate\View\View;

class SidebarViewComposer 
{
    protected $categories;

    public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    public function compose(View $view)
    {
        $categories = $this->categories->get();
        $view->with('categories', $categories);
    }
}