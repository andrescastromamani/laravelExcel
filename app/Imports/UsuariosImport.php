<?php

namespace App\Imports;

use App\Usuario;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsuariosImport implements ToModel, WithHeadingRow, WithValidation
{
    private $numRows = 0;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->numRows;
        return new Usuario([
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'cedula' => $row['cedula'],
            'fechanacimiento' => $row['fechanacimiento'],
            'direccion' => $row['direccion'],
            'profesion' => $row['profesion'],
            'codigosis' => $row['codigosis'],
            'contrasenia' => $row['contrasenia']
        ]);
    }

    public function rules():array
    {
        return[
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'fechanacimiento' => 'required',
            'direccion' => 'required',
            'profesion' => 'required',
            'codigosis' => 'required',
            'contrasenia' => 'required'
        ];
    }

    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
