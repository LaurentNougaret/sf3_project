<?php
namespace CaradvisorBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class StringToArrayTransformer implements DataTransformerInterface
{
    /**
     * Transform array to string with this method
     *
     * @return string
     */

    public function transform($array)
    {
        return $array[0];
    }

    /**
     * Transform a string to an array
     *
     * @param string $string
     * @return array
     */
    public function reverseTransform($string)
    {
        return array($string);
    }
}
