<?php

namespace faizalmansor\MaintenanceMode\Console\Commands;

use Illuminate\Console\Command;
use faizalmansor\MaintenanceMode\MaintenanceModeService;

abstract class MaintenanceCommand extends Command
{
    /**
     * Maintenance Service.
     *
     * @var MaintenanceModeService
     */
    protected $maintenance;

    /**
     * @param \faizalmansor\MaintenanceMode\MaintenanceModeService $maintenance
     */
    public function __construct(MaintenanceModeService $maintenance)
    {
        parent::__construct();

        $this->maintenance = $maintenance;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    abstract public function handle();

    /**
     * Set Application Up Mode.
     *
     * @return void
     * @throws \faizalmansor\MaintenanceMode\Exceptions\FileException
     */
    public function setUpMode()
    {
        $this->maintenance->setUpMode();
        $this->info('Application is now live.');
    }

    /**
     * Set Application Down Mode.
     *
     * @return void
     * @throws \faizalmansor\MaintenanceMode\Exceptions\FileException
     */
    public function setDownMode()
    {
        $this->maintenance->setDownMode();
        $this->info('Application is now in maintenance mode.');
    }
}
