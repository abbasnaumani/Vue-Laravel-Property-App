<?php

namespace App\Services;

use App\Models\Agency;
use App\Services\BaseService\BaseService;

class AgencyService extends BaseService
{
    /**
     * Get Unique Agency Slug
     *
     * @param array $params
     * @return string
     */
    public function getUniqueAgencyByParams(array $params = []): string
    {
        $type = $params['type'] ?? null;
        if ($type) {
            $explodeString = $type == 'slug' ? '-' : ' - ';
            $name = isset($params['name']) ? trim($params['name']) : '';
            $agencies = Agency::select($type)->where($type, "like", $name)
                ->orWhere($type, "like", $name . "$explodeString%")->get();
            if (isset($agencies) && !$agencies->isEmpty()) {
                $maxNumber = 0;
                foreach ($agencies as $agency) {
                    $pieces = explode($explodeString, $agency);
                    $number = intval(end($pieces));
                    if ($maxNumber < $number) {
                        $maxNumber = $number;
                    }
                }
                $name .= $explodeString . ($maxNumber + 1);
            }
        }

        return $name ?? '';
    }

}
