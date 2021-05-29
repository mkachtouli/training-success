<?php

namespace Drupal\tsuccess_master\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

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
            '#type' => 'textfield',
            '#title' => $this->t('Phone'),
            '#required' => true,
        );

        $form['email'] = [
            '#type' => 'email',
            '#title' => $this->t('Email'),
            '#required' => true,
        ];

        $form['birthday'] = [
            '#type' => 'date',
            '#title' => $this->t('Date of Birth'),
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

        $form['nationality'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Nationality'),
            '#required' => true,
        ];

        $form['cin'] = [
            '#type' => 'textfield',
            '#title' => $this->t('CIN or Passport ID'),
            '#required' => true,
        ];

        $form['training_cours'] = [
            '#type' => 'select',
            '#title' => $this->t('Select a training'),
            '#empty_option' => "- Select -",
            '#options' => $this->getTraining(),
            '#required' => true,
        ];

        $form['actions'] = [
            '#type' => 'actions',
        ];

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
        $phone = $form_state->getValue('phone');
        if (strlen($phone) < 10) {
            $form_state->setErrorByName('title', $this->t('The phone must be at least 10 characters long.'));
        }
    }

    public function getTraining()
    {
        $trainingNodes = array();
        $nids = \Drupal::entityQuery('node')
            ->condition('status', 1)
            ->condition('type', 'training_courses')
            ->execute();
        $nodes = Node::loadMultiple($nids);
        foreach ($nodes as $node) {
            $nodeTitle = $node->getTitle();
            $nodeId = $node->id();
            $trainingNodes[$nodeId] = $nodeTitle;
        }

        return $trainingNodes;
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
        $firstName = $form_state->getValue('first_name');
        $lastName = $form_state->getValue('last_name');
        $phone = $form_state->getValue('phone');
        $email = $form_state->getValue('email');
        $birthday = $form_state->getValue('birthday');
        $sexe = $form_state->getValue('sexe');
        $nationality = $form_state->getValue('nationality');
        $cin = $form_state->getValue('cin');
        $trainingCours = $form_state->getValue('training_cours');

        $nodeTrainingCours = Node::load($trainingCours);
        $titleNodeTrainingCours = $nodeTrainingCours->getTitle();

        // Create training course node object.
        $node = Node::create([
            'type' => 'training_registration',
            'title' => $titleNodeTrainingCours . ' - ' . $firstName . ' ' . $lastName,
            'field_first_name' => $firstName,
            'field_last_name' => $lastName,
            'field_phone' => $phone,
            'field_email' => $email,
            'field_birthday' => $birthday,
            'field_sexe' => $sexe,
            'field_nationality' => $nationality,
            'field_cin_passport' => $cin,
            'field_training_cours' => $trainingCours,
            'field_approval_of_the_request' => 'pending',
            'status' => 0,
        ]);
        $node->save();

        if ($node) {
            $this->messenger()->addStatus($this->t('%firstName your registration was saved.', ['%firstName' => $firstName]));
        } else {
            $this->messenger()->addStatus($this->t('Error'));
        }
    }
}