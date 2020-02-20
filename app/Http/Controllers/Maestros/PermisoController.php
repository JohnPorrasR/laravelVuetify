<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PermisoRepo;
use Illuminate\Http\Request;

class PermisoController extends ApiController
{
    protected $permisoRepo;

    public function __construct(PermisoRepo $permisoRepo)
    {
        $this->permisoRepo = $permisoRepo;
    }

    public function index()
    {
        $resC                       = $this->permisoRepo->obtenerPerfilesEntidades();
        $resD                       = $this->permisoRepo->obtenerModulosPorPerfilEntidad();
        $array                      = array();
        $arrayD                     = array();
        $json                       = array();
        foreach ($resC as $k => $d)
        {
            $array['entidad']       = $d->entidad;
            $array['desc_perfil']   = $d->desc_perfil;
            $array['desc_entidad']  = $d->desc_entidad;
            $json['entidades'][$k]    = $array;
        }
        foreach ($resD as $k1 => $d1)
        {
            $arrayD['entidad']      = $d1->entidad;
            $arrayD['modulo']       = $d1->modulo;
            $arrayD['desc_modulo']  = $d1->desc_modulo;
            $json['modulos'][$k1]    = $arrayD;
        }
        return $this->showQuery($json);
    }

    public function store(Request $request)
    {
        $persona    = $request->input('persona');
        $entidad    = $request->input('entidad');
        $modulos    = $request->input('modulo');
        $estado     = $request->input('m_estado');
        $array = explode(",", $modulos);
        for ($i = 0; $i < sizeof($array); $i++)
        {
            $input = [ 'm_persona_id' => $persona, 'm_perfil_entidad_id' => $entidad, 'm_modulo_id' => $array[$i], 'm_estado' => $estado];
            $this->permisoRepo->store($input);
        }
        $resC                       = $this->permisoRepo->obtenerPerfilesEntidades();
        $resD                       = $this->permisoRepo->obtenerModulosPorPerfilEntidad();
        $array                      = array();
        $arrayD                     = array();
        $json                       = array();
        foreach ($resC as $k => $d)
        {
            $array['entidad']       = $d->entidad;
            $array['desc_perfil']   = $d->desc_perfil;
            $array['desc_entidad']  = $d->desc_entidad;
            $json['entidades'][$k]    = $array;
        }
        foreach ($resD as $k1 => $d1)
        {
            $arrayD['entidad']      = $d1->entidad;
            $arrayD['modulo']       = $d1->modulo;
            $arrayD['desc_modulo']  = $d1->desc_modulo;
            $json['modulos'][$k1]    = $arrayD;
        }
        return $this->showQuery($json);
    }

    public function show($id)
    {
        $resC                       = $this->permisoRepo->obtenerUnPerfilEntidad($id);
        $resD                       = $this->permisoRepo->obtenerUnModuloPorPerfilEntidad($id);
        $array                      = array();
        $arrayD                     = array();
        $json                       = array();
        foreach ($resC as $k => $d)
        {
            $array['entidad']       = $d->entidad;
            $array['desc_perfil']   = $d->desc_perfil;
            $array['desc_entidad']  = $d->desc_entidad;
            $json['entidades'][$k]    = $array;
        }
        foreach ($resD as $k1 => $d1)
        {
            $arrayD['entidad']      = $d1->entidad;
            $arrayD['modulo']       = $d1->modulo;
            $arrayD['desc_modulo']  = $d1->desc_modulo;
            $json['modulos'][$k1]    = $arrayD;
        }
        return $this->showQuery($json);
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id))
        {

            $persona    = $request->input('persona');
            $entidad    = $request->input('entidad');
            $modulos    = $request->input('modulo');
            $estado     = $request->input('m_estado');
            $array = explode(",", $modulos);
            for ($i = 0; $i < sizeof($array); $i++)
            {
                $input = [ 'm_persona_id' => $persona, 'm_perfil_entidad_id' => $entidad, 'm_modulo_id' => $array[$i], 'm_estado' => $estado];
                $this->permisoRepo->edit($input, $id);
            }
            $resC                       = $this->permisoRepo->obtenerPerfilesEntidades();
            $resD                       = $this->permisoRepo->obtenerModulosPorPerfilEntidad();
            $array                      = array();
            $arrayD                     = array();
            $json                       = array();
            foreach ($resC as $k => $d)
            {
                $array['entidad']       = $d->entidad;
                $array['desc_perfil']   = $d->desc_perfil;
                $array['desc_entidad']  = $d->desc_entidad;
                $json['entidades'][$k]    = $array;
            }
            foreach ($resD as $k1 => $d1)
            {
                $arrayD['entidad']      = $d1->entidad;
                $arrayD['modulo']       = $d1->modulo;
                $arrayD['desc_modulo']  = $d1->desc_modulo;
                $json['modulos'][$k1]    = $arrayD;
            }
            return $this->showQuery($json);
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
            $input = ['m_estado' => 0];
            $this->permisoRepo->edit($input, $id);
            $resC                       = $this->permisoRepo->obtenerPerfilesEntidades();
            $resD                       = $this->permisoRepo->obtenerModulosPorPerfilEntidad();
            $array                      = array();
            $arrayD                     = array();
            $json                       = array();
            foreach ($resC as $k => $d)
            {
                $array['entidad']       = $d->entidad;
                $array['desc_perfil']   = $d->desc_perfil;
                $array['desc_entidad']  = $d->desc_entidad;
                $json['entidades'][$k]    = $array;
            }
            foreach ($resD as $k1 => $d1)
            {
                $arrayD['entidad']      = $d1->entidad;
                $arrayD['modulo']       = $d1->modulo;
                $arrayD['desc_modulo']  = $d1->desc_modulo;
                $json['modulos'][$k1]    = $arrayD;
            }
            return $this->showQuery($json);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}