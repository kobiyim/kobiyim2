<?php

namespace Kobiyim\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
	public function kobiyim(Request $request)
	{
		return view('kobiyim::system.kobiyim');
	}
}
