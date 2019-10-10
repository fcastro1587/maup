<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use File;
use Validator;
use App\Multimedia;
use App\SeasonTravel;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class UploadFilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:files-ajax.createupload')->only(['createupload', 'store']);
        $this->middleware('permission:files-ajax.index')->only('index');
        $this->middleware('permission:files-ajax.show')->only('show');
        $this->middleware('permission:files-ajax.edit')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multimedia      = Multimedia::select('*')
            ->where('type', '=', 4)
            ->Orwhere('title', 'megaofertas')
            ->get();

        if (request()->ajax()) {

            $bloqueo = SeasonTravel
                ::join('multimedia', 'multimedia.id', '=', 'season_travels.multimedia_id_1')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'season_travels.id AS season_travel_id',
                    'season_travels.season_code_season',
                    'season_travels.order_item'
                )
                ->where('season_travels.season_code_season', 'PRO');               
               
            return datatables()
                ->eloquent($bloqueo)
                ->addColumn('btn', 'admin.uploadfile.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }

        return view('admin.uploadfile.index', compact('multimedia'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        if ($request['type'] == 4) {

            $rules = array(
                'order_item'    => 'required',
                'image'         =>  'required|image|max:2048'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image    = $request->file('image');
            $new_name = $image->getClientOriginalName();
            Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/' . $new_name . '', fopen($image, 'r+'));

            $form_data = array(
                'travel_mt'               =>  $request->travel_mt,
                'bloqueo_mt'              =>  $request->bloqueo_mt,
                'season_code_season'      =>  'PRO',
                'home'                    =>  '1',
                'multimedia_id_1'         =>  $request->multimedia_id_1,
                'order_item'              =>  $request->order_item,
                'active_item'             =>  '1',
            );

            SeasonTravel::create($form_data);

            return response()->json(['success' => 'Data Added successfully.']);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SeasonTravel::findOrFail($id);
        $data->delete();
    }
}
