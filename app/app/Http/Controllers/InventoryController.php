<?php

namespace App\Http\Controllers;

use App\Models\viewInventory;
use App\Models\Item;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use PhpParser\Node\Expr\AssignOp\Concat;
use Psr\Log\LogLevel;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\isEmpty;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Inventory::paginate(10);
        return view('cores.index', ['datas' =>  $data]);
    }

    public function transpage()
    {
        //


        $data = Inventory::paginate(10);
        return view('cores.transpage', ['datas' =>  $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cores.addItem');
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|numeric',
        ]);

        $data = $request->all();

        $item = new Item;
        $item->name = $data['name'];
        $item->description = $data['description'];
        $item->quantity = $data['quantity'];
        $item->save();

        $inventory = new Inventory;
        $inventory->item_id = $item->id;
        $inventory->shelf = $data['shelf'];
        $inventory->level = $data['level'];
        $inventory->user_id = $data['user_id'];
        $inventory->date_in = $data['date_in'];
        $inventory->date_out = $data['date_out'];
        $inventory->save();

        return redirect('/transpage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $level = $request->level;
        $shelf = $request->shelf;
        $keyword  = $request->keyword;

        if (isEmpty($keyword)) {
            $data = Inventory::paginate(10);
            return view('cores.laporan', ['datas' =>  $data]);
        }
        // if (!isEmpty($keyword)) {
        //     $data = Inventory::find(1)
        //         ->paginate(10);
        //     return view('cores.laporan', ['datas' =>  $data]);
        // }

        // if ($level) {
        //     dd($keyword);
        //     $data = viewInventory::where('name', 'LIKE', '%' . $keyword . '%')
        //         ->onWhere('quantity', 'LIKE', '%' . $keyword . '%')
        //         ->paginate(10);
        //     return view('cores.laporan', ['datas' =>  $data]);
        // }
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
     * Download database in csv file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        //
        $fileName = 'data.csv';
        $inv = Inventory::all();
        $headers = array(
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        );

        $columns = array(
            'nama', 'quantity', 'level', 'shelf', 'date-in', 'date-out'
        );
        $callback = function () use ($inv, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($inv as $datas) {
                $row['nama']  = $datas->item->name;
                $row['qunatity']  = $datas->item->quantity;
                $row['level']    = $datas->level;
                $row['shelf']    = $datas->shelf;
                $row['date-in']  = $datas->date_in;
                $row['date-out']  = $datas->date_out;

                fputcsv($file, array($row['nama'], $row['quantity'], $row['level'], $row['shelf'], $row['date-in'], $row['date-out']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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
        //
    }
}
