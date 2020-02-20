<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Permiso;
use App\JPR\Repositorios\BaseRepo;
use Illuminate\Support\Facades\DB;

class PermisoRepo extends BaseRepo
{
    public function getModel()
    {
        return new Permiso;
    }

    public function obtenerPerfilesEntidades()
    {
        $sql = "select distinct pe.n_id_perfil_entidad as entidad, pf.x_desc_perfil as desc_perfil, e.x_entidad_abr as desc_entidad
                from tmae_perfiles as pf 
                inner join tmae_perfiles_entidades as pe on pf.n_id_perfil = pe.m_perfil_id
                inner join tmae_entidades as e on pe.m_entidad_id = e.n_id_entidad
                inner join tmae_permisos as p on pe.n_id_perfil_entidad = p.m_perfil_entidad_id";
        $data = DB::select($sql);
        return $data;
    }

    public function obtenerModulosPorPerfilEntidad()
    {
        $sql = "select distinct pe.n_id_perfil_entidad as entidad, mo.n_id_modulo as modulo, mo.x_modulo_desc as desc_modulo
                from tmae_perfiles as pf 
                inner join tmae_perfiles_entidades as pe on pf.n_id_perfil = pe.m_perfil_id
                inner join tmae_entidades as e on pe.m_entidad_id = e.n_id_entidad
                inner join tmae_permisos as p on pe.n_id_perfil_entidad = p.m_perfil_entidad_id
                inner join tmae_modulos as mo on p.m_modulo_id = mo.n_id_modulo";
        $data = DB::select($sql);
        return $data;
    }

    public function obtenerUnPerfilEntidad($cod)
    {
        $sql = "select distinct pe.n_id_perfil_entidad as entidad, pf.x_desc_perfil as desc_perfil, e.x_entidad_abr as desc_entidad
                from tmae_perfiles as pf 
                inner join tmae_perfiles_entidades as pe on pf.n_id_perfil = pe.m_perfil_id
                inner join tmae_entidades as e on pe.m_entidad_id = e.n_id_entidad
                inner join tmae_permisos as p on pe.n_id_perfil_entidad = p.m_perfil_entidad_id
                where pe.n_id_perfil_entidad = $cod";
        $data = DB::select($sql);
        return $data;
    }

    public function obtenerUnModuloPorPerfilEntidad($cod)
    {
        $sql = "select distinct pe.n_id_perfil_entidad as entidad, mo.n_id_modulo as modulo, mo.x_modulo_desc as desc_modulo
                from tmae_perfiles as pf 
                inner join tmae_perfiles_entidades as pe on pf.n_id_perfil = pe.m_perfil_id
                inner join tmae_entidades as e on pe.m_entidad_id = e.n_id_entidad
                inner join tmae_permisos as p on pe.n_id_perfil_entidad = p.m_perfil_entidad_id
                inner join tmae_modulos as mo on p.m_modulo_id = mo.n_id_modulo
                where pe.n_id_perfil_entidad = $cod";
        $data = DB::select($sql);
        return $data;
    }
}
