<?php

namespace esign\craftblitzvercel;

use craft\base\Plugin as BasePlugin;
use craft\events\RegisterComponentTypesEvent;
use putyourlightson\blitz\helpers\CachePurgerHelper;
use yii\base\Event;

/**
 * Blitz Vercel Purger plugin
 *
 * @method static Plugin getInstance()
 * @author dieter vanhove <support@esign.eu>
 * @copyright dieter vanhove
 * @license MIT
 */
class Plugin extends BasePlugin
{
    public string $schemaVersion = '1.0.0';

    public function init(): void
    {
        parent::init();

        Event::on(
            CachePurgerHelper::class,
            CachePurgerHelper::EVENT_REGISTER_PURGER_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = VercelPurger::class;
            }
        );
    }
}
