<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $name, $slug, $status, $brand_id;
    protected $paginationTheme = 'bootstrap';

    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
    }
    public function storeBrand()
    {
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'
        ]);

        session()->flash('message', 'Brand Added Succesfully');
        $this->resetInput();
    }
    public function editBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findorFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->brand;
    }
    public function updateBrand(){
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'
        ]);

        session()->flash('message', 'Brand Update Succesfully');
        $this->resetInput();
    }
    public function deleteBrand($brand_id){
        $this->brand_id = $brand_id;
    }
    public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand Deleted Succesfully');
        $this->resetInput();
    }
    public function closeModal(){
        $this->resetInput();
    }

    public function openModal(){
        $this->resetInput();
    }
    public function render()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands])->extends('layouts.admin')->section('content');
    }
}
