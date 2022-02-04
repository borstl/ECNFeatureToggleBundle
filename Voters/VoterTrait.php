<?php
declare(strict_types=1);

/*
 * This file is part of the ECNFeatureToggle package.
 *
 * (c) Pierre Groth <pierre@elbcoast.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ecn\FeatureToggleBundle\Voters;

/**
 * Should be used together with VoterInterface
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait VoterTrait
{
    private string $feature = "";

    /**
     * {@inheritdoc}
     */
    public function setParams(array $params): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setFeature(string $feature): void
    {
        $this->feature = $feature;
    }
}
