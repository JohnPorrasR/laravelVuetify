<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Persona;
use App\JPR\Repositorios\BaseRepo;
use Illuminate\Support\Facades\DB;

class PersonaRepo extends BaseRepo
{
    public function getModel()
    {
        return new Persona;
    }

    public function obtenerPersonas()
    {
        $sql = "select p.n_id_persona as codigo, p.x_ape_pat as ape_pat, p.x_ape_mat as ape_mat, p.x_nombres as nomb, p.x_dni as dni, p.x_correo as correo, p.m_celular as celular, p.m_usuario_id as usu, 
                p.m_tipo_persona as tipo_per, pf.x_desc_perfil as perfil_desc, o.x_nomb_oficina as oficina_nomb, c.x_cargo_desc as cargo_desc, e.x_entidad_abr as entidad_abr
                from tmae_personas as p 
                inner join tmae_personas_detalles as pd on p.n_id_persona = pd.m_persona_id
                inner join tmae_perfiles_entidades as pe on pd.m_perfil_entidad_id = pe.n_id_perfil_entidad
                inner join tmae_oficinas_entidades as oe on pd.m_oficina_entidad_id = oe.n_id_oficina_entidad
                inner join tmae_cargos_entidades as ce on pd.m_cargo_entidad_id = ce.n_id_cargo_entidad
                inner join tmae_perfiles as pf on pe.m_entidad_id = pf.n_id_perfil
                inner join tmae_oficinas as o on oe.m_oficina_id = o.n_id_oficina
                inner join tmae_cargos as c on ce.m_cargo_id = c.n_id_cargo
                inner join tmae_entidades as e on pd.m_entidad_id = e.n_id_entidad
                where pd.m_estado = 1";
        $data = DB::select($sql);
        return $data;
    }

    public function obtenerUnaPersonaPorCod($cod)
    {
        $sql = "select p.n_id_persona as codigo, p.x_ape_pat as ape_pat, p.x_ape_mat as ape_mat, p.x_nombres as nomb, p.x_dni as dni, p.x_correo as correo, p.m_celular as celular, p.m_usuario_id as usu, 
                p.m_tipo_persona as tipo_per, pf.x_desc_perfil as perfil_desc, o.x_nomb_oficina as oficina_nomb, c.x_cargo_desc as cargo_desc, e.x_entidad_abr as entidad_abr
                from tmae_personas as p 
                inner join tmae_personas_detalles as pd on p.n_id_persona = pd.m_persona_id
                inner join tmae_perfiles_entidades as pe on pd.m_perfil_entidad_id = pe.n_id_perfil_entidad
                inner join tmae_oficinas_entidades as oe on pd.m_oficina_entidad_id = oe.n_id_oficina_entidad
                inner join tmae_cargos_entidades as ce on pd.m_cargo_entidad_id = ce.n_id_cargo_entidad
                inner join tmae_perfiles as pf on pe.m_entidad_id = pf.n_id_perfil
                inner join tmae_oficinas as o on oe.m_oficina_id = o.n_id_oficina
                inner join tmae_cargos as c on ce.m_cargo_id = c.n_id_cargo
                inner join tmae_entidades as e on pd.m_entidad_id = e.n_id_entidad
                where p.n_id_persona = $cod";
        $data = DB::select($sql);
        return $data;
    }

}