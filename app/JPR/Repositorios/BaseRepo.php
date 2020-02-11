<?php

namespace App\JPR\Repositorios;

abstract class BaseRepo
{
    protected $model;

    public function __construct(){
        $this->model = $this->getModel();
    }

    abstract public function getModel();

    public function all()
    {
        $data =  $this->model->all();
        return $data;
    }

    public function where($buscar, $valor)
    {
        $data = $this->model->where($buscar, $valor)->get();
        return $data;
    }

    public function whereIsNull($buscar1, $valor1, $isNull)
    {
        $data = $this->model->where($buscar1, $valor1)->whereNull($isNull)->get();
        return $data;
    }

    public function whereOrder($buscar, $valor, $fila, $order='ASC')
    {
        $data = $this->model->where($buscar, $valor)->orderBy($fila, $order)->get();
        return $data;
    }

    public function whereWhere($buscar1, $valor1, $buscar2, $valor2)
    {
        $data = $this->model->where($buscar1, $valor1)->where($buscar2, $valor2)->get();
        return $data;
    }

    public function whereWhereIsNull($buscar1, $valor1, $buscar2, $valor2, $isNull)
    {
        $data = $this->model->where($buscar1, $valor1)->where($buscar2, $valor2)->whereNull($isNull)->get();
        return $data;
    }

    public function whereOrWhere($buscar1, $valor1, $buscar2, $valor2)
    {
        $data = $this->model->where($buscar1, $valor1)->orWhere($buscar2, $valor2)->get();
        return $data;
    }

    public function whereCount($buscar, $valor)
    {
        $data = $this->model->where($buscar, $valor)->count();
        return $data;
    }

    public function whereWhereCount($buscar1, $valor1, $buscar2, $valor2)
    {
        $data = $this->model->where($buscar1, $valor1)->where($buscar2, $valor2)->count();
        return $data;
    }

    public function whereWhereWhereCount($buscar1, $valor1, $buscar2, $valor2, $buscar3, $valor3)
    {
        $data = $this->model->where($buscar1, $valor1)->where($buscar2, $valor2)->where($buscar3, $valor3)->count();
        return $data;
    }

    public function show($id)
    {
        $data = $this->model->findOrFail($id);
        return $data;
    }

    public function createSelect($id, $desc, $fila, $orden = 'ASC')
    {
        $data = $this->model->orderBy($fila, $orden)->pluck($desc, $id);
        return $data;
    }

    public function withOneTables($table, $fila, $orden = 'ASC')
    {
        $data = $this->model->with($table)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withOneTablesWhere($table, $where, $val, $fila, $orden = 'ASC')
    {
        $data = $this->model->with($table)->where($where, '=', $val)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withTwoTables($table1, $table2, $fila, $order='ASC')
    {
        $data = $this->model->with([$table1, $table2])->orderBy($fila, $order)->get();
        return $data;
    }

    public function withTwoTablesWhere($table1, $table2, $cod){
        $data = $this->model->with([$table1, $table2])->findOrFail($cod);
        return $data;
    }

    public function withThreeTables($table1, $table2, $table3, $fila, $orden = 'ASC'){
        $data = $this->model->with([$table1, $table2, $table3])->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withThreeTablesWhereOrder($table1, $table2, $table3, $campo, $busqueda, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3])->where($campo, $busqueda)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withFourTables($table1, $table2, $table3, $table4, $campo, $busqueda, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3, $table4])->where($campo, $busqueda)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withFourTablesWhereOrder($table1, $table2, $table3, $table4, $campo, $busqueda, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3, $table4])->where($campo, $busqueda)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withFourTablesWhereWhereOrder($table1, $table2, $table3, $table4, $campo1, $busqueda1, $campo2, $busqueda2, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3, $table4])->where($campo1, $busqueda1)->where($campo2, $busqueda2)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withSixTablesWhereOrder($table1, $table2, $table3, $table4, $table5, $table6, $campo, $busqueda, $fila, $orden = 'ASC'){
        $data = $this->model->with([$table1, $table2, $table3, $table4, $table5, $table6])->where($campo, $busqueda)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withSixTablesWhereWhereOrder($table1, $table2, $table3, $table4, $table5, $table6, $campo1, $busqueda1, $campo2, $busqueda2, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3, $table4, $table5, $table6])->where($campo1, $busqueda1)->where($campo2, $busqueda2)->orderBy($fila, $orden)->get();
        return $data;
    }
    public function withSevenTablesOrder($table1, $table2, $table3, $table4, $table5, $table6, $tabla7, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3, $table4, $table5, $table6, $tabla7])->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withSevenTablesWhereOrder($table1, $table2, $table3, $table4, $table5, $table6, $tabla7, $campo1, $busqueda1, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3, $table4, $table5, $table6, $tabla7])->where($campo1, $busqueda1)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withSevenTablesWhereWhereOrder($table1, $table2, $table3, $table4, $table5, $table6, $tabla7, $campo1, $busqueda1, $campo2, $busqueda2, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3, $table4, $table5, $table6, $tabla7])->where($campo1, $busqueda1)->where($campo2, $busqueda2)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withEightTablesWhereOrder($table1, $table2, $table3, $table4, $table5, $table6, $tabla7, $tabla8, $campo1, $busqueda1, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3, $table4, $table5, $table6, $tabla7, $tabla8])->where($campo1, $busqueda1)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function withEigthTablesWhereWhereOrder($table1, $table2, $table3, $table4, $table5, $table6, $tabla7, $tabla8, $campo1, $busqueda1, $campo2, $busqueda2, $fila, $orden = 'ASC')
    {
        $data = $this->model->with([$table1, $table2, $table3, $table4, $table5, $table6, $tabla7, $tabla8])->where($campo1, $busqueda1)->where($campo2, $busqueda2)->orderBy($fila, $orden)->get();
        return $data;
    }

    public function store($input)
    {
        $data = $this->model->create($input);
        return $data;
    }

    public function edit($input, $id)
    {
        $data = $this->model->findOrFail($id);
        $data->fill($input);
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();
        return $data;
    }

}