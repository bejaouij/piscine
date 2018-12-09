<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 09/12/2018
 * Time: 17:20
 */

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