<?php

/**
 * Add settings fields to SiteConfig to control maintenance mode
 *
 * @author Darren-Lee Joseph <darrenleejoseph@gmail.com>
 * @package maintenancemode
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property SiteConfig|MaintenanceModeSiteConfigExtension owner
 * @property boolean MaintenanceMode
 * EndGeneratedWithDataObjectAnnotator
 */
class MaintenanceModeSiteConfigExtension extends DataExtension {

    /**
     * Add database field for flag to either display or hide under construction pages.
     *
     * @var array
     */
    private static $db = array(
        'MaintenanceMode' => 'Boolean'
    );

    /**
     * @param  FieldList $fields
     */
    public function updateCMSFields(FieldList $fields) {

        //create new tabs in SiteConfig
        $fields->addFieldToTab("Root.Access",
            FieldGroup::create(
                HeaderField::create(
                    'MaintenanceModeHeading',
                    _t('MaintenanceMode.SETTINGSHEADING', 'Offline/Maintenance Mode'),
                    $headingLevel = 3
                ),
                CheckboxField::create(
                    'MaintenanceMode',
                    '&nbsp; ' . _t('MaintenanceMode.SETTINGSACTIVATE', 'Activate Offline/Maintenance Mode')
                )
            )
        );
    }//end updateCMSFields
}