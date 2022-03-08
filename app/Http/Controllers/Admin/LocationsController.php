<?php

namespace App\Http\Controllers\Admin;

 use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function createLocation()
    {
        return view('admin.new-location');
    }


    public function saveLocation(Request $request)
    {
        $request->validate([
            'loc_name' => 'required|',
            'loc_delivery_time' => 'required',
            'loc_price' => 'required|numeric'
        ]);

        $locations = new Location();
        $locations->loc_name = $request->loc_name;
        $locations->loc_delivery_time = $request->loc_delivery_time;
        $locations->loc_price = $request->loc_price;

        $locations->save();
        return back()->with('message', 'Location saved.');
    }

    public function editLocationForm($id){
        $data['locationInfo'] = Location::where('id', $id)->first();
        return view('admin.editlocationform')->with($data);
    }

    public function listLocations(){
        $data['locations'] = Location::paginate(5);
        return view('admin.list-locations')->with($data);
    }
}
