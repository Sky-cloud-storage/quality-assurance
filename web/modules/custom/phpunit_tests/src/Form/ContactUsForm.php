<?php

namespace Drupal\phpunit_tests\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ContactUsForm setting form for contact form.
 *
 * @package Drupal\phpunit_tests\Form
 */
class ContactUsForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'contact_us';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = [
      '#type' => 'textfield',
      '#maxlength' => 150,
      '#title' => $this->t('Name'),
      '#default_value' => $form_state->get($this->getFormId() . '_name'),
    ];
    $form['subject'] = [
      '#type' => 'textarea',
      '#maxlength' => 150,
      '#title' => $this->t('Subject'),
      '#default_value' => $form_state->get($this->getFormId() . '_subject'),
    ];
    $form['gender'] = [
      '#type' => 'select',
      '#options' => [
        'none' => 'Not Specified',
        'transgender' => 'Transgender',
        'male' => 'Male',
        'female' => 'Female',
      ],
      '#required' => TRUE,
      '#default_value' => $form_state->get($this->getFormId() . '_gender'),
    ];

    $form['email'] = [
      '#type' => 'email',
      '#maxlength' => 100,
      '#title' => $this->t('Email'),
      '#default_value' => $form_state->get($this->getFormId() . '_email'),
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
//    drupal_set_message($this->t('Your information has been successfully submitted.'));
    $name = $form_state->getValue('name');
    if ($form_state->getValue('gender') == 'male') {
      \Drupal::messenger()->addMessage('Thank you for your message Mister ' .  $name . '!');
    }
    if ($form_state->getValue('gender') == 'female') {
      \Drupal::messenger()->addMessage('Thank you for your message Miss ' .  $name . '!');
    }
    if ($form_state->getValue('gender') == 'transgender') {
      \Drupal::messenger()->addMessage('Thank you for your message Human ' .  $name . '!');
    }
    if ($form_state->getValue('gender') == 'none') {
      \Drupal::messenger()->addMessage('Thank you for your message ' .  $name . '!');
    }
    $form_state->set($this->getFormId() . '_name', $form_state->getValue('name'));
    $form_state->set($this->getFormId() . '_subject', $form_state->getValue('subject'));
    $form_state->set($this->getFormId() . '_gender', $form_state->getValue('gender'));
    $form_state->set($this->getFormId() . '_email', $form_state->getValue('email'));
  }
}
