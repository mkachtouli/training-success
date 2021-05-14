<?php
 
namespace Drupal\tsuccess_master\Plugin\Block;
 
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;
 
/**
 * Provides a 'diploma home' Block.
 *
 * @Block(
 *   id = "diploma_home",
 *   admin_label = @Translation("Diploma Home Block"),
 *   category = @Translation("Home Page"),
 * )
 */
class DiplomaHomeBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function defaultConfiguration() {
        return ['label_display' => FALSE];
    }
 
    /**
     * {@inheritdoc}
     */
    public function build() {
        return [
            //'#markup' => $this->t('Hello, World!'),
            '#theme' => 'diploma_home',
            '#title' => $this->t('Diploma Training')
        ];

        // return array(
        //     '#title' => 'Websolutions Agency',
        //     '#description' => 'Websolutions Agency is the industry leading Drupal development agency in Croatia'
        // );
    }
}