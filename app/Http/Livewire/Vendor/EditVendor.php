<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Vendor;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditVendor extends Component
{
    use WithFileUploads;

    public $vendorId;
    public $vendor;
    public $name;
    public $email;
    public $website;
    public $morph_market;
    public $facebook;
    public $instagram;
    public $youtube;
    public $phone;
    public $description;
    public $logo;
    public $address;
    public $unit_number;
    public $city;
    public $state;
    public $zip;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'email',
        'website' => 'active_url',
        'facebook' => 'active_url',
        'instagram' => 'active_url',
        'youtube' => 'active_url'
    ];

    public function submit()
    {
        $this->validate();
        // Execution doesn't reach here if validation fails.
        $this->vendor->update([
            'name'          => $this->name,
            'slug'          => Str::slug($this->name),
            'email'         => $this->email,
            'website'       => $this->website,
            'morph_market'  => $this->morph_market,
            'facebook'      => $this->facebook,
            'instagram'     => $this->instagram,
            'youtube'       => $this->youtube,
            'phone'         => $this->phone,
            'description'   => $this->description,
        ]);

        $image = $this->logo->storePublicly('images', 's3');
        $this->vendor->image()->update([
            'url' => 'https://s3.us-west-2.amazonaws.com/cdn.gemreptiles.com/' . $image
        ]);
        $this->vendor->address()->update([
            'nickname' => 'default',
            'country' => 'United States',
            'street_address' => $this->address,
            'unit_number' => $this->unit_number,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->zip
        ]);
        return $this->vendor->fresh()->with(['address', 'image']);
    }

    public function mount(Vendor $renderVendor, $vendorId)
    {
        $vendor = $renderVendor->find($vendorId)->with(['image', 'address'])->first();
        $this->vendor = $vendor;
        $this->name = $vendor->name;
        $this->website = $vendor->website;
        $this->logo = $vendor->image->url;
        $this->instagram = $vendor->instagram;
        $this->email = $vendor->email;
        $this->youtube = $vendor->youtube;
        $this->morph_market = $vendor->morph_market;
        $this->address = $vendor->address->street_address;
        $this->unit_number = $vendor->unit_number;
        $this->zip = $vendor->address->postal_code;
        $this->city = $vendor->address->city;
        $this->state = $vendor->address->state;
        $this->facebook = $vendor->facebook;
        $this->phone = $vendor->phone;
        $this->unit_number = $vendor->address->unit_number;
        $this->description = $vendor->description;
    }

    public function render(Vendor $renderVendor)
    {
        return view('livewire.vendor.edit-vendor');
    }
}
