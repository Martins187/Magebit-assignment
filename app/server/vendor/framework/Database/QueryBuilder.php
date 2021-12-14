<?php

namespace Framework\Database;

use Framework\Response\Response;

class QueryBuilder extends Builder
{
    public function create(array $data, string $table) : Response
    {   
        foreach($data as $key => $value)
        {
            $indexes[] = $key;
            $values[] = $value;
        }

        $indexes = join(",", $indexes);
        $values = join("','", $values);
     
        $this->prependStatement("INSERT INTO $table ($indexes) VALUES('$values')");
        $this->execute();

        return response('success');
    }

    public function whereIn(array $data, string $table) : self
    {
        $selected = join("','", $data['selected']);
        $this->addStatement("WHERE " . $data['collumn'] . " IN ('$selected')");
        $this->table = $table;

        return $this;
    }

    public function where(array $data) : self
    {
        $this->prependStatement(" WHERE " . $data['ruleCollumn'] . "=". $data['value']);

        return $this;
    }

    public function sortBy(array $rules, string $table) : self
    {
        $this->addStatement(" ORDER BY " . $rules['sortingCollumn'] . " " . $rules['sortingDirection']);
        $this->table = $table;

        return $this;
    }

    public function delete() : Response
    {
        $this->prependStatement('DELETE FROM '. $this->table . ' ');
        $this->execute();

        return response('success');
    }

    public function select(array $rules) : Response
    {
        $this->prependStatement('SELECT ' . $rules['selectionRule'] . ' ' . $rules['selectedCollumn'] . ' FROM '. $this->table .' ');

        return $this->fetchAll();
    }
}