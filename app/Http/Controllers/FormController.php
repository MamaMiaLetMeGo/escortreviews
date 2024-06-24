<?php

namespace App\Http\Controllers;
use App\Models\form;
use Illuminate\Http\Request;

class formController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $filter = $request->input('filter', '');

        $forms = form::when(
            $name,
            fn ($query, $name) => $query->name($name)
        );
        
        $forms = match($filter) {
            'popular_last_month' => $forms->popularLastMonth(),
            'popular_last_6months' => $forms->popularLast6Months(),
            'highest_rated_last_month' => $forms->highestRatedLastMonth(),
            'highest_rated_last_6months' => $forms->highestRatedLast6Months(),
            default => $forms->latest()
        };

        $forms = $forms->get();

        return view('forms.index', ['forms' => $forms]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(form $form)
    {
        return view('forms.show',
            [
                'form' => $form->load([
                'reviews' => fn($query) => $query->latest()
                ])
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
