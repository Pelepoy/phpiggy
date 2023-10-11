<?php

declare(strict_types=1);

function dd(mixed $value)
{
  // SUGAR FUNCTION FOR PRE tag
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die(); // NOTE only run once 
}

function e($value)
{
  // SUGAR FUNCTION FOR ESCAPING to avoid XSS
  return htmlspecialchars((string) $value);
}