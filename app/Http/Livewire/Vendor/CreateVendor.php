<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Vendor;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateVendor extends Component
{
    use WithFileUploads;

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
        'logo' => 'image|max:2048',
        // 'facebook' => 'active_url',
        // 'instagram' => 'active_url',
        // 'youtube' => 'active_url'
    ];

    public function submit()
    {
        $this->validate();
        // Execution doesn't reach here if validation fails.
        $vendor = [
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
        ];

        $newVendor = Vendor::create($vendor);
        $this->logo->storePublicly('images', 's3');

        $newVendor->address([
            'nickname' => $this->nickname,
            'country' => $this->country,
            'address' => $this->street_address,
        ])->save();

        return $newVendor->fresh()->withAddress();
    }

    public function render()
    {
        return view('livewire.vendor.create-vendor');
    }
}
