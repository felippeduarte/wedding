<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Product;
use Illuminate\Http\Request;
use PagSeguro;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('sales.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = Product::findOrFail($request->input('id'));
        $session_id = $request->input('sessionId');
        $hash = $request->input('hash');
        $tipo = $request->input('tipo');

        return view('sales.create', [
            'product' => $product,
            'session_id' => $session_id,
            'hash' => $hash,
            'tipo' => $tipo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));

        //$sale = Sale::create([]);
        //$ref = $sale->id;
        $ref = 'REF'.rand();

        $pagseguro = PagSeguro::setReference($ref)
            ->setSenderInfo([
                'senderName' => $request->input('nome'),
                'senderPhone' => $request->input('telefone'),
                'senderEmail' => $request->input('email'),
                'senderHash' => $request->input('hash'),
                'senderCPF' => $request->input('cpf'),
            ])
            ->setShippingAddress([
                'shippingAddressStreet' => 'Rua Souza Dutra',
                'shippingAddressNumber' => '353',
                'shippingAddressDistrict' => 'Estreito',
                'shippingAddressPostalCode' => '88070-605',
                'shippingAddressCity' => 'Florianópolis',
                'shippingAddressState' => 'SC',
            ])
            ->setItems([
                [
                    'itemId' => $product->id,
                    'itemDescription' => $product->name,
                    'itemAmount' => 150,
                    'itemQuantity' => '1',
                ],
            ])
            ->setShippingInfo([
                'shippingType' => "3",
                'shippingCost' => "0.00",
            ])
            ->send([
                'paymentMethod' => 'boleto'
            ]);

        //dd($pagseguro);

        return view('sales.store', [
            'paymentLink' => $pagseguro->paymentLink,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id product_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('sales.show', [
            'product' => $product,
        ]);
    }
}
