<?php

namespace App\Repositories;

use App\Models\Interfaces\PageInterface;
use App\Repositories\Interfaces\PageRepositoryInterface;
use App\Repositories\Repository;

/**
 * Class PageRepository
 *
 * @author Muhammad Shahab <muhammad.shahab@vservices.com>
 * @date 7/17/2019
 */
class PageRepository extends Repository implements PageRepositoryInterface
{
    protected $model;

    public function __construct(PageInterface $model)
    {
        $this->model = $model;
    }

    /**
     * Return's page data with media file
     * @param  array $where
     * @return Illuminate\Database\Query\Builder
     */
    public function getPage(array $where)
    {
        return $this->model
            ::select(
                'pages.*',
                'media_files.filename as mediafile',
                'media_files.alt_text as mediafile_alt'
            )
            ->leftJoin('media_files', 'pages.media_file_id', 'media_files.id')
            ->where($where)
            ->first();
    }

    public function searchPages($keyword)
    {
        $search = "%" . $keyword . "%";

        return $this->model
            ::select(
                'pages.*',
                'media_files.filename as mediafile',
                'media_files.alt_text as mediafile_alt'
            )
            ->leftJoin('media_files', 'pages.media_file_id', 'media_files.id')
            ->whereRaw(
                "(pages.page_title LIKE ? OR pages.slug LIKE ? OR pages.content LIKE ?)",
                [$search, $search, $search]
            )
            ->get();
    }
}
