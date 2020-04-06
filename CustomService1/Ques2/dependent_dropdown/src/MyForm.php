<?php

namespace Drupal\dependent_dropdown;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class MyForm extends FormBase {
    public function getFormId() {
        return 'my_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Name'),
            '#required' => TRUE,
        ];
        $form['entity'] = [
            '#type' => 'select',
            '#title' => $this->t('Choose an Entity'),
            '#options' => array_keys(\Drupal::entityTypeManager()->getDefinitions()),
            '#ajax' => [
                'callback' => '::myAjaxCallback', // don't forget :: when calling a class method
                'disable-refocus' => FALSE, // Or TRUE to prevent re-focusing on the triggering element.
                'event' => 'change',
                'wrapper' => 'edit-output', // This element is updated with this AJAX callback.
                'progress' => [
                  'type' => 'throbber',
                  'message' => $this->t('Getting Bundles...'),
                ],
              ],
        ];

        $form['bundle'] = [
            '#type' => 'select',
            '#title' => $this->t('Select Bundle'),
            '#prefix' => '<div id="edit-output">',
            '#suffix' => '</div>',
            '#options' => array_keys((array) \Drupal::entityTypeManager()->getDefinition('block')),
//            '#options' => array_keys((array) \Drupal::entityTypeManager()->getDefinition('block')),
            '#validated' => TRUE,
            '#default_value' => $this->t('Choose a Course first'),
        ];

        $form['submit'] = [
          '#type' => 'submit',
          '#value' => $this->t('Submit'),
        ];

        return $form;
    }

    public function myAjaxCallback(array &$form, FormStateInterface $form_state)
    {
        $courseYear = 0;
        if($entitySelected = $form['entity']['#value']){
          $entityId = $form['entity']['#options'][$entitySelected];
        $form['bundle']['#options'] = array_keys((array) \Drupal::entityTypeManager()
            ->getDefinition($entityId));
//          $form['courseYear']['#options'] = array_keys((array) \Drupal::entityTypeManager()
//            ->getStorage($courseSelected));
        }
        return $form['bundle'];
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
         if (mb_strlen($form_state->getValue('name')) < 10) {
             $form_state->setErrorByName('name', $this->t('Name should be at least 10 alphabets.'));
         }
//        //We can add the rest of validation here
//          var_dump($form['course']['#options'][$form['course']['#value']]);
//         $form['courseYear']['#options'] = $this->getYears(1);
//         return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {

        \Drupal::messenger()->addStatus($entityId = $form['entity']['#options'][$form_state->getValue('entity')].'<br>Data Saved....');
    }
}
