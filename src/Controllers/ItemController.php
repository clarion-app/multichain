<?php

namespace ClarionApp\MultiChain\Controllers;

use Illuminate\Http\Request;
use ClarionApp\MultiChain\Facades\MultiChain;

class ItemController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of items in the specified blockchain stream.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($chain, $stream)
    {
        $items = MultiChain::liststreamitems($stream, true);
        foreach($items as $item)
        {
            $item->plain = hex2bin($item->data);
        }
        return response()->json($items, 200);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created blockchain item.
     * 
     * @param  string $chain
     * @param  string $stream
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($chain, $stream, Request $request)
    {
        $key = $request->input("key");
        $item = bin2hex(json_encode($request->input("item")));

        $txid = MultiChain::publish($stream, $key, $item);
        return $this->show($chain, $stream, $key);
    }

    /**
     * Display the specified blockchain item.
     *
     * @param  string $chain
     * @param  string  $stream
     * @param  string $item
     * @return \Illuminate\Http\Response
     */
    public function show($chain, $stream, $item)
    {
        $items = MultiChain::liststreamkeyitems($stream, $item, true);

        foreach($items as $item)
        {
            $item->plain = hex2bin($item->data);
        }
        return response()->json($items, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
