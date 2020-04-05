<?php

namespace App\Http\Controllers;

use App\Fakultas;
use Illuminate\Http\Request;
use App\Jurusan;

class JurusanController extends Controller
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
        $data = Jurusan::when($request->search, function ($query) use ($request) {
            $query->where(fakultas()->name, 'LIKE', '%' . $request->search);
        })->paginate(5);
        // $data = Jurusan::where('$fakultas.name', '>', 100)->paginate(10);

        return view('jurusan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lists = Fakultas::select('id', 'name')->get();
        return view('jurusan.create', compact('lists'));
    }

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
            'fakultas_id' => 'required',
        ]);

        Jurusan::create(['fakultas_id' => $request->fakultas_id, 'name' => $request->name]);

        return redirect()->route('jurusan.index');
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
        $data = Jurusan::find($id);
        $lists = Fakultas::select('id', 'name')->get();

        return view('jurusan.edit', compact('data', 'lists'));
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
        Jurusan::whereId($id)->update(['fakultas_id' => $request->fakultas_id, 'name' => $request->name]);

        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Jurusan::whereId($id)->delete();

        return redirect()->route('jurusan.index');
    }
}
