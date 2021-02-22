<?php
        require("class.pdofactory.php");
        require("abstract.databoundobject.php");
        require("class.user3.php");
        require("class.employee.php");
        require("class.department.php");

        print "Running...<br />";
        //CONEXION BD
        $strDSN = "pgsql:dbname=uf301;";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $objUser = new User($objPDO);
        //RELLENAMOS USUARIO
        $objUser->setFirstName("Steve");
        $objUser->setLastName("Nowicki");
        $objUser->setDateAccountCreated(date("Y-m-d"));

        print "First name is " . $objUser->getFirstName() . "<br />";
        print "Last name is " . $objUser->getLastName() . "<br />";

        print "Saving...<br />";
        //GUARDAMOS USUARIO
        $objUser->Save();

        $id = $objUser->getID();
        print "ID in database is " . $id . "<br />";

        print "Destroying object...<br />";
        unset($objUser);

        print "Recreating object from ID $id<br />";
        $objUser = new User($objPDO, $id);

        print "First name is " . $objUser->getFirstName() . "<br />";
        print "Last name is " . $objUser->getLastName() . "<br />";

        print "Committing a change.... Steve will become Steven, 
               Nowicki will become Nowickcow<br/>";
        $objUser->setFirstName("Steven");
        $objUser->setLastName("Nowickcow");
        print "Saving...<br />";
        $objUser->Save();


        //CREO EMPLEADO
        $objUser2 = new Employee($objPDO);
        //RELLENAMOS EMPLEADO
        $objUser2->setemp_name("Steve");
        $objUser2->setdesignation_id(1);
        $objUser2->setdepartment_id(1);
        $objUser2->setstaff_type(1);
        
        print "<br>NOMBRE EMPLEADO: " . $objUser2->getemp_name();


        //GUARDAMOS EMPLEADO
        $objUser2->Save();
        $id = $objUser2->getID();
        print "<br>ID in database is " . $id . "<br />";

        //CREO DEPARTAMENTO
        $objUser3 = new Department($objPDO);
        //RELLENAMOS DEPARTAMENTO
        $objUser3->setdept_name("Departamento 1");
        $objUser3->setdept_description("DESCRIPCION DEL DEP 1");

        print "<br>NOMBRE DEPARTAMENTO: " . $objUser3->getdept_name();
        //GUARDAMOS EL DEPARTAMENTO
        $objUser3->Save();
        $id = $objUser3->getID();
        print "<br>ID in database is " . $id . "<br />";
?>
