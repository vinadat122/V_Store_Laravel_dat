<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemSale;

class ItemSaleController extends Controller
{
    /**
     * Hiển thị danh sách tất cả items
     */
    public function index()
    {
        $items = ItemSale::all();  // Lấy tất cả item trong database
        return view('items.index', compact('items'));
    }

    /**
     * Hiển thị form thêm mới item
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Lưu item mới vào database
     */
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'item_code' => ['required', 'regex:/^[A-Za-z0-9]+$/'],
            'item_name' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'quantity' => 'required|numeric',
            'expired_date' => 'required|date',
            'note' => 'nullable|string|max:60',
        ], [
            'item_code.required' => 'Item code is required.',
            'item_code.regex' => 'Item code must not contain special characters.',
            'item_name.required' => 'Item name is required.',
            'item_name.regex' => 'Item name must not contain special characters.',
        ]);

        ItemSale::create($validated);  // Tạo item mới

        return redirect()->route('items.index')->with('success', 'Item added successfully.');
    }

    /**
     * Hiển thị form chỉnh sửa item
     */
    public function edit($id)
    {
        $item = ItemSale::findOrFail($id);  // Lấy item theo id hoặc báo lỗi 404
        return view('items.edit', compact('item'));
    }

    /**
     * Cập nhật dữ liệu item
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'item_code' => ['required', 'regex:/^[A-Za-z0-9]+$/'],
            'item_name' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'quantity' => 'required|numeric',
            'expired_date' => 'required|date',
            'note' => 'nullable|string|max:60',
        ], [
            'item_code.required' => 'Item code is required.',
            'item_code.regex' => 'Item code must not contain special characters.',
            'item_name.required' => 'Item name is required.',
            'item_name.regex' => 'Item name must not contain special characters.',
        ]);

        $item = ItemSale::findOrFail($id);
        $item->update($validated);  // Cập nhật item

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
    {
        $item = ItemSale::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }

}
