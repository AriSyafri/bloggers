<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Exception;
use Illuminate\Database\QueryException;


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
            'slug' => 'required|unique:categories',
            'color' => 'required'
        ]);

        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success', 'New category added');
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

        // return view('dashboard.categories.edit', [
        //     'title' => 'Edit',
        //     'category' => $category
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        // @dd($request);

        $rules = [
            'name' => 'required|max:255',
            'color' => 'required'
        ];

        if($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Category::destroy($category->id);

        // return redirect('/dashboard/categories')->with('success', 'Post has been delete');

        try {
            Category::destroy($category->id);
            return redirect('/dashboard/categories')->with('success', 'Kategori berhasil dihapus.');
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") { // Kode error foreign key constraint
                return redirect('/dashboard/categories')->with('error', 'Kategori tidak dapat dihapus karena masih digunakan di data lain.');
            }
            return redirect('/dashboard/categories')->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }


    }

    public function checkSlugCategory(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }


}
