<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        try {
            // 1. Mengambil semua data dari model Quote
            $quotes = Quote::all();

            // 2. Mengirimkan respons JSON jika berhasil
            return response()->json([
                'message' => 'List Quote',
                'data' => $quotes
            ], 200);

        } catch (\Exception $e) {
            // 3. Mengirimkan respons JSON jika terjadi error
            return response()->json([
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuoteRequest $request)
    {

        try {
            // 1. Ambil data yang sudah divalidasi dengan aman
            $validatedData = $request->safe()->all();

            // 2. Buat record baru di database
            $quote = Quote::create($validatedData);

            // 3. Kirim respons sukses beserta data yang baru dibuat
            return response()->json([
                'message' => 'Quote berhasil dibuat',
                'data' => $quote
            ], 201);

        } catch (\Exception $e) {
            // 4. Tangani jika terjadi error tak terduga
            return response()->json([
                'message' => 'Terjadi kesalahan pada server',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
   public function show(Quote $quote)
    {
        try {
            return Response::json([
                'message' => "Detail Quote",
                'data' => $quote
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        try {
            // 1. Ambil data yang sudah divalidasi
            $validated = $request->safe()->all();

            // 2. Update model dengan data yang tervalidasi
            if($quote->update($validated)){
                return Response::json([
                    'message' => "Quote updated",
                    'data' => $quote
                ], 200);
            }

            // 3. Kembalikan respons dengan data yang sudah diperbarui
            return Response::json([
                'message' => "Quote not updated",
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            // 4. Tangani jika terjadi error tak terduga
            return Response::json([
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        try {
            // 1. Hapus data dari database
            if($quote->delete()){
                return Response::json([
                    'message' => "Quote deleted",
                    'data' => null
                ], 200);
            }

            // 2. Kirim respons yang sesuai
            return Response::json([
                'message' => "Quote not deleted",
                'data' => null
            ], 500);
        } catch (\Exception $e) {
            // 3. Tangani jika terjadi error
            return Response::json([
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
