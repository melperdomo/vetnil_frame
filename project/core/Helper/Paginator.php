<?php

namespace Core\Helper;

class Paginator
{
    public string $sql;
    public array $params;
    public int $page;
    public int $itemsPerPage;
    public int $totalItems;
    public int $totalPages;
    public array $results;
    public $pagesLeft;
    public $pagesRight;

    public function __construct(string $sql, array $params = [], int $page = null, int $itemsPerPage = 20)
    {
        $this->sql = rtrim(rtrim($sql), ";");
        $this->params = $params;
        $this->page = $page ?? $_GET['page'] ?? 1;
        $this->itemsPerPage = $itemsPerPage;
        $this->pagesLeft = 5;
        $this->pagesRight = 5;

        $this->calcTotalItems();
        $this->calcTotalPages();
        $this->setResults();
    }

    public static function make(string $sql, array $params = [], int $page = null, int $itemsPerPage = 20): Paginator
    {
        return new static($sql, $params, $page, $itemsPerPage);
    }

    private function calcTotalItems()
    {
        $sqlCount = "SELECT COUNT(*) AS count FROM ( ". $this->sql ." ) AS tbl_count;";
        $result = DB::first($sqlCount, $this->params);
        $this->totalItems = empty($result->count) ? 0 : $result->count;
    }

    private function calcTotalPages()
    {
        $this->totalPages = ceil($this->totalItems / $this->itemsPerPage);
    }

    private function setResults()
    {
        $offset = $this->itemsPerPage * ($this->page - 1);
        $sqlChunked = $this->sql . " LIMIT " . $this->itemsPerPage . " OFFSET $offset ";
        $this->results = DB::query($sqlChunked, $this->params);
    }

    public function render()
    {
        $divPaginator = '';
        $divPaginator .= '<div class="flex-paginator">';

        $divPaginator .= $this->makeDivLeftButtons();
        if ($this->page > 1) {
            $divPaginator .= $this->makeDivPreviousPages();
        }

        $divPaginator .= $this->makeDivCurrentPage();

        if ($this->page < $this->totalPages) {
            $divPaginator .= $this->makeDivNextPages();
        }
        $divPaginator .= $this->makeDivRightButtons();

        $divPaginator .= '</div>';

        echo $divPaginator;
    }

    private function makePageUrl($pageNumber)
    {
        parse_str($_SERVER['QUERY_STRING'], $arrParams);
        $arrParams['page'] = $pageNumber;

        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?' . http_build_query($arrParams);
    }

    private function makeDivLeftButtons()
    {
        $disabled = ($this->page <= 1) ? "disabled" : "";

        return '
            <div class="buttons-page '. $disabled .'">
                <a class="link-page" href="' . $this->makePageUrl(1) . '">&#171;</a>
                <a class="link-page" href="' . $this->makePageUrl($this->page - 1) . '">&#8249;</a>
            </div>
        ';
    }

    private function makeDivPreviousPages()
    {
        $div = '<div class="previous-pages">';
        $arrDivs = [];

        for ($i = 1; $i < $this->pagesLeft; $i++) {
            $numberLink = $this->page - $i;

            if ($numberLink == 0) {
                break;
            }

            $arrDivs[] = '<a class="link-page" href="' . $this->makePageUrl($numberLink) . '">' . $numberLink . '</a>';
        }

        $div .= implode("", array_reverse($arrDivs));
        $div .= '</div>';

        return $div;
    }

    private function makeDivCurrentPage()
    {
        return '
            <div class="current-page">
                <span class="link-page">' . $this->page . '</span>
            </div>
        ';
    }

    private function makeDivNextPages()
    {
        $div = '<div class="next-pages">';

        for ($i = 1; $i < $this->pagesRight; $i++) {
            $numberLink = $this->page + $i;

            if ($numberLink > $this->totalPages) {
                break;
            }

            $div .= '<a class="link-page" href="' . $this->makePageUrl($numberLink) . '">' . $numberLink . '</a>';
        }

        $div .= '</div>';

        return $div;
    }

    private function makeDivRightButtons()
    {
        $disabled = ($this->page >= $this->totalPages) ? "disabled" : "";

        return '
            <div class="buttons-page '. $disabled .'">
                <a class="link-page" href="' . $this->makePageUrl($this->page + 1) . '">&#8250;</a>
                <a class="link-page" href="' . $this->makePageUrl($this->totalPages) . '">&#187;</a>
            </div>
        ';
    }
}
