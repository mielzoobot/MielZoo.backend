<?php

//
declare(strict_types=1);

namespace Tirreno\Controllers\Admin\Logbook;

class Page extends \Tirreno\Controllers\Admin\Base\Page {
    public $page = 'AdminLogbook';

    public function getPageParams(): array {
        $searchPlacholder = $this->f3->get('AdminLogbook_search_placeholder');

        $pageParams = [
            'SEARCH_PLACEHOLDER'    => $searchPlacholder,
            'LOAD_UPLOT'            => true,
            'LOAD_DATATABLE'        => true,
            'LOAD_AUTOCOMPLETE'     => true,
            'HTML_FILE'             => 'admin/logbook.html',
            'JS'                    => 'admin_logbook.js',
        ];

        return parent::applyPageParams($pageParams);
    }
}