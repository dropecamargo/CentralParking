<?php

class Parking extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parqueadero';	

    protected $primaryKey = 'parq_id';

    protected $perPage = 6;

    public $timestamps = false;

    protected $fillable = array('parq_nombre', 'parq_direccion', 'parq_email', 'parq_telefono','parq_horario', 'parq_tarifas', 'parq_cupost', 
        'parq_cuposd', 'parq_convenio', 'parq_mensualidades', 'parq_latitud', 'parq_longitud');

    public $errors;

    public function isValid($data)
    {
        $rules = array(            
            'parq_nombre' => 'required|min:4|max:100',
            'parq_direccion' => 'required',
            'parq_cupost' => 'required',
            'parq_convenio' => 'required',
            'parq_mensualidades' => 'required',
            'parq_latitud' => 'required',
            'parq_longitud' => 'required'
        );
        
        $validator = Validator::make($data, $rules);        
        if ($validator->passes()) {
            return true;
        }        
        $this->errors = $validator->errors();        
        return false;

    }

    public function validAndSave($data)
    {
        if ($this->isValid($data))
        {
            $this->fill($data);
            $this->save();            
            return true;
        }        
        return false;
    } 

    public static function getApiData()
    {
        $query = Parking::query();      
        return $query->get();
    }

	public static function getData()
    {
        $query = Parking::query();      
        if (Input::has("parq_nombre")) {          
            $query->where('parq_nombre', 'like', '%'.Input::get("parq_nombre").'%');
        }        
        $query->orderby('parq_cuposd', 'DESC');
        return $query->paginate();
    }

    public function setParqNombreAttribute($name){
        $this->attributes['parq_nombre'] = strtoupper($name);
    }
}
