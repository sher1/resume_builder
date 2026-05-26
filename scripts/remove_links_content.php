<?php
// Remove the 'links' entry from the node.resume.default entity view display active config.
$cfg = \Drupal::configFactory()->getEditable('core.entity_view_display.node.resume.default');
$data = $cfg->getRawData();
if (!empty($data['content']) && isset($data['content']['links'])) {
  unset($data['content']['links']);
  $cfg->setData($data)->save();
  echo "REMOVED_LINKS\n";
} else {
  echo "NO_LINKS_FOUND\n";
}
