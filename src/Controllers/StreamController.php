<?php

namespace ClarionApp\MultiChain\Controllers;

use Illuminate\Http\Request;
use ClarionApp\MultiChain\Facades\MultiChain;

class StreamController extends \App\Http\Controllers\Controller
{
    public function __construct()
    {
        $this->multichain = MultiChain::get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($chain)
    {
        return $this->multichain->liststreams("*", true);
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
        $name = $request->input('name');
        $open = ($request->input('open') == 0) ? false : true;

        $txid = MultiChain::create('stream', $name, $open);

        if($request->input('subscribe')) MultiChain::subscribe($name);

        return $txid;
    }

    /**
     * Display the specified resource.
     *
     * @param  string $chain
     * @param  string  $stream
     * @return \Illuminate\Http\Response
     */
    public function show($chain, $stream)
    {
        $data = [
            'stream' => $this->multichain->getstreaminfo($stream, true),
            'permissions' => $this->multichain->listpermissions($stream.".*", "*", true)
        ];
        return $data;
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
        //
    }
}
