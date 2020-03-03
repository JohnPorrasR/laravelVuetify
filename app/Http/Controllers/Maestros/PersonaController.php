<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PersonaDetalleRepo;
use App\JPR\Repositorios\Maestros\PersonaRepo;
use Illuminate\Http\Request;

class PersonaController extends ApiController
{
    protected $personaRepo;
    protected $personaDetalleRepo;

    public function __construct(PersonaRepo $personaRepo, PersonaDetalleRepo $personaDetalleRepo)
    {
        $this->personaRepo = $personaRepo;
        $this->personaDetalleRepo = $personaDetalleRepo;
    }

    public function index()
    {
        $data = $this->personaRepo->obtenerPersonas();
        return $this->showQuery($data);
    }

    public function store(Request $request)
    {
        $ape_pat        = $request->input('ape_pat');
        $ape_mat        = $request->input('ape_mat');
        $nomb           = $request->input('nomb');
        $dni            = $request->input('dni');
        $correo         = $request->input('correo');
        $celular        = $request->input('celular');
        $usu            = $request->input('usu');
        $tipo_per       = $request->input('tipo_per');
        $cargo          = $request->input('cargo');
        $oficina        = $request->input('oficina');
        $entidad        = $request->input('entidad');
        $perfil         = $request->input('perfil');

        $inputPer       = [
            'x_ape_pat' => $ape_pat, 'x_ape_mat' => $ape_mat, 'x_nombres' => $nomb, 'x_dni' => $dni, 'x_correo' => $correo, 'm_celular' => $celular, 'm_usuario_id' => $usu, 'm_tipo_persona' => $tipo_per,
        ];
        $resPer         = $this->personaRepo->store($inputPer);
        $cod            = $resPer['n_id_persona'];
        if($cod > 0)
        {
            $inputDet   = [
                'm_persona_id' => $cod, 'm_entidad_id' => $entidad, 'm_perfil_entidad_id' => $perfil, 'm_cargo_entidad_id' => $cargo, 'm_oficina_entidad_id' => $oficina, 'm_estado' => 1,
            ];
            $this->personaDetalleRepo->store($inputDet);
        }
        $data           = $this->personaRepo->obtenerUnaPersonaPorCod($cod);
        return $this->showQuery($data);
    }

    public function show($id)
    {
        $data = $this->personaRepo->obtenerUnaPersonaPorCod($id);
        return $this->showQuery($data);
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id))
        {
            $ape_pat        = $request->input('ape_pat');
            $ape_mat        = $request->input('ape_mat');
            $nomb           = $request->input('nomb');
            $dni            = $request->input('dni');
            $correo         = $request->input('correo');
            $celular        = $request->input('celular');
            $usu            = $request->input('usu');
            $tipo_per       = $request->input('tipo_per');

            $input          = [
                'x_ape_pat' => $ape_pat, 'x_ape_mat' => $ape_mat, 'x_nombres' => $nomb, 'x_dni' => $dni, 'x_correo' => $correo, 'm_celular' => $celular, 'm_usuario_id' => $usu, 'm_tipo_persona' => $tipo_per,
            ];
            $this->personaRepo->edit($input, $id);
            $data   = $this->personaRepo->obtenerUnaPersonaPorCod($id);
            return $this->showQuery($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }

    public function destroy($id)
    {
        if(is_numeric($id))
        {
            $res = $this->personaRepo->withOneTablesWhere('detalles','n_id_persona', $id,'n_id_persona', 'asc');
            $cod = 0;
            foreach ($res as $k => $r)
            {
                foreach ($r->detalles as $k1 => $d)
                {
                    $cod = $d->n_id_persona_detalle;
                }
            }
            $input = ['m_estado' => 0];
            $resDet = $this->personaDetalleRepo->edit($input, $cod);
            if($resDet['n_id_persona_detalle'] > 0)
            {
                $data   = $this->personaRepo->obtenerUnaPersonaPorCod($id);
                return $this->showQuery($data);
            }
            else
            {
                return $this->errorResponce('Debe de ingresar un ID valido.',400);
            }
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}