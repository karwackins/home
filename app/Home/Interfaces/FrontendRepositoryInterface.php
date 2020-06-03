<?php
namespace App\Home\Interfaces;

    interface FrontendRepositoryInterface {
        public function getEventsForMainPage();

        public function getEventForShow($id);

        public function getTasksForMainPage();

        public function getDoneTasksForMainPage();
    }
