<?php namespace Maatwebsite\Clerk;

/**
 * Interface Sheet
 * @package Maatwebsite\Clerk
 */
interface Sheet {

    /**
     * Get the sheet title
     * @return string
     */
    public function getTitle();

    /**
     * Set the sheet title
     * @param string $title
     * @return string
     */
    public function setTitle($title);

    /**
     * @param array  $source
     * @param null   $nullValue
     * @param string $startCell
     * @param bool   $strictNullComparison
     * @return $this
     */
    public function fromArray(array $source, $nullValue = null, $startCell = 'A1', $strictNullComparison = false);
}