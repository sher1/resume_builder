<?php
// Removes layout_builder components whose plugin id starts with "extra_field_block:"
$cfg = \Drupal::configFactory()->getEditable('core.entity_view_display.node.resume.default');
$data = $cfg->getRawData();
if (isset($data['third_party_settings']['layout_builder']['sections']) && is_array($data['third_party_settings']['layout_builder']['sections'])) {
  foreach ($data['third_party_settings']['layout_builder']['sections'] as $si => &$section) {
    if (!empty($section['components']) && is_array($section['components'])) {
      foreach (array_keys($section['components']) as $comp_key) {
        $comp = $section['components'][$comp_key];
        $id = $comp['configuration']['id'] ?? '';
        if (strpos($id, 'extra_field_block:') === 0) {
          unset($section['components'][$comp_key]);
        }
      }
      if (empty($section['components'])) {
        unset($section['components']);
      }
    }
  }
}
$cfg->setData($data)->save();
echo "REMOVED\n";
