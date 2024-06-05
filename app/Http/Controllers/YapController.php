<?php

namespace App\Http\Controllers;

use App\Models\Yap;
use Illuminate\Http\Request;

class YapController extends Controller
{
    public function show(Yap $yap)
    {
        return view('yaps.show', compact('yap'));
    }

    public function store()
    {
        $validated = request()->validate([
            'yap' => 'required|min:5|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        Yap::create($validated);
        // $yap = new Yap([
        //     'yap' => request()->get('yap', ''),
        // ]);
        // $yap->save();

        return redirect()->route('dashboard')->with('success', 'Yapped Successfully!');
    }

    public function edit(Yap $yap)
    {
        if (auth()->id() !== $yap->user_id) {
            abort(404, "You cannot do that");
        }
        $editing = true;
        return view('yaps.show', compact('yap', 'editing'));
    }

    public function update(Yap $yap)
    {
        if (auth()->id() !== $yap->user_id) {
            abort(404, "You cannot do that");
        }
        $validated = request()->validate([
            'yap' => 'required|min:5|max:240'
        ]);

        // $yap->yap = request()->get('yap', '');
        // $yap->save();
        $yap->update($validated);

        return redirect()->route('yaps.show', $yap->id)->with('success', 'Yap updated Successfully!');
    }

    public function destroy(Yap $yap)
    {
        // $yap = Yap::where('id', $id)->firstOrFail();
        if (auth()->id() !== $yap->user_id) {
            abort(404, "You cannot do that");
        }
        $yap->delete();

        return redirect()->route('dashboard')->with('success', 'Unyapped Successfully!');
    }
}
