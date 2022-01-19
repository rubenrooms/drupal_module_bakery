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
        $form['bread'] = [
            '#type' => 'checkbox',
            '#title' => ('Bread:'),
            '#required' => false,
        ];

        $form['bread_type'] = [
            '#type' => 'checkboxes',
            '#title' => ('Type of bread:'),
            '#required' => false,
            '#options' => [
                'white bread' => ('White bread'),
                'grey bread' => ('Grey bread'),
                'waldkorn bread' => ('Waldkorn bread'),
                'ciabatta' => ('Ciabatta bread'),
                'baguette' => ('Baguette')
            ],
            '#states' => [
                'visible' => [
                    ':input[name="bread"]' => [
                        'checked' => true,
                    ],
                ],
            ],
        ];

        $form['pastry'] = [
            '#type' => 'checkbox',
            '#title' => ('Pastry:'),
            '#required' => false,
        ];

        $form['pastry_type'] = [
            '#type' => 'checkboxes',
            '#title' => ('Type of pastry:'),
            '#required' => false,
            '#options' => [
                'pastry with chocolate and pudding' => ('Pastry with chocolate and pudding'),
                'pastry with cherries' => ('Pastry with cherries'),
                'croissant' => ('Croissant'),
                'pistolet' => ('Pistolet')
            ],
            '#states' => [
                'visible' => [
                    ':input[name="pastry"]' => [
                        'checked' => true,
                    ],
                ],
            ],
        ];

        $form['first_name'] = [
            '#type' => 'textfield',
            '#title' => ('First name:'),
            '#required' => true,
        ];

        $form['last_name'] = [
            '#type' => 'textfield',
            '#title' => ('Last name:'),
            '#required' => true,
        ];

        $form['phone'] = [
            '#type' => 'tel',
            '#title' => ('Phone number:'),
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
        \Drupal::state()->set('bakery.bread', $form_state->getValue('bread'));
        \Drupal::state()->set('bakery.bread_type', $form_state->getValue('bread_type'));
        \Drupal::state()->set('bakery.pastry', $form_state->getValue('pastry'));
        \Drupal::state()->set('bakery.pastry_type', $form_state->getValue('pastry_type'));

        \Drupal::state()->set('bakery.first_name', $form_state->getValue('first_name'));
        \Drupal::state()->set('bakery.last_name', $form_state->getValue('last_name'));
        \Drupal::state()->set('bakery.phone', $form_state->getValue('phone'));
        \Drupal::messenger()->addStatus('Your order is succesfully saved.');
    }
}