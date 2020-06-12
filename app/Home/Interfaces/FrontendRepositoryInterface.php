<?php
namespace App\Home\Interfaces;

    interface FrontendRepositoryInterface {
        public function getEventsForMainPage();

        public function getEventForShow($id);

        public function getTasksForMainPage();

        public function getDoneTasksForMainPage();

        public function getExpense($id);

//        public function setBudgetForMounth($budget);

        public function setExpence($expence);
    }
