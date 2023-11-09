<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{

    /**
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Dashboard', [
            'items' => Item::all(),
            'appLogo' => tenancy()->tenant->logo,
            'primary_color' => tenancy()->tenant->primary_color
        ]);
    }

    /**
     * @param \Illuminate\Support\Facades\Request $request
     * @return RedirectResponse
     */
    public function create(Request $request) : RedirectResponse
    {
        Item::create([
            'name' => $request->get('name'),
            'createdBy' => auth()->user()->getEmail()
        ]);
        return redirect(route('dashboard', ['items' => Item::all()]));
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id) : RedirectResponse
    {
        $item = Item::find($id);

        if($item->delete()) {
            return redirect(route('dashboard', ['items' => Item::all()]));
        } else {
            return redirect()->back()->withErrors('Something went wrong');
        }
    }

}
