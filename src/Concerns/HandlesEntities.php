<?php

namespace Timetables\Concerns;

use Timetables\Base\Response;

trait HandlesEntities
{

  public function getEntitiesByUser($request, $app, $table)
  {
    $repo = $app->repository($table);
    $entities = $repo->findByUser($request->user);
    return $entities;
  }

  public function entitiesArray($entities)
  {
    return $entities->map(function($entity) {
      return $entity->toArray();
    });
  }

  public function entities($entities)
  {
    return $this->json(
      $this->entitiesArray($entities)
    );
  }
  
  public function entitiesByUser($request, $app, $table)
  {
    return $this->entities(
      $this->getEntitiesByUser($request, $app, $table)
    );
  }
  
}