<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use AuthorizesRequests;


    public function index()
    {
        $query = Category::query();

        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        $categories = $query->paginate(10);

        return view('dashboard.categories.index', [
            'title' => 'Category',
            'categories' => $categories
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => 'Create Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'color' => 'required'
        ]);

        Category::create($validatedData);
        return redirect('/dashboard/categories/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
