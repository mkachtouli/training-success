<?php

namespace Drupal\tsuccess_master\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
//use Drupal\tsuccess_master\Master;

/**
 * This example demonstrates a simple form with a singe text input element. We
 * extend FormBase which is the simplest form base class used in Drupal.
 */
class TrainingRegistration extends FormBase
{

    /**
     * Getter method for Form ID.
     *
     * @return string
     *   The unique ID of the form defined by this class.
     */
    public function getFormId()
    {
        return 'form_api_training_registration';
    }

    /**
     * Build the simple form.
     *
     * @param array $form
     *   Default form array structure.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   Object containing current form state.
     *
     * @return array
     *   The render array defining the elements of the form.
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['description'] = [
            '#type' => 'item',
            '#markup' => $this->t('Apply Now'),
        ];

        // $form['title'] = [
        //     '#type' => 'textfield',
        //     '#title' => $this->t('Title'),
        //     '#description' => $this->t('Title must be at least 5 characters in length.'),
        //     '#required' => true,
        // ];

        // $form['copy'] = array(
        //     '#type' => 'checkbox',
        //     '#title' => $this->t('Send me a copy'),
        // );

        $form['first_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('First name'),
            '#required' => true,
        ];

        $form['last_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Last name'),
            '#required' => true,
        ];

        $form['phone'] = array(
            '#type' => 'tel',
            '#title' => $this->t('Phone'),
            '#pattern' => '[^\\d]*',
        );

        $form['email'] = [
            '#type' => 'email',
            '#title' => $this->t('Email'),
            '#pattern' => '*@example.com',
        ];

        $form['birthday'] = [
            '#type' => 'date',
            '#title' => $this->t('Birthday')
        ];

        $form['nationality'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Nationality'),
            '#required' => true,
        ];

        $form['cin'] = [
            '#type' => 'textfield',
            '#title' => $this->t('CIN or Pasport ID'),
            '#required' => true,
        ];

        $form['sexe'] = array(
            '#type' => 'radios',
            '#title' => $this->t('Sexe'),
            '#options' => array(
                "m" => $this->t('M'),
                "f" => $this->t('F'),
            ),
            '#required' => true,
        );

        $form['example_select'] = [
            '#type' => 'select',
            '#title' => $this
              ->t('Select element'),
            '#options' => $this->getTraning(),
          ];

        // Group submit handlers in an actions element with a key of "actions" so
        // that it gets styled correctly, and so that other modules may add actions
        // to the form. This is not required, but is convention.
        $form['actions'] = [
            '#type' => 'actions',
        ];

        // Add a submit button that handles the submission of the form.
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
        ];

        return $form;
    }



    /**
     * Implements form validation.
     *
     * @param array $form
     *   The render array of the currently built form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   Object describing the current state of the form.
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        $title = $form_state->getValue('title');
        if (strlen($title) < 5) {
            // Set an error for the form element with a key of "title".
            $form_state->setErrorByName('title', $this->t('The title must be at least 5 characters long.'));
        }
    }

    public function getTraning(){
        return [
            '1' => $this->t('One'),
            '2' => $this->t('Two'),
            '3' => $this->t('Three'),
            '4' => $this->t('Foor'),
        ];
    }

    /**
     * Implements a form submit handler.
     *
     * @param array $form
     *   The render array of the currently built form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   Object describing the current state of the form.
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $title = $form_state->getValue('title');
        $this->messenger()->addStatus($this->t('You specified a title of %title.', ['%title' => $title]));
    }

}
