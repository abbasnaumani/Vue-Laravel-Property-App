<?php

namespace App\Traits;

use App\Models\GlobalSetting;

trait GlobalSettingsTrait
{
    protected $globalSettings = null;

    public function prepareGlobalSettings()
    {
        if (!$this->globalSettings) {
            $prepareGlobalSettings = [];
            $globalSettings = GlobalSetting::all();
            if (isset($globalSettings) && !empty($globalSettings)) {
                foreach ($globalSettings as $globalSetting) {
                    $fieldName = $globalSetting->field_name ?? null;
                    if ($fieldName) {
                        $prepareGlobalSettings[$fieldName] = $globalSetting->toArray();
                    }
                }
            }
            $this->globalSettings = $prepareGlobalSettings;
        }
        return $this->globalSettings;
    }

    public function getGlobalSettings()
    {
        return $this->globalSettings ?? $this->prepareGlobalSettings();
    }

    public function getGlobalSettingByName($name = null)
    {
        $setting = null;
        if ($name) {
            $globalSettings = $this->globalSettings ?? $this->prepareGlobalSettings();
            $setting = $globalSettings[$name] ?? null;
        }
        return $setting;
    }

    public function getGlobalSettingValueByName($name = null)
    {
        $settingValue = null;
        if ($name) {
            $globalSettings = $this->globalSettings ?? $this->prepareGlobalSettings();
            $settingValue = $globalSettings[$name]['value'] ?? null;
        }
        return $settingValue;
    }

}
