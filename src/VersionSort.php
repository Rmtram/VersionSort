<?php

namespace Rmtram\VersionSort;

/**
 * Class VersionSort
 * @package Rmtram\VersionSort
 */
class VersionSort
{

    /**
     * @var array
     */
    private $versions;

    /**
     *
     * @param array $versions e.g. ['v1.0.1', 'v2.0.0']
     */
    public function __construct(array $versions)
    {
        $this->versions = $versions;
    }

    /**
     * get versions
     * @return array
     */
    public function get()
    {
        return $this->versions;
    }

    /**
     * trim prefix text.
     * e.g
     *   v1.1.0          => 1.1.0
     *   version2.3.RC.1 => 2.3.RC.1
     * @return $this
     */
    public function trim()
    {
        foreach ($this->versions as &$version) {
            $version = preg_replace('/^[^0-9]+/', '', $version);
        }
        return $this;
    }

    /**
     * sort asc
     * e.g
     *   $before => ['1.0.3', '1.0.1', '1.0.4']
     *   $after  => ['1.0.1', '1.0.3', '1.0.4']
     * @return array
     */
    public function asc()
    {
        usort($this->versions, 'version_compare');
        return $this->versions;
    }

    /**
     * version desc
     * e.g
     *   $before => ['1.0.3', '1.0.1', '1.0.4']
     *   $after  => ['1.0.4', '1.0.3', '1.0.1']
     * @return array
     */
    public function desc()
    {
        usort($this->versions, function($v1, $v2) {
            return -version_compare($v1, $v2);
        });
        return $this->versions;
    }
}