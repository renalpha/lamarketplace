<?php

namespace Exdeliver\Marketplace\Services;

use Exdeliver\Marketplace\Models\MarketplaceAdvertisementImages;

class MarketplaceAdvertisementService
{
    public $path;

    public function __construct()
    {
        $this->path = public_path() . '/content';

        if (!file_exists($this->path)) {
            \File::makeDirectory($this->path, 0775, true);
        }
    }

    public function imageupload($files, $advertisement)
    {
        foreach ($files as $file) {
            $original_extension = $file->getClientOriginalExtension();

            $req_filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $hashed_filename = str_slug($req_filename . '_' . microtime(true)) . '.' . $original_extension;
            $file->move($this->path, $hashed_filename);

            \MarketplaceService::generateThumb($hashed_filename, $this->path);

            $image = new MarketplaceAdvertisementImages();
            $image->user_id = \Auth::user()->id;
            $image->advertisement_id = $advertisement->id;
            $image->filename = $hashed_filename;
            $image->description = $original_extension;
            $image->save();
        }
    }
}