<?php
namespace App\Home\Interfaces;

    interface FrontendRepositoryInterface {
        public function getEventsForMainPage();

        public function getTasksForMainPage();

        public function getDoneTasksForMainPage();
    }
