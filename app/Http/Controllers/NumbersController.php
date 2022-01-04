<?php

namespace App\Http\Controllers;

use App\Models\Number;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\NumberRequest;

class NumbersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $numbers = Auth::user()
            ->numbers
            ->paginate(20);

        //Following code based on 'CRUD actions throughout MVC', Andrew Flannery, 2021.
        return view('numbers/index', [
            'numbers' => $numbers
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     *
     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('numbers.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumberRequest $request){

        $number = new Number();
        $number->name = $request->name;
        $number->phone_number = $request->phone_number;
        $number->user()->associate(Auth::user());
        $number->save();

        return redirect()
            ->route('numbers.index')
            ->with('alerts',[[
                'level' => 'success',
                'message' => 'Your number was created successfully'
            ]]);

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Number $number
     * @return \Illuminate\Http\Response
     */
    public function show(Number $number) {

        if ($number->user->id !== Auth::user()->id) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('numbers.show', [
            'number' => $number
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function edit(Number $number) {

        if ($number->user->id !== Auth::user()->id) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('numbers.edit', [
            'number' => $number,
            'phone_number' => $number
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Number $number) {

        if ($number->user->id !== Auth::user()->id) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $number->name = $request->name;
        $number->phone_number = $request->phone_number;
        $number->save;

        return redirect()
            ->route('numbers.index')
            ->with('alerts',[[
                'level' => 'success',
                'message' => 'Your number was updated successfully'
            ]]);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Numbers  $numbers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Number $number) {

        if ($number->user->id !== Auth::user()->id) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $number->delete();

        return redirect()
            ->route('numbers.index')
            ->with('alerts',[[
                'level' => 'success',
                'message' => 'Your number was removed successfully'
            ]]);
    }



}
