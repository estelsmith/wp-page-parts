<?php

namespace CascadeMedia\WordPress\PagePartsPlugin;

class PagePartsPlugin
{
    public function __construct()
    {
        $this->registerHooks();
    }

    /**
     * Instantiate only a single instance of the class.
     */
    public static function getInstance(): self
    {
        static $instance = null;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    protected function bindClosure(\Closure $closure)
    {
        return \Closure::bind($closure, $this, $this);
    }

    protected function init()
    {
        ;
    }

    protected function registerHooks()
    {
        add_action(
            'init',
            $this->bindClosure(
                function () {
                    $this->init();
                }
            )
        );
    }
}
