<?php

namespace App\Http\Controllers;

use DB;
use App\Hotels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('report',['only' => [
            'index',
            'create',
            'store',
            'show',
            'edit',
            'update',
            'destroy'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (DB::table('user_reports')->where('user_id', '=', Auth::id())->exists()) {

            try {
                $users = DB::table('user_reports')->where('user_id', '=', Auth::id())->get();
                foreach ($users as $user) {
                }
                $hotels = Hotels::where('id', $user->hotel_id)->get();
                return response()->json([
                    'hotel' => $hotels
                ], 200);
            } catch (Exception $e) {
                return view('error.index')->with('error', $e);
            }
        } else {
            return view('error.index')->with('error', 'คุณยังไม่ใด้ทำการ Match User กับ Hotel');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
