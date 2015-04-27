<?php

class ParkingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['parking'] = $parking = Parking::getData();
		if(Request::ajax())
        {
            $data["links"] = $parking->links();
            $parking = View::make('app.parking.list', $data)->render();
            return Response::json(array('html' => $parking));
        }
        return View::make('app.parking.index', $data);        
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$parking = new Parking;
        return View::make('app.parking.form')->with('parking', $parking);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$parking = new Parking;
        $data = Input::all();        
        if ($parking->validAndSave($data)){	
            return Redirect::route('parking.show', array($parking->parq_id));        
        }else{
            return Redirect::route('parking.create')->withInput()->withErrors($parking->errors);
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$parking = Parking::find($id);
        if (!$parking instanceof Parking) {
            App::abort(404);
        }
        return View::make('app.parking.show', array('parking' => $parking));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$parking = Parking::find($id);
        if (!$parking instanceof Parking) {
            App::abort(404);
        }
        return View::make('app.parking.form')->with('parking', $parking);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$parking = Parking::find($id);
        if (!$parking instanceof Parking) {
            App::abort(404);
        }       
        $data = Input::all();
        if ($parking->validAndSave($data)){
            return Redirect::route('parking.show', array($parking->parq_id));        
        }else{
            return Redirect::route('parking.edit', $parking->parq_id)->withInput()->withErrors($parking->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	/**
	 * Store file parking.
	 *
	 * @return Response
	 */
	public function file()
	{
		$parking = Parking::find(Input::get('parq_id'));
        if (!$parking instanceof Parking) {
            App::abort(404);
        } 

		if (Input::hasFile('parq_imagen')) {
			$file = Input::file('parq_imagen');
			if(strpos($file->getClientMimeType(),'image') !== FALSE) {
				$upload_folder = '/img/';
				$file_name = str_random(). '.' . $file->getClientOriginalExtension();
				$file->move(public_path() . $upload_folder, $file_name);

				$parking->parq_imagen =  URL::to('/').$upload_folder.$file_name;
				$parking->save();
			}
		}
        return Redirect::route('parking.show', array($parking->parq_id));
	}
}
