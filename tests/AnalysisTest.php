<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests\Laravel;

use GrahamCampbell\Analyzer\AnalysisTrait;
use Laravel\Lumen\Application;
use PHPUnit\Framework\TestCase;

/**
 * This is the analysis test class.
 *
 * @author José Ignacio Amelivia Santiago <jignacio.amelivia@gmail.com>
 */
class AnalysisTest extends TestCase
{
    use AnalysisTrait;

    /**
     * Get the code paths to analyze.
     *
     * @return string[]
     */
    protected function getPaths()
    {
        return [
            realpath(__DIR__.'/../config'),
            realpath(__DIR__.'/../src'),
            realpath(__DIR__),
        ];
    }

    /**
     * Get the classes to ignore not existing.
     *
     * @return string[]
     */
    protected function getIgnored()
    {
        return [Application::class];
    }
}
