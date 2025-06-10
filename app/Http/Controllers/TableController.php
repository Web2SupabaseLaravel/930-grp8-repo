<?php
// namespace App\Http\Controllers;

// use App\Models\Table;
// use Illuminate\Http\Request;

// class TableController extends Controller
// {
//     public function index()
//     {
//         $tables = Table::all();

//         if (request()->wantsJson()) {
//             return response()->json($tables);
//         }

//         return view('tables.index', compact('tables'));
//     }

//     public function create()
//     {
//         return view('tables.create');
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'Table_naumber' => 'required|string',
//             'status' => 'required|string',
//             'Size' => 'required|string',
//             'restaurant_id' => 'required|integer',
//             'admin_id' => 'required|integer',
//         ]);

//         $table = Table::create($validated);

//         if ($request->wantsJson()) {
//             return response()->json(['message' => 'Table created successfully.', 'data' => $table], 201);
//         }

//         return redirect()->route('tables.index')->with('success', 'Table created successfully.');
//     }

//     public function show(Table $table)
//     {
//         if (request()->wantsJson()) {
//             return response()->json($table);
//         }

//         return view('tables.show', compact('table'));
//     }

//     public function edit(Table $table)
//     {
//         return view('tables.edit', compact('table'));
//     }

//     public function update(Request $request, Table $table)
//     {
//         $validated = $request->validate([
//             'Table_naumber' => 'required|string',
//             'status' => 'required|string',
//             'Size' => 'required|string',
//             'restaurant_id' => 'required|integer',
//             'admin_id' => 'required|integer',
//         ]);

//         $table->update($validated);

//         if ($request->wantsJson()) {
//             return response()->json(['message' => 'Table updated successfully.', 'data' => $table]);
//         }

//         return redirect()->route('tables.index')->with('success', 'Table updated successfully.');
//     }

//     public function destroy(Table $table)
//     {
//         $table->delete();

//         if (request()->wantsJson()) {
//             return response()->json(['message' => 'Table deleted successfully.']);
//         }

//         return redirect()->route('tables.index')->with('success', 'Table deleted successfully.');
//     }
// } 





namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Table_naumber' => 'required|string',
            'status' => 'required|string',
            'Size' => 'required|string',
            'restaurant_id' => 'required|integer',
            'admin_id' => 'required|integer',
        ]);

        Table::create($request->all());

        return redirect()->route('tables.index')->with('success', 'Table created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        return view('tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view('tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        $request->validate([
            'Table_naumber' => 'required|string',
            'status' => 'required|string',
            'Size' => 'required|string',
            'restaurant_id' => 'required|integer',
            'admin_id' => 'required|integer',
        ]);

        $table->update($request->all());

        return redirect()->route('tables.index')->with('success', 'Table updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
       $table->delete();

       return redirect()->route('tables.index')->with('success', 'Table deleted successfully.');
    }
} 


