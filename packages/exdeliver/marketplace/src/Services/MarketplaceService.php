<?php

namespace Exdeliver\Marketplace\Services;

use App\User;
use Exdeliver\Marketplace\Models\MarketplaceCategories;
use Exdeliver\Marketplace\Repositories\DynamicModelRepository;

class MarketplaceService
{
    public function getModel($model)
    {
        return new DynamicModelRepository($model);
    }

    public function getCategories()
    {
        $categories = $this->getModel(new MarketplaceCategories());
        return $categories;
    }

    public function selectCategories($params = null)
    {
        $categories = $this->getCategories()->pluck('title', 'id')->toArray();
        if (isset($params['selection'])) {
            $categories[null] = trans('marketplace::elements.select_category');
        }
        return $categories;
    }

    public function selectUser($params = null)
    {
        $users = $this->getModel(new User())->pluck('email', 'id');

        if (isset($params['selection'])) {
            $users[null] = trans('marketplace::elements.user');
        }
        return $users;
    }

    public function generateThumb($filename, $path, $width = 100, $height = 100)
    {
        $path = $path . '/';
        try {
            // create a new image resource from file
            $img_thumb = \Image::make($path . $filename);

            if (isset($width) && isset($height)) {
                $img_thumb->resize($width, $height);
            } else {
                // resize the image to a width of 300 and constrain aspect ratio (auto height)
                $img_thumb->resize($width, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img_thumb->save($path . 'thumb_' . $width . '_' . $filename);

            return 'thumb_' . $width . '_' . $filename;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}