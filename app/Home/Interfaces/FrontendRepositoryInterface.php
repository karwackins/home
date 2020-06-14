<?php
namespace App\Home\Interfaces;

    interface FrontendRepositoryInterface {
        public function getEventsForMainPage();

        public function getEventForShow($id);

        public function getTasksForMainPage();

        public function getDoneTasksForMainPage();

        public function getConstExpense($id);

        public function setConstExpense($expence);

        public function setConstExpenseForUpdate($expense, $id);

        public function setPlanExpense($expence);
    }
