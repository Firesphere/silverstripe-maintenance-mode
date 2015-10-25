<?php

/**
 * Before we start a database-build, set the maintenancemode, so in case of an error or a long build
 * visitors will get the maintenancemode page.
 *
 * class MaintenanceModeDevBuildExtension
 */
class MaintenanceModeDevBuildExtension extends DataExtension
{
    /**
     * @var SiteConfig|MaintenanceModeSiteConfigExtension
     */
    protected $config;

    public function onBeforeInit()
    {
        $tableList = DB::table_list();
        // Check if the database-table already exists
        $this->config = SiteConfig::current_site_config();
        if (array_key_exists('siteconfig', $tableList)) {
            $this->config->MaintenanceMode = true;
            $this->config->write();
        }
    }

    public function onAfterInit()
    {
        // We don't need to check here. We've been through build. This might only fail if extension isn't recognised
        $this->config->MaintenanceMode = false;
        $this->config->write();
    }

}