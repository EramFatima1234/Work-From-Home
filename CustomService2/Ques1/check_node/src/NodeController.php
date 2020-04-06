<?php
namespace Drupal\check_node;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

class NodeController extends ControllerBase
{
    private $node;
    public function run($nid)
    {
        if(ctype_digit($nid))
        {
            if($node = Node::load($nid))
            {
                return array('#title'=>$node->getTitle());     
            }
            else {
                return array('#title'=>'No Such Node');
            }
            
        } else {
            return array('#title'=>'Only Numeric Node IDs Accepted ');
        }
        
    }
}