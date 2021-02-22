<?php

class Department extends DataBoundObject {

        protected $dept_name;
        protected $dept_description;
       
        

        protected function DefineTableName() {
                return("department");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "department_id",
                        "dept_name" => "dept_name",
                        "dept_description" => "dept_description"));
        }
}

?>
