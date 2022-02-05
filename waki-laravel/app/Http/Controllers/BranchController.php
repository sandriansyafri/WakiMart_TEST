<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class BranchController extends Controller
{

    public function data()
    {
        $branchs = Branch::orderBy('created_at', 'desc');
        return DataTables::of($branchs)
            ->addIndexColumn()
            ->addColumn('action', function ($branchs) {
                return  '
                        <div>
                                <button  onclick="detailBranch(`' . route('branch.show', $branchs->id) . '`,`Detail Branch`)" type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button onclick="editBranch(`' . route('branch.show', $branchs->id) . '`,`Edit Branch`)" type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button onclick="deleteBranch(`' . route('branch.show', $branchs->id) . '`)" type="button"  class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                        </div>
                ';
            })
            ->rawColumns(['action'])
            ->make();
    }

    public function index()
    {
        return view('page.branch.index');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:branches,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'status' => 'error',
                'message' => 'Data gagal ditambahkan',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data = $request->all();
        Branch::create($data);
        return response()->json([
            'ok' => true,
            'status' => 'success',
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return response()->json([
            'ok' => true,
            'status' =>  'success',
            'message' => 'get',
            'data' => $branch
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:branches,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'status' => 'error',
                'message' => 'Data gagal diedit',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data = $request->all();
        $branch->update($data);
        return response()->json([
            'ok' => true,
            'status' => 'success',
            'message' => 'Data Berhasil Diedit',
            'data' => $branch
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return response()->json([
            'ok' => true,
            'status' => 'success',
            'message' => 'Data Berhasil dihapus'
        ]);
    }
}
