<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{

    /**
     * Show the page of a category identified by id
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(int $id)
    {
        return view('category.show', ['category' => Category::findOrFail($id)]);
    }

    /**
     * Show page with all categories
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function showAll()
    {
        return view('category.showAll', ['categories' => Category::all()]);
    }

}