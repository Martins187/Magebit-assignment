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

    public function sortBy(array $rules, string $table) : self
    {
        $this->addStatement("ORDER BY " . $rules['collumn'] . " " . $rules['direction']);
        $this->table = $table;

        return $this;
    }

    public function delete() : Response
    {
        $this->prependStatement('DELETE FROM '. $this->table . ' ');
        $this->execute();

        return response('success');
    }

    public function all(string $collumn) : Response
    {
        $this->prependStatement('SELECT '. $collumn . ' FROM '. $this->table .' ');

        return $this->fetchAll();
    }
}