<?php
class TestController extends BaseController {
		
	protected $layout = 'layouts.master';
	
	public function getIndex(){
		
		return $this->layout->content = View::make('test.index');

		}
		
	public function getNoticias()
	{
		$datos=Noticias::paginate(3);
		
		return $this->layout->content = View::make('test.noticias',compact("datos"));
	}	



	public function get_add()
	{
		return $this->layout->content = View::make('test.add');
	}
	
	public function post_add()
	{ 
		$input= Input::All();
		
		$validaciones=array
		(
			'titulo'=>'required|min:5',
			'contenido'=>'required|min:5'
		);
		
		$mensaje=array
		(
		"required"=>"Este campo es obligatorio",
		"min"=>"Debe tener como mínimo 5 caracteres"
		);
		
		$validar=Validator::make($input,$validaciones,$mensaje);
		
		$file=Input::file('archivo');
        $archivo=$file->getClientOriginalName();
		$path = 'uploads';
		$upload = $file->move($path, "$archivo");
		
		if($upload)
		{
			if($validar->fails())
				{
					return Redirect::back()->withErrors($validar);
				}else
				{
					$n=new Noticias();
					$n->titulo=$input["titulo"];
					$n->contenido=$input["contenido"];
					$n->seo_slug=Helper::con_guion($input["titulo"]);
					$n->fecha=date("Y-m-d");
					$n->foto=$archivo;
					$n->save();
					Session::flash('mensaje', 'El registro ha sido ingresado exitosamente');
					return Redirect::to('test/add');	
				}
		}
		else
		{
			Session::flash('mensaje', 'no se pudo subir el archivo');
            return Redirect::to('test/add');
		}


		
		
	}

 }