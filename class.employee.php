<?php

class Employee extends DataBoundObject {

        protected $emp_name;
        protected $designation_id;
        protected $department_id;
        protected $staff_type;
        

        protected function DefineTableName() {
                return("employee");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "user_id" => "user_id",
                        "emp_name" => "emp_name",
                        "designation_id" => "designation_id",
                        "department_id" => "department_id",
                        "staff_type" => "staff_type"));
        }
}

?>
