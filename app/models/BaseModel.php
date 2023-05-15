<?php

namespace App\models;

use Database\DB;

abstract class BaseModel
{
    /**
     * @var string
     */
    public string $table;
    public array $fillable;

    /**
     * @param $requestData
     * @return string
     */
    public function create($requestData): string
    {
        try {
            $data = $this->filterFillable($requestData);
            $values = [];
            foreach ($data as $value) {
                $values[] = "'{$value}'";
            }

            $item = implode(', ', array_keys($data));
            $val = implode(', ', $values);

            $sql = "INSERT INTO {$this->table} ({$item}) VALUES ($val)";
            return DB::connection()->exec($sql);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function update($id, $requestData): string
    {
        try {
            $data = $this->filterFillable($requestData);
            $values = [];
            foreach ($data as $key => $value) {
                $values[] = "{$key} = '{$value}'";
            }
            $val = implode(', ', $values);

            $sql = "UPDATE {$this->table} SET {$val}  WHERE id ={$id} ";
            return DB::connection()->exec($sql);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function show($id)
    {
        try {
            $sql = "SELECT * from {$this->table} WHERE id ={$id} ";
            $query = DB::connection()->prepare($sql);
            $query->execute();
            return $query->fetch();
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $sql = "DELETE from {$this->table} WHERE id ={$id} ";
            $query = DB::connection()->prepare($sql);
            $query->execute();
            return $query->fetch();
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function index()
    {
        try {
            $sql = "SELECT * from {$this->table}";
            $query = DB::connection()->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function prepareData($data): array
    {
        $values = [];
        foreach ($data as $value) {
            $values[] = "'{$value}'";
        }

        return [
            'item' => implode(', ', array_keys($data)),
            'value' => implode(', ', $values)
        ];
    }

    public function filterFillable($datas): array
    {
        $data = [];
        foreach ($this->fillable as $fill) {
            if (array_key_exists($fill, $datas)) {
                $data[$fill] = $datas[$fill];
            }
        }
        return $data;
    }


}