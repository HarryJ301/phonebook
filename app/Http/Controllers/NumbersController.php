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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)  {

        if ($search = $request -> search) {
            $numbers = Auth::user()
            ->numbers()->where('first_name', 'like', $search)->orWhere('phone_number', 'like', $search)
            ->paginate(20);
        }

        else if ($request ->download == "Download"){
        $headers = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0'
            , 'Content-type' => 'text/csv'
            , 'Content-Disposition' => 'attachment; filename=contacts.csv'
            , 'Expires' => '0'
            , 'Pragma' => 'public'
        ];

            $currentUser = optional(Auth::user())->id;

            $keys = Number::all()->toArray();

            $list = Number::all()
                ->where('user_id', $currentUser)
                ->toArray();

            //echo '<pre>'; print_r($list); echo '</pre>';

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($keys[0]));

        $callback = function () use ($list) {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

            return response()->stream($callback, 200, $headers);
        }
        else{
            $numbers = Auth::user()
                ->numbers()
                ->paginate(20);
        }

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
        $number->first_name = $request->first_name;
        $number->middle_name = $request->middle_name;
        $number->last_name = $request->last_name;
        $number->maiden_name = $request->maiden_name ;
        $number->phone_number = $request->phone_number;
        $number->mobile_number = $request->mobile_number;
        $number->birthday = $request->birthday;
        $number->address = $request->address;
        $number->postcode = $request->postcode;
        $number->email = $request->email;
        $number->occupation = $request->occupation;
        $number->url = $request->url;
        $number->other_names = $request->other_names;
        $number->notes = $request->notes;
        $number->isFavourite = $request->isFavourite;
        $number->isImportant = $request->isImportant;
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
            'first_name' => $number,
            'middle_name' => $number,
            'last_name' => $number,
            'maiden_name' => $number,
            'phone_number' => $number,
            'mobile_number' => $number,
            'address' => $number,
            'postcode' => $number,
            'birthday' => $number,
            'email' => $number,
            'occupation' => $number,
            'url' => $number,
            'other_names' => $number,
            'notes' => $number,
            'isFavourite' => $number,
            'isImportant' => $number,

        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(NumberRequest $request, Number $number) {

        if ($number->user->id !== Auth::user()->id) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $number->first_name = $request->first_name;
        $number->middle_name = $request->middle_name;
        $number->last_name = $request->last_name;
        $number->maiden_name = $request->maiden_name;
        $number->phone_number = $request->phone_number;
        $number->mobile_number = $request->mobile_number;
        $number->birthday = $request->birthday;
        $number->address = $request->address;
        $number->postcode = $request->postcode;
        $number->email = $request->email;
        $number->occupation = $request->occupation;
        $number->url = $request->url;
        $number->other_names = $request->other_names;
        $number->notes = $request->notes;
        $number->isFavourite = $request->isFavourite;
        $number->isImportant = $request->isImportant;
        $number->save();

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
