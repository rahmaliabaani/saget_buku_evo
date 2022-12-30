<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buku;
use App\Models\Category;
use App\Services\ImageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BukuRequest;
use Symfony\Component\HttpFoundation\Response;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $bukus = Buku::with('category', 'firstMedia')->latest()->paginate(5); 

        return view('admin.bukus.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get(['id', 'name']);

        return view('admin.bukus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
       
        if ($request->validated()){
            $buku = Buku::create($request->except('images', '_token'));

            if ($request->images && count($request->images) > 0) {
                (new ImageService())->storeBukuImages($request->images, $buku);
            }

            return redirect()->route('admin.bukus.index')->with([
                'message' => 'success created !',
                'alert-type' => 'success'
            ]);
        }

        return back()->with([
            'message' => 'Something was wrong, please try again later',
            'alert-type' => 'danger'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {

        return view('admin.bukus.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        
        $categories = Category::latest()->get(['id', 'name']);

        return view('admin.bukus.edit', compact('categories','buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuRequest $request,Buku $buku)
    {

        if ($request->validated()) {
            $buku->update($request->except('images', '_token'));

            $i = $buku->media()->count() + 1;

            if ($request->images && count($request->images) > 0) {
                (new ImageService())->storeBukuImages($request->images, $buku, $i);
            }

            return redirect()->route('admin.bukus.index')->with([
                'message' => 'success created !',
                'alert-type' => 'success'
            ]);
        }

        return back()->with([
            'message' => 'Something was wrong, please try again late',
            'alert-type' => 'danger'
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {

        if ($buku->media->count() > 0) {
            foreach ($buku->media as $media) {
                (new ImageService())->unlinkImage($media->file_name, 'bukus');
                $media->delete();
            }
        }

        $buku->delete();

        return redirect()->route('admin.bukus.index')->with([
            'message' => 'success deleted !',
            'alert-type' => 'danger',
            ]);
    }

    public function removeImage(Request $request)
    {
       
        $buku = Buku::findOrFail($request->buku_id);
        $image = $buku->media()->whereId($request->image_id)->first();

        (new ImageService())->unlinkImage($image->file_name, 'bukus');
        $image->delete();

        return true;
    }
}
