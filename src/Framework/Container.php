<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass, ReflectionNamedType;
use Framework\Exceptions\ContainerException;

class container
{
  private array $definitions = [];
  private array $resolved = [];

  public function addDefinitions(array $newDefinitions)
  {
    // ... spread operator unpacks an array and merge [array_merge]
    $this->definitions = [...$this->definitions, ...$newDefinitions];

    // dd($this->definitions);
  }

  public function resolve(string $className)
  {
    $reflectionClass = new ReflectionClass($className);

    // verify if the class is not instantiable #note: Abstract Class [VALIDATION]
    if (!$reflectionClass->isInstantiable()) {
      throw new ContainerException("Class {$className} is not instantiable");
    }
    $constructor = $reflectionClass->getConstructor();

    // to verify if there's constructor in the class [VALIDATION]
    if (!$constructor) {
      return new $className;
    }

    $params = $constructor->getParameters(); // grabs parameter

    //checks if the array has 0 size [VALIDATION]
    if (count($params) === 0) {
      return new $className;
    }

    $dependencies = [];

    foreach ($params as $param) {
      $name = $param->getName();
      $type = $param->getType();

      if (!$type) {
        throw new ContainerException("Failed to resolve class ($className) because param {$name} is missing a type hint.");
      }

      if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
        throw new ContainerException("Failed tgo resolve class {$className} because invalid param name");
      }

      $dependencies[] = $this->get($type->getName());
    }
    return $reflectionClass->newInstanceArgs($dependencies);
    // dd($dependencies);
  }

  public function get(string $id)
  {
    if (!array_key_exists($id, $this->definitions)) {
      throw new ContainerException("Class {$id} does not exist in container");
    }

    if (array_key_exists($id, $this->resolved)) {
      return $this->resolved[$id];
    }

    $factory = $this->definitions[$id];
    $dependency = $factory();

    $this->resolved[$id] = $dependency;

    return $dependency;
  }
}
