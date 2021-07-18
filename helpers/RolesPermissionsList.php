<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/10/18
 * Time: 9:21 AM
 */

namespace app\helpers;

class RolesPermissionsList {

    const RolesChildren = [
        RolesList::SALES_USER => [
           //supplier
            PermissionsList::CREATE_SUPPLIER,
            PermissionsList::VIEW_SUPPLIER,
            PermissionsList::UPDATE_SUPPLIER,
            PermissionsList::DELETE_SUPPLIER,
            //suppliercontact
            PermissionsList::CREATE_SUPPLIERCONTACT,
            PermissionsList::VIEW_SUPPLIERCONTACT,
            PermissionsList::DELETE_SUPPLIERCONTACT,
            PermissionsList::UPDATE_SUPPLIERCONTACT,
            //suppliertypes
            PermissionsList::VIEW_SUPPLIER_LIST,
            PermissionsList::CREATE_SUPPLIERTYPES,
            PermissionsList::DELETE_SUPPLIER_LIST,
            PermissionsList::UPDATE_SUPPLIER_LIST,
            //salesticket
            PermissionsList::CREATE_SALESTICKET,
            PermissionsList::VIEW_SALESTICKET,
            PermissionsList::DELETE_SALESTICKET,
            PermissionsList::UPDATE_SALESTICKET,
            //apply  leave
            PermissionsList::APPLY_LEAVE,
            PermissionsList::VIEW_APPLY_LEAVE,
            PermissionsList::DELETE_APPLY_LEAVE,
            PermissionsList::UPDATE_APPLY_LEAVE,
            //client
            PermissionsList::CREATE_CLIENT,
            PermissionsList::VIEW_CLIENT,
            PermissionsList::DELETE_CLIENT,
            PermissionsList::UPDATE_CLIENT,
            //clientcontact
            PermissionsList::CREATE_CLIENTCONTACT,
            PermissionsList::VIEW_CLIENTCONTACT,
            PermissionsList::DELETE_CLIENTCONTACT,
            PermissionsList::UPDATE_CLIENTCONTACT,
            //clienttypes
            PermissionsList::CREATE_CLIENTTYPES,
            PermissionsList::VIEW_CLIENTTYPES,
            PermissionsList::DELETE_CLIENTTYPES,
            PermissionsList::UPDATE_CLIENTTYPES,
            //staffdept
            PermissionsList::CREATE_STAFFDEPT,
            PermissionsList::VIEW_STAFFDEPT,
            PermissionsList::DELETE_STAFFDEPT,
            PermissionsList::UPDATE_STAFFDEPT,
            //settargets
            PermissionsList::SET_TARGETS,
            PermissionsList::VIEW_SET_TARGETS,
            PermissionsList::DELETE_SET_TARGETS,
            PermissionsList::UPDATE_SET_TARGETS,
            //createticket
            PermissionsList::CREATE_TICKET,
            PermissionsList::VIEW_TICKET,
            PermissionsList::UPDATE_TICKET,
            PermissionsList::DELETE_TICKET,
        ],
        RolesList::PROCUREMENT_USER => [
            //supplier
            PermissionsList::CREATE_SUPPLIER,
            PermissionsList::VIEW_SUPPLIER,
            PermissionsList::UPDATE_SUPPLIER,
            PermissionsList::DELETE_SUPPLIER,
            //suppliercontact
            PermissionsList::CREATE_SUPPLIERCONTACT,
            PermissionsList::VIEW_SUPPLIERCONTACT,
            PermissionsList::DELETE_SUPPLIERCONTACT,
            PermissionsList::UPDATE_SUPPLIERCONTACT,
             //suppliertypes
            PermissionsList::VIEW_SUPPLIER_LIST,
            PermissionsList::CREATE_SUPPLIERTYPES,
            PermissionsList::DELETE_SUPPLIER_LIST,
            PermissionsList::UPDATE_SUPPLIER_LIST,
            //procurement
            PermissionsList::CREATE_PROCUREMENT,
            PermissionsLIst::VIEW_PROCUREMENT,
            PermissionsList::DELETE_PROCUREMENT,
            PermissionsList::UPDATE_PROCUREMENT,
            PermissionsList::VIEW_MARGINS,
             //apply  leave
            PermissionsList::APPLY_LEAVE,
            PermissionsList::VIEW_APPLY_LEAVE,
            PermissionsList::DELETE_APPLY_LEAVE,
            PermissionsList::UPDATE_APPLY_LEAVE,
            //client
            PermissionsList::CREATE_CLIENT,
            PermissionsList::VIEW_CLIENT,
            PermissionsList::DELETE_CLIENT,
            PermissionsList::UPDATE_CLIENT,
            //clientcontact
            PermissionsList::CREATE_CLIENTCONTACT,
            PermissionsList::VIEW_CLIENTCONTACT,
            PermissionsList::DELETE_CLIENTCONTACT,
            PermissionsList::UPDATE_CLIENTCONTACT,
            //clienttypes
            PermissionsList::CREATE_CLIENTTYPES,
            PermissionsList::VIEW_CLIENTTYPES,
            PermissionsList::DELETE_CLIENTTYPES,
            PermissionsList::UPDATE_CLIENTTYPES,
            //staffdept
            PermissionsList::CREATE_STAFFDEPT,
            PermissionsList::VIEW_STAFFDEPT,
            PermissionsList::DELETE_STAFFDEPT,
            PermissionsList::UPDATE_STAFFDEPT,
            //settargets
            PermissionsList::SET_TARGETS,
            PermissionsList::VIEW_SET_TARGETS,
            PermissionsList::DELETE_SET_TARGETS,
            PermissionsList::UPDATE_SET_TARGETS,
            
        ],
        RolesList::TECHNICAL_USER => [
            //supplier
            PermissionsList::CREATE_SUPPLIER,
            PermissionsList::VIEW_SUPPLIER,
            PermissionsList::UPDATE_SUPPLIER,
            PermissionsList::DELETE_SUPPLIER,
            //suppliercontact
            PermissionsList::CREATE_SUPPLIERCONTACT,
            PermissionsList::VIEW_SUPPLIERCONTACT,
            PermissionsList::DELETE_SUPPLIERCONTACT,
            PermissionsList::UPDATE_SUPPLIERCONTACT,
             //suppliertypes
            PermissionsList::VIEW_SUPPLIER_LIST,
            PermissionsList::CREATE_SUPPLIERTYPES,
            PermissionsList::DELETE_SUPPLIER_LIST,
            PermissionsList::UPDATE_SUPPLIER_LIST,
            //technicalticket
            PermissionsList::CREATE_TECHNICALTICKET,
            PermissionsList::VIEW_TECHNICALTICKET,
            PermissionsList::DELETE_TECHNICALTICKET,
            PermissionsList::UPDATE_TECHNICALTICKET,
             //apply  leave
            PermissionsList::APPLY_LEAVE,
            PermissionsList::VIEW_APPLY_LEAVE,
            PermissionsList::DELETE_APPLY_LEAVE,
            PermissionsList::UPDATE_APPLY_LEAVE,
            //client
            PermissionsList::CREATE_CLIENT,
            PermissionsList::VIEW_CLIENT,
            PermissionsList::DELETE_CLIENT,
            PermissionsList::UPDATE_CLIENT,
            //clientcontact
            PermissionsList::CREATE_CLIENTCONTACT,
            PermissionsList::VIEW_CLIENTCONTACT,
            PermissionsList::DELETE_CLIENTCONTACT,
            PermissionsList::UPDATE_CLIENTCONTACT,
            //clienttypes
            PermissionsList::CREATE_CLIENTTYPES,
            PermissionsList::VIEW_CLIENTTYPES,
            PermissionsList::DELETE_CLIENTTYPES,
            PermissionsList::UPDATE_CLIENTTYPES,
            //staffdept
            PermissionsList::CREATE_STAFFDEPT,
            PermissionsList::VIEW_STAFFDEPT,
            PermissionsList::DELETE_STAFFDEPT,
            PermissionsList::UPDATE_STAFFDEPT,
            //settargets
            PermissionsList::SET_TARGETS,
            PermissionsList::VIEW_SET_TARGETS,
            PermissionsList::DELETE_SET_TARGETS,
            PermissionsList::UPDATE_SET_TARGETS,
             //createticket
            PermissionsList::CREATE_TICKET,
            PermissionsList::VIEW_TICKET,
            PermissionsList::UPDATE_TICKET,
            PermissionsList::DELETE_TICKET,
        ],
    ];

}
