<?php
/**
 * @file
 * Custom setting for Tsuccess theme.
 */

function tsuccess_form_system_theme_settings_alter(&$form, &$form_state)
{

    $form['tsuccess'] = [
        '#type' => 'vertical_tabs',
        '#title' => '<h3>' . t('Tsuccess Theme Settings') . '</h3>',
        '#default_tab' => 'general',
    ];

    // Main Tabs -> Social.
    $form['social'] = [
        '#type' => 'details',
        '#title' => t('Social'),
        '#description' => t('Social icons settings. These icons appear in footer region.'),
        '#group' => 'tsuccess',
    ];

    // Settings under social tab.
    // Show or hide all icons.
    $form['social']['social_profile'] = [
        '#type' => 'fieldset',
        '#title' => t('Social Profile'),
        '#collapsible' => true,
        '#collapsed' => false,
    ];

    // Facebook.
    $form['social']['social_profile']['facebook'] = [
        '#type' => 'details',
        '#title' => t("Facebook"),
        '#collapsible' => true,
        '#collapsed' => false,
    ];

    $form['social']['social_profile']['facebook']['facebook_url'] = [
        '#type' => 'textfield',
        '#title' => t('Facebook Url'),
        '#description' => t("Enter yours facebook profile or page url. Leave the url field blank to hide this icon."),
        '#default_value' => theme_get_setting('facebook_url', 'tsuccess'),
    ];

    // Instagram.
    $form['social']['social_profile']['instagram'] = [
        '#type' => 'details',
        '#title' => t("Instagram"),
        '#collapsible' => true,
        '#collapsed' => false,
    ];

    $form['social']['social_profile']['instagram']['instagram_url'] = [
        '#type' => 'textfield',
        '#title' => t('Instagram Url'),
        '#description' => t("Enter yours instagram page url. Leave the url field blank to hide this icon."),
        '#default_value' => theme_get_setting('instagram_url', 'tsuccess'),
    ];

    // Linkedin.
    $form['social']['social_profile']['linkedin'] = [
        '#type' => 'details',
        '#title' => t("Linkedin"),
        '#collapsible' => true,
        '#collapsed' => false,
    ];

    $form['social']['social_profile']['linkedin']['linkedin_url'] = [
        '#type' => 'textfield',
        '#title' => t('Linkedin Url'),
        '#description' => t("Enter yours linkedin page url. Leave the url field blank to hide this icon."),
        '#default_value' => theme_get_setting('linkedin_url', 'tsuccess'),
    ];

    // WhatsApp.
    $form['social']['social_profile']['whatsapp'] = [
        '#type' => 'details',
        '#title' => t("WhatsApp"),
        '#collapsible' => true,
        '#collapsed' => false,
    ];

    $form['social']['social_profile']['whatsapp']['whatsapp_url'] = [
        '#type' => 'textfield',
        '#title' => t('WhatsApp Url'),
        '#description' => t("Enter yours whatsapp message url. Leave the url field blank to hide this icon."),
        '#default_value' => theme_get_setting('whatsapp_url', 'tsuccess'),
    ];

}
