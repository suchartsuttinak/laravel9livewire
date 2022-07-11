<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $barcode;
    public $title;
    public $price;
    public $unit_id;
    public $images = [];

    public Product $product;

    public bool $isLoading = false;

    public function initLoading()
    {
        $this->isLoading = true;
    }

    protected function rules()
    {
        return [
            'unit_id' => 'required',
            'barcode' => 'required',
            'title' => 'required',
            'price' => 'required',
            'images.*' => 'image|max:10485760', // 10MB Max
        ];
    }

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product.product-index', [
            'products' => $this->isLoading ? Product::with('unit')->orderBy('id', 'desc')->paginate(5) : new Product(),
        ]);
    }

    public function store()
    {
        $product = new Product();
        $product->unit_id = $this->unit_id;
        $product->barcode = $this->barcode;
        $product->title = $this->title;
        $product->price = $this->price;

        //upload
        $photoFileName = [];
        foreach($this->images as $image) {
            $newFileName = $image->hashName();
            $image->storeAs('product-image', $newFileName, 'public');
            array_push($photoFileName, $newFileName);
        }

        $product->photos = $photoFileName;
        $product->save();

        $this->resetInputFields();

        session()->flash('message', 'Product successfully created.');
    }


    public function resetInputFields()
    {
        $this->barcode = '';
        $this->title = '';
        $this->price = '';
        $this->unit_id = '';
    }
}
