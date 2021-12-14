<?php

namespace Framework\Validate;

class Validator extends RuleHandler
{
    public function validateObject(array $request, array $rules)
    {
        foreach($rules as $key => $values)
        {
            $rules = explode("|", $values);

            foreach($rules as $rule)
            {
                if(!$this->$rule($request[$key]))
                {
                    response()->sendServerError();
                    return;
                }
            }
        }

        return $request;
    }

    public function validateArray(array $request, string $method)
    {
        foreach($request as $item)
        {
            if(!$this->$method($item))
            {
                response()->sendServerError();
                return;
            }
        }

        return $request;
    }
}