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

     // Main Tabs -> Info.
    $form['info'] = [
        '#type' => 'details',
        '#title' => t('Contact Information'),
        '#description' => t('Contact information.'),
        '#group' => 'tsuccess',
    ];

    // Settings under Info tab.
    $form['info']['contact_info'] = [
        '#type' => 'fieldset',
        '#title' => t('Contact Information'),
        '#collapsible' => true,
        '#collapsed' => false,
    ];

    // Tel.
    $form['info']['contact_info']['tel'] = [
        '#type' => 'details',
        '#title' => t("Telephone"),
        '#collapsible' => true,
        '#collapsed' => false,
    ];

    $form['info']['contact_info']['tel']['tel_number'] = [
        '#type' => 'textfield',
        '#title' => t('Telephone'),
        '#description' => t("Enter yours Phone number. Leave the field blank to hide this icon."),
        '#default_value' => theme_get_setting('tel_number', 'tsuccess'),
    ];

    // Email.
    $form['info']['contact_info']['email'] = [
        '#type' => 'details',
        '#title' => t("Email"),
        '#collapsible' => true,
        '#collapsed' => false,
    ];

    $form['info']['contact_info']['email']['email_addr'] = [
        '#type' => 'textfield',
        '#title' => t('Email'),
        '#description' => t("Enter yours Email. Leave the field blank to hide this icon."),
        '#default_value' => theme_get_setting('email_addr', 'tsuccess'),
    ];

    // Settings under social tab.
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
