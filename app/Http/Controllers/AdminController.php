<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
		]);
	}

	protected function validatorUpdate(array $data) {
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
			'password' => 'required|min:6|confirmed',
		]);
	}

	public function index() {
		$users = User::get();
		#$user = new User;

		return view('admin.index', compact('users'));
	}

	public function edit(Request $request) {
		$users = User::get();
		$user = User::find($request->id);
		return view('admin.index', compact('users', 'user'));
	}

	public function update(Request $request) {

		$data = $request->all();

		$validator = $this->validatorUpdate($data);

		if ($validator->fails()) {
			return back()
				->withErrors($validator)
				->withInput();
		}

		$user = User::find($request->id);

		$user->fill([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		])->save();

		return redirect()->route('admin.index');
		#return back();

	}
	public function store(Request $request) {

		$data = $request->all();

		$validator = $this->validator($data);

		if ($validator->fails()) {
			return back()
				->withErrors($validator)
				->withInput();
		}

		$user = new User;

		$user->fill([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		])->save();

		return redirect()->route('admin.index');

	}
}
