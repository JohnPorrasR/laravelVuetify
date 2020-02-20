<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\PermisoBase;
use App\JPR\Repositorios\BaseRepo;
use Illuminate\Support\Facades\DB;

class PermisoBaseRepo extends BaseRepo
{
    public function getModel()
    {
        return new PermisoBase;
    }

    public function obtenerTodos()
    {
        $sql    = "select m.n_id_modulo as modulo, pe.n_id_perfil_entidad as perfil, p.x_desc_perfil as desc_perfil, 
                    m.x_modulo_desc as desc_modulo, e.x_entidad_abr as desc_entidad
                    from tmae_permisos_base as pb 
                    inner join tmae_perfiles_entidades as pe on pb.m_perfil_entidad_id = pe.n_id_perfil_entidad
                    inner join tmae_perfiles as p on pe.m_perfil_id = p.n_id_perfil
                    inner join tmae_modulos as m on pb.m_modulo_id = m.n_id_modulo
                    inner join tmae_entidades as e on pe.m_entidad_id = e.n_id_entidad";
        $data = DB::select($sql);
        return $data;
    }

    public function obtenerUno($cod)
    {
        $sql    = "select m.n_id_modulo as modulo, pe.n_id_perfil_entidad as perfil, p.x_desc_perfil as desc_perfil, 
                    m.x_modulo_desc as desc_modulo, e.x_entidad_abr as desc_entidad
                    from tmae_permisos_base as pb 
                    inner join tmae_perfiles_entidades as pe on pb.m_perfil_entidad_id = pe.n_id_perfil_entidad
                    inner join tmae_perfiles as p on pe.m_perfil_id = p.n_id_perfil
                    inner join tmae_modulos as m on pb.m_modulo_id = m.n_id_modulo
                    inner join tmae_entidades as e on pe.m_entidad_id = e.n_id_entidad
                    where pb.m_perfil_entidad_id = $cod";
        $data = DB::select($sql);
        return $data;
    }
}