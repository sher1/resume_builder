<?php
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\field\Entity\FieldConfig;

// Create field storage for layout_builder__layout if it doesn't exist.
if (!FieldStorageConfig::loadByName('node', 'layout_builder__layout')) {
  FieldStorageConfig::create([
    'field_name' => 'layout_builder__layout',
    'entity_type' => 'node',
    'type' => 'layout_section',
    'settings' => [],
    'module' => 'layout_builder',
    'cardinality' => 1,
    'locked' => TRUE,
    'translatable' => FALSE,
  ])->save();
  echo "Created field.storage.node.layout_builder__layout\n";
}
else {
  echo "field.storage.node.layout_builder__layout already exists\n";
}

// Attach field to resume bundle if not present.
if (!FieldConfig::loadByName('node', 'resume', 'layout_builder__layout')) {
  FieldConfig::create([
    'field_name' => 'layout_builder__layout',
    'entity_type' => 'node',
    'bundle' => 'resume',
    'label' => 'Layout',
    'settings' => [],
  ])->save();
  echo "Created field.field.node.resume.layout_builder__layout\n";
}
else {
  echo "field.field.node.resume.layout_builder__layout already exists\n";
}
