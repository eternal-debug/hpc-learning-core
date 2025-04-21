<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseSubCategoryStoreRequest;
use App\Http\Requests\Admin\CourseSubCategoryUpdateRequest;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use App\Traits\FileUpload;
use Exception;

class CourseSubCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(CourseCategory $course_category)
    {
        $subCategories = CourseCategory::where('parent_id', $course_category->id)->paginate(10);
        return view('admin.course.course-sub-category.index', compact('subCategories', 'course_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CourseCategory $course_category)
    {
        return view('admin.course.course-sub-category.create', compact('course_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseSubCategoryStoreRequest $request, CourseCategory $course_category)
    {
        $category = new CourseCategory();
        if($request->hasFile('image')){
            $imagePath = $this->uploadFile($request->file('image'));
            $category->image = $imagePath;
            
        }
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->parent_id = $course_category->id;
        $category->show_at_trending = $request->show_at_trending ? 1 : 0;
        $category->status = $request->status ? 1 : 0;
        $category->save();

        notyf()->success('Subcategory created successfully');

        return to_route('admin.course-sub-category.index', $course_category->id);
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
    public function edit(CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        return view('admin.course.course-sub-category.edit', compact('course_category', 'course_sub_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseSubCategoryUpdateRequest $request, CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        $subCategory = $course_sub_category;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request->file('image'));
            $this->deleteFile($subCategory->image);
            $subCategory->image = $imagePath;
        }
        
        $subCategory->icon = $request->icon;
        $subCategory->name = $request->name;
        $subCategory->slug = \Str::slug($request->name);
        $subCategory->parent_id = $course_category->id;
        $subCategory->show_at_trending = $request->show_at_trending ? 1 : 0;
        $subCategory->status = $request->status ? 1 : 0;
        $subCategory->save();

        notyf()->success('Subcategory updated successfully');

        return to_route('admin.course-sub-category.index', $course_category->id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        try {
            if($course_sub_category->image){
                $this->deleteFile($course_sub_category->image);
            }
            $course_sub_category->delete();
            notyf()->success('Subcategory deleted successfully');
            return response(['message' => 'Subcategory deleted successfully'], 200);
        } catch (Exception $e) {
            return response(['message' => 'Something went wrong'], 500);
        }
    }
}
