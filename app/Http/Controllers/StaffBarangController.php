<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Ruangan;

class StaffBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pagination
        // numbering
        $data = Barang::when($request->search, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        })->paginate(5);

        return view('staffbarang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ruangan_id' => 'required',
            'total' => 'required',
            'broken' => 'required',
        ]);

        Barang::create([
            'ruangan_id' => $request->ruangan_id, 'name' => $request->name, 'total' => $request->total,
            'broken' => $request->broken, 'created_by' => $request->created_by, 'updated_by' => $request->updated_by
        ]);

        return redirect()->route('staffbarang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang::find($id);
        $lists = Ruangan::select('id', 'name')->get();

        return view('staffbarang.edit', compact('data', 'lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Barang::whereId($id)->update([
            'ruangan_id' => $request->ruangan_id, 'name' => $request->name, 'total' => $request->total,
            'broken' => $request->broken, 'created_by' => $request->created_by, 'updated_by' => $request->updated_by
        ]);

        return redirect()->route('staffbarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Barang::whereId($id)->delete();

        return redirect()->route('staffbarang.index');
    }
}
