<?php

namespace App\Application\Http;

class ParametersBag
{
    /** @var Parameter[] */
    protected array $parameters = [];

    /**
     * @return Parameter[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function addParameter(Parameter $parameter)
    {
        $param = $this->getParameter($parameter->getKey());

        if (!$param instanceof Parameter) {
            $this->parameters[] = $parameter;
        }
    }

    public function getParameter(string $key): ?Parameter
    {
        $paramFiltered = array_filter($this->parameters, function (Parameter $param) use ($key) {
            return $param->getKey() === $key;
        });

        return count($paramFiltered) > 0 ? $paramFiltered[0] : null;
    }
}
