<?php 

namespace Drupal\bakery\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends FormBase {
    
    public function getFormId()
    {
        return 'bakery_settings_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['first_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('First name:'),
            '#required' => true,
        ];

        $form['last_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Last name:'),
            '#required' => true,
        ];

        $form['phone'] = [
            '#type' => 'tel',
            '#title' => $this->t('Phone number:'),
            '#required' => true,
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'Opslaan',
            '#button_type' => 'primary',
          ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        \Drupal::state()->set('bakery.first_name', $form_state->getValue('first_name'));
        \Drupal::state()->set('bakery.last_name', $form_state->getValue('last_name'));
        \Drupal::state()->set('bakery.phone', $form_state->getValue('phone'));
        \Drupal::messenger()->addStatus('De gegevens zijn succesvol opgeslagen');
    }
}