<?php

namespace Drupal\related_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\taxonomy\Entity\Term;
\Drupal::service('cache.render')->invalidateAll();
/**
 * Provides a 'related block programetically' Block.
 *
 * @Block(
 *   id = "related_block",
 *   admin_label = @Translation("related block programetically"),
 *   category = @Translation("related block by Eram Fatima"),
 * )
 */
class relatedblock extends BlockBase
{

    public function build()
    {   
        // Getting Term IDs for Animal_Kingdom ContentType
        $query = \Drupal::entityQuery('taxonomy_term')->condition('vid', 'class');
        $result = $query->execute();
        
        foreach ($result as $key => $value) {
            $result[$key] =  Term::load($value)->getName();
        }
        $term_id = array_keys($result);
        //print_r($term_id);
        //Getting Current Node ID
        $node = \Drupal::routeMatch()->getParameter('node');
        if ($node instanceof \Drupal\node\NodeInterface) {
            $n = $node->id();
            $tid = $node->field_class->target_id;
        }

        $url = '<table>';
        
        $query = \Drupal::entityTypeManager()->getStorage('node')->getQuery()->condition('field_class', $tid);
        $nids = $query->execute();
        
        foreach ($nids as $nid) {
            $node = \Drupal\node\Entity\Node::load($nid);
            $name = $node->title->value;
            if ($n !== $node->nid->value) {
                $url .= '<tr><td><a href="/drupaldrive/node/' . $node->nid->value . '">' . $name . '</a></td></tr>';
            }
        }

        $url .= '</table>';
        // kint($nid);
        return [
            '#type' => 'markup',
            '#markup' => $url,

        ];

    }
}
