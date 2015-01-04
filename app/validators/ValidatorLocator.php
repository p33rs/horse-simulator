<?php
namespace horse\validators;
class ValidatorLocator {
    /**
     * @param string $validator
     * @return \cram\validators\AbstractValidator
     * @throws \InvalidArgumentException
     */
    public function get($validator, Array $data = [], Array $tokens = [])
    {
        $fq = __NAMESPACE__ . '\\' . $validator;
        if (!class_exists($fq)) {
            $fq .= 'Validator';
        }
        if (!class_exists($fq)) {
            throw new \InvalidArgumentException('Validator not found: ' . $fq);
        }

        return new $fq($data, $tokens);
    }
}