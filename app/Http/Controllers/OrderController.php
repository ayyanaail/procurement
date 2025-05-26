<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Brand;
use App\Models\Vendor;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['vendor', 'brand'])->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::where('active', true)->orderBy('name')->get();
        $brands = Brand::where('active', true)->orderBy('name')->get();
        return view('orders.create', compact('vendors', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'brand_id' => 'required|exists:brands,id',
            'description' => 'nullable|string',
            'pq_no' => 'nullable|string|max:255',
            'pq_date' => 'nullable|date',
            'pi_no' => 'nullable|string|max:255',
            'pi_date' => 'nullable|date',
            'ap_value' => 'nullable|numeric',
            'ap_date' => 'nullable|date',
            'ci_no' => 'nullable|string|max:255',
            'ci_date' => 'nullable|date',
            'bl_no' => 'nullable|string|max:255',
            'bl_date' => 'nullable|date',
            'bp_value' => 'nullable|numeric',
            'bp_date' => 'nullable|date',
            'eta' => 'nullable|date',
            'remarks' => 'nullable|string',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $vendors = Vendor::where('active', true)->orderBy('name')->get();
        $brands = Brand::where('active', true)->orderBy('name')->get();
        return view('orders.edit', compact('order', 'vendors', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'brand_id' => 'required|exists:brands,id',
            'description' => 'nullable|string',
            'pq_no' => 'nullable|string|max:255',
            'pq_date' => 'nullable|date',
            'pi_no' => 'nullable|string|max:255',
            'pi_date' => 'nullable|date',
            'ap_value' => 'nullable|numeric',
            'ap_date' => 'nullable|date',
            'ci_no' => 'nullable|string|max:255',
            'ci_date' => 'nullable|date',
            'bl_no' => 'nullable|string|max:255',
            'bl_date' => 'nullable|date',
            'bp_value' => 'nullable|numeric',
            'bp_date' => 'nullable|date',
            'eta' => 'nullable|date',
            'remarks' => 'nullable|string',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
