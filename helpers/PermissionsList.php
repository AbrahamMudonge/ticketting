<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/23/18
 * Time: 12:58 PM
 */

namespace app\helpers;

class PermissionsList {

    //region ******************** Supplier Permissions ********************************* //
    const VIEW_SUPPLIER = 'view-supplier';
    const DESC_VIEW_SUPPLIER = 'Allow user to view suppliers';
    const DELETE_SUPPLIER = 'delete-supplier';
    const DESC_DELETE_SUPPLIER = 'Allows  user  to  delete  supplier';
    const UPDATE_SUPPLIER = 'update-supplier';
    const DESC_UPDATE_SUPPLIER = 'Allows  user  to  update  suppliers';
    const CREATE_SUPPLIER = 'create-supplier';
    const DESC_CREATE_SUPPLIER = 'Allow user to create suppliers';
   //suppliertypes permissions
    const VIEW_SUPPLIER_LIST = 'view-supplier-list';
    const DESC_VIEW_SUPPLIER_LIST = 'Allow user to view suppliers list';
    const UPDATE_SUPPLIER_LIST = 'update-supplier-list';
    const DESC_UPDATE_SUPPLIER_LIST = 'Allows  user  to  update  suppliers  list';
    const DELETE_SUPPLIER_LIST = 'delete-supplier-list';
    const DESC_DELETE_SUPPLIER_LIST = 'Allows  user  to  delete  suppliers  list';
    const CREATE_SUPPLIERTYPES = 'create-suppliertypes';
    const DESC_CREATE_SUPPLIERTYPES = 'Allows  user  to  create  suppliertypes';
// Approve  leave  permissions
    const APPROVE_LEAVE = 'approve-Leave';
    const DESC_APPROVE_LEAVE = 'Allows  user  to  approve  leave';
    const APPROVELEAVE_BUTTON='approveleave-button';
    const DESC_APPROVELEAVE_BUTTON='Allows  user  to  approve leave  by  clicking the  button';
    const DISAPPROVELEAVE_BUTTON='disapproveleave_button';
    const DESC_DISAPPROVELEAVE_BUTTON='Allows  user  to disapprove  leave  by  clicking the  button';
    //Validate  ticket  permissions
    const VALIDATE_TICKET='validate-ticket';
    const DESC_VALIDATE_TICKET='Allows  user  to  validate  ticket';
     const APPROVETICKET_BUTTON='approveticket-button';
    const DESC_APPROVETICKET_BUTTON='Allows  user  to  approve ticket  by  clicking the  button';
    const DISAPPROVETICKET_BUTTON='disapproveticket_button';
    const DESC_DISAPPROVETICKET_BUTTON='Allows  user  to disapprove  ticket  by  clicking the  button';
    //Departments  permissions
    const CREATE_DEPARTMENTS = 'create-departments';
    const DESC_CREATE_DEPARTMENTS = 'Allows  user  to  create  departments';
    const VIEW_DEPARTMENTS = 'view-departments';
    const DESC_VIEW_DEPARTMENTS = 'Allows  user  to view  department';
    const UPDATE_DEPARTMENTS = 'update-departments';
    const DESC_UPDATE_DEPARTMENTS = 'Allows  user  to  update  departments';
    const DELETE_DEPARTMENT = 'delete-departments';
    const DESC_DELETE_DEPARTMENT = 'Allows  user  to  delete  departments';
//Procurement  permissions
    const CREATE_PROCUREMENT = 'create-procurement';
    const DESC_CREATE_PROCUREMENT = 'Allows  user  to  create  procurement';
    const VIEW_PROCUREMENT = 'view-procurement';
    const DESC_VIEW_PROCUREMENT = 'Allows  user  to  view  procurement';
    const UPDATE_PROCUREMENT = 'update-procurement';
    const DESC_UPDATE_PROCUREMENT = 'Allows  user  to  update  procurement';
    const DELETE_PROCUREMENT = 'delete-procurement';
    const DESC_DELETE_PROCUREMENT = 'Allows  user  to  delete  procurement';
//Sources  permission
    const CREATE_SOURCES = 'create_sources';
    const DESC_CREATE_SOURCES = 'Allows  user  to  create  sources';
    const VIEW_SOURCES = 'view-sources';
    const DESC_VIEW_SOURCES = 'Allows  user  to  view  sources';
    const UPDATE_SOURCES = 'update-sources';
    const DESC_UPDATE_SOURCES = 'Allows  user  to  update sources';
    const DELETE_SOURCES = 'delete-sources';
    const DESC_DELETE_SOURCES = 'Allows  user  to  delete  sources';
//Salesticket  permissions

    const CREATE_SALESTICKET = 'create-salesticket';
    const DESC_CREATE_SALESTICKET = 'Allows  user  to  create salesticket';
    const VIEW_SALESTICKET = 'view-saleesticket';
    const DESC_VIEW_SALESTICKET = 'Allows  user  to  view salesticket';
    const UPDATE_SALESTICKET = 'update-salesticket';
    const DESC_UPDATE_SALESTICKET = 'Allows  user  to  update  salestiicket';
    const DELETE_SALESTICKET = 'delete-salesticket';
    const DESC_DELETE_SALESTICKET = 'Allows  user  to  delete  salesticket';
//Technicalticket  permissions
    const CREATE_TECHNICALTICKET = 'create-technicalticket';
    const DESC_CREATE_TECHNICALTICKET = 'Allows  user  to  create  technicalticker';
    const VIEW_TECHNICALTICKET = 'view-technicalticket';
    const DESC_VIEW_TECHNICALTICKET = 'Allows  user  to  view  technical  ticket';
    const UPDATE_TECHNICALTICKET = 'update-technicalticket';
    const DESC_UPDATE_TECHNICALTICKET = 'Allows  user  to  update technicalticket';
    const DELETE_TECHNICALTICKET = 'delete-technicalticket';
    const DESC_DELETE_TECHNICALTICKET = 'Allows  user  to  delete technicaltickeet';
//User  permissions
    const CREATE_USER = 'create  user';
    const DESC_CREATE_USER = 'Allows  user  to  create  user';
    const UPDATE_USER = 'update-user';
    const DESC_UPDATE_USER = 'Allows  user  to  update  user';
    const DELETE_USER = 'delete-user';
    const DESC_DELETE_USER = 'Allows  user  to  delete  user';
    const VIEW_USER = 'view-user';
    const DESC_VIEW_USER = 'Allows  user  to  view  user';
    const BLOCK_USER='block-user';
    const DESC_BLOCK_USER='Allows  user  to  block  user';
//Margins  permissions
    const VIEW_MARGINS = 'view-margins';
    const DESC_VIEW_MARGINS = 'Allows  user  to  view  margins';
//Client  permissions
    const CREATE_CLIENT = 'create-client';
    const DESC_CREATE_CLIENT = 'Allows  user  to  create  a  client';
    const VIEW_CLIENT = 'view-client';
    const DESC_VIEW_CLIENT = 'Allows  user  to  view client';
    const UPDATE_CLIENT = 'update-client';
    const DESC_UPDATE_CLIENT = 'Allows  user  to  view  client';
    const DELETE_CLIENT = 'delete-client';
    const DESC_DELETE_CLIENT = 'Allows  the  user  to  delete   client';
    //Clientcontat  permissions
    const CREATE_CLIENTCONTACT = 'create-clientcontact';
    const DESC_CREATE_CLIENTCONTACT = 'Allows  user to  create  clientcontact';
    const VIEW_CLIENTCONTACT = 'view-clientcontact';
    const DESC_VIEW_CLIENTCONTACT = 'Allows  user  to  view clientcontact';
    const UPDATE_CLIENTCONTACT = 'update-clientcontact';
    const DESC_UPDATE_CLIENTCONTACT = 'Allows  user  to  view  clientcontact';
    const DELETE_CLIENTCONTACT = 'delete-clientcontact';
    const DESC_DELETE_CLIENTCONTACT = 'Allows  the  user  to  delete   clientcontact';
    //Clienttypes  permissions
    const CREATE_CLIENTTYPES = 'create-clienttypes';
    const DESC_CREATE_CLIENTTYPES = 'Allows  user  to  create  clienttypes';
    const VIEW_CLIENTTYPES = 'view-clienttypes';
    const DESC_VIEW_CLIENTTYPES = 'Allows  user  to  view clienttypes';
    const UPDATE_CLIENTTYPES = 'update-clienttypes';
    const DESC_UPDATE_CLIENTTYPES = 'Allows  user  to  view   clienttypes';
    const DELETE_CLIENTTYPES = 'delete-clienttypes';
    const DESC_DELETE_CLIENTTYPES = 'Allows  the  user  to  delete   clienttypes';
    //ApplyLeave  permissions
    const APPLY_LEAVE = 'apply-leave';
    const DESC_APPLY_LEAVE = 'Allows  user  to  apply  leave';
    const UPDATE_APPLY_LEAVE = 'update-apply-leave';
    const DESC_UPDATE_APPLY_LEAVE = 'Allows  user  to  update  apply  leave';
    const DELETE_APPLY_LEAVE = 'delete-apply-leave';
    const DESC_DELETE_APPLY_LEAVE = 'Allows  user  to  delete  apply  leave';
    const VIEW_APPLY_LEAVE = 'view-apply-leave';
    const DESC_VIEW_APPLY_LEAVE = 'Allows  user  to  view   apply  leave';
    //Targets  permissions
    const SET_TARGETS = 'set-targets';
    const DESC_SET_TARGETS = 'Allows  user  to  set  targets';
    const VIEW_SET_TARGETS = 'view-set-targets';
    const DESC_VIEW_SET_TARGETS = 'Allows  user  to  view  set  targets';
    const UPDATE_SET_TARGETS = 'update-set-targets';
    const DESC_UPDATE_SET_TARGETS = 'Allows  user  to  view   set  targets';
    const DELETE_SET_TARGETS = 'delete-set-targets';
    const DESC_DELETE_SET_TARGETS = 'Allows  the  user  to  delete   set  targets';
    //Suppliercontact  permissions
    const CREATE_SUPPLIERCONTACT = 'create-suppliercontact';
    const DESC_CREATE_SUPPLIERCONTACT = 'Allows  user  to  create  suppliercontact';
    const VIEW_SUPPLIERCONTACT = 'view-suppliercontact';
    const DESC_VIEW_SUPPLIERCONTACT = 'Allows  user  to  view  suppliercontact';
    const UPDATE_SUPPLIERCONTACT = 'update-suppliercontact';
    const DESC_UPDATE_SUPPLIERCONTACT = 'Allows  user  to  view  suppliercontact';
    const DELETE_SUPPLIERCONTACT = 'delete-suppliercontact';
    const DESC_DELETE_SUPPLIERCONTACT = 'Allows  the  user  to  delete  suppliercontact';
//Staffdept  permissions
    const CREATE_STAFFDEPT = 'create-staffdept';
    const DESC_CREATE_STAFFDEPT = 'allows  user  to  create  staffdept';
    const UPDATE_STAFFDEPT = 'update-staffdept';
    const DESC_UPDATE_STAFFDEPT = 'Allows  the  usr  to  update  staffdept';
    const VIEW_STAFFDEPT = 'view-staffdept';
    const DESC_VIEW_STAFFDEPT = 'Allows  user  to  view  staffdept';
    const DELETE_STAFFDEPT = 'delete-staffdept';
    const DESC_DELETE_STAFFDEPT = 'Allows  usser  to  delete  staffdept';
    //createtickets permissions
    const  CREATE_TICKET='create-ticket';
    const   DESC_CREATE_TICKET='Allows  user  to  create  ticket';
    const UPDATE_TICKET='update-ticket';
    const DESC_UPDATE_TICKET='Allows  user  to  update  ticket';
    const VIEW_TICKET='view-ticket';
    const DESC_VIEW_TICKET='Allows  user  to  view  ticket';
    const  DELETE_TICKET='delete-ticket';
    const DESC_DELETE_TICKET='Allows  user  to  delete  ticket';
    //userroles permissions
    const CREATE_USERROLES='create-userroles';
    const DESC_CREATE_USERROLES='Allows  user  to  create  userroles';
    const UPDATE_USERROLES='update-userroles';
    const DESC_UPDATE_USERROLES='Allows  user  to  update  userroles';
    const VIEW_USERROLES='view-userroles';
    const DESC_VIEW_USERROLES='Allows  user  to  view  userroles';
    const DELETE_USERROLES='delete-userroles';
    const DESC_DELETE_USERROLES='Allows  user  to  delete  userroles';
   
    
    
   
}
