<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseCategoryStoreRequest;
use App\Http\Requests\Admin\CourseCategoryUpdateRequest;
use App\Models\CourseCategory;
use App\Traits\FileUpload;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $categories = CourseCategory::whereNull('parent_id')->paginate(10);
        return view('admin.course.course-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.course-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCategoryStoreRequest $request) : RedirectResponse
    {
        $imagePath = $this->uploadFile($request->file('image'));
        $category = new CourseCategory();
        $category->image = $imagePath;
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->show_at_trending = $request->show_at_trending ? 1 : 0;
        $category->status = $request->status ? 1 : 0;
        $category->save();

        notyf()->success('Category created successfully');

        return to_route('admin.course-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $course_category) : View
    {
        return view('admin.course.course-category.edit', compact('course_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCategoryUpdateRequest $request, CourseCategory $course_category)
    {
        $category = $course_category;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request->file('image'));
            $this->deleteFile($category->image);
            $category->image = $imagePath;
        }
        
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->show_at_trending = $request->show_at_trending ? 1 : 0;
        $category->status = $request->status ? 1 : 0;
        $category->save();

        notyf()->success('Category updated successfully');

        return to_route('admin.course-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $course_category)
    {
        if (CourseCategory::where('parent_id', $course_category->id)->exists()) {
            return response(['message' => 'Cannot delete this category'], 422);
        }
        try {
            if($course_category->image){
                $this->deleteFile($course_category->image);
            }
            $course_category->delete();
            notyf()->success('Category deleted successfully');
            return response(['message' => 'Category deleted successfully'], 200);
        } catch (Exception $e) {
            return response(['message' => 'Something went wrong'], 500);
        }
    }
}
