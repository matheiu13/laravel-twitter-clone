<?php

namespace App\Http\Controllers;

use App\Models\Yap;
use Illuminate\Http\Request;

class YapController extends Controller
{
    public function show(Yap $yap){
        return view('yaps.show', compact('yap'));
    }

    public function store(){

        request()->validate([
            'yap' => 'required|min:5|max:240'
        ]);

        $yap = new Yap([
            'yap' => request()->get('yap', ''),
        ]);
        $yap->save();

        return redirect()->route('dashboard')->with('success', 'Yapped Successfully!');
    }

    public function edit(Yap $yap){

        $editing = true;
        return view('yaps.show', compact('yap', 'editing'));
    }

    public function update(Yap $yap){
        request()->validate([
            'yap' => 'required|min:5|max:240'
        ]);
        $yap->yap = request()->get('yap', '');
        $yap->save();

        return redirect()->route('yaps.show', $yap->id)->with('success', 'Yap updated Successfully!');
    }

    public function destroy(Yap $yap){
        // $yap = Yap::where('id', $id)->firstOrFail();

        $yap->delete();

        return redirect()->route('dashboard')->with('success', 'Unyapped Successfully!');
    }
}
