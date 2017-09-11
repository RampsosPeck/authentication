<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImpersonationsController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function store()
	{
		//Aqui preguntamos si el usuario puede personificar
		if(auth()->user()->canImpersonate())
		{
			//
			session(['impersonator_id' => auth()->id() ]);

			//Aqui recien hacemos el login con el user_id
			auth()->loginUsingId( request('user_id'));

			return back()->with('flash', 'Estás personificando al usuario con el id '.request('user_id'));

		}
		return back()->with('flash', 'Acción no permitida');

//		return request('user_id');

	}

	public function destroy()
	{
		auth()->loginUsingId( session('impersonator_id') );

		session()->forget('impersonator_id');

		return back()->with('flash', 'Has vuelto a ser tu... ' . auth()->user()->name);
	}


}
