<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableApiController extends Controller
{
    public function index()
    {
        return response()->json(Table::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Table_naumber' => 'required|string',
            'status' => 'required|string',
            'Size' => 'required|string',
            'restaurant_id' => 'required|integer',
            'admin_id' => 'required|integer',
        ]);

        $table = Table::create($validated);

        return response()->json(['message' => 'Table created successfully.', 'data' => $table], 201);
    }

    public function show($id)
    {
        $table = Table::find($id);

        if (!$table) {
            return response()->json(['message' => 'Table not found.'], 404);
        }

        return response()->json($table);
    }

    public function update(Request $request, $id)
    {
        $table = Table::find($id);

        if (!$table) {
            return response()->json(['message' => 'Table not found.'], 404);
        }

        // فقط التحقق من الحقل status مع القيم المسموح بها
        $validated = $request->validate([
            'status' => 'required|string|in:available,occupied',
        ]);

        $table->update($validated);

        return response()->json(['message' => 'Table updated successfully.', 'data' => $table]);
    }

    public function destroy($id)
    {
        $table = Table::find($id);

        if (!$table) {
            return response()->json(['message' => 'Table not found.'], 404);
        }

        $table->delete();

        return response()->json(['message' => 'Table deleted successfully.']);
    }
}
