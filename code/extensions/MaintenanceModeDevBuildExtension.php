<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 25-10-2015
 * Time: 19:34
 */
class MaintenanceModeDevBuildExtension extends DataExtension
{
    /**
     * @var SiteConfig|MaintenanceModeSiteConfigExtension
     */
    protected $config;

    public function onBeforeInit()
    {
        $this->config = SiteConfig::current_site_config();
        $this->config->MaintenanceMode = true;
        $this->config->write();
    }

    public function onAfterInit()
    {
        $this->config->MaintenanceMode = false;
        $this->config->write();
    }

}