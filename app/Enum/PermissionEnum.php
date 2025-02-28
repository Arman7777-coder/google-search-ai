<?php

namespace App\Enum;

enum PermissionEnum: string
{
    case BLOCK_USERS = 'block users';
    case VIEW_USERS_LOGIN_LOGS = 'view users login logs';
    case VIEW_ADMIN_DASHBOARD = 'view admin dashboard';
    case VIEW_USERS = 'view users';
    case CREATE_USER = 'create user';
    case EDIT_USER = 'edit user';
    case DELETE_USER = 'delete user';
    case VIEW_ADMINS = 'view admins';
    case CREATE_ADMIN = 'create admin';
    case EDIT_ADMIN = 'edit admin';
    case DELETE_ADMIN = 'delete admin';
    case VIEW_CASHIERS = 'view cashiers';
    case CREATE_CASHIER = 'create cashier';
    case EDIT_CASHIER = 'edit cashier';
    case DELETE_CASHIER = 'delete cashier';
    case VIEW_DISPATCHERS = 'view dispatchers';
    case CREATE_DISPATCHER = 'create dispatcher';
    case EDIT_DISPATCHER = 'edit dispatcher';
    case DELETE_DISPATCHER = 'delete dispatcher';
    case VIEW_ORDERS = 'view orders';
    case CREATE_ORDER = 'create order';
    case EDIT_ORDER = 'edit order';
    case EDIT_ORDER_STATUS = 'edit order status';
    case DELETE_ORDER = 'delete order';
    case VIEW_CONTACT_US = 'view contact us';
    case VIEW_ORDER_RATES = 'view order rates';
    case CREATE_ORDER_RATE = 'create order rates';
    case EDIT_ORDER_RATE = 'edit order rate';
    case DELETE_ORDER_RATE = 'delete order rate';
    case VIEW_COUNTRIES = 'view countries';
    case CREATE_COUNTRY = 'create country';
    case EDIT_COUNTRY = 'edit country';
    case DELETE_COUNTRY = 'delete country';
    case VIEW_SERVICES = 'view services';
    case CREATE_SERVICE = 'create service';
    case EDIT_SERVICE = 'edit service';
    case DELETE_SERVICE = 'delete service';
    case VIEW_PROMOTIONS_AND_SPECIAL_OFFERS = 'view promotions and special offers';
    case CREATE_PROMOTIONS_AND_SPECIAL_OFFER = 'create promotions and special offer';
    case EDIT_PROMOTIONS_AND_SPECIAL_OFFER = 'edit promotions and special offer';
    case DELETE_PROMOTIONS_AND_SPECIAL_OFFER = 'delete promotions and special offer';

    case VIEW_ROLES_AND_PERMISSIONS = 'view roles and permissions ';
    case CREATE_ROLES = 'create roles';
    case ASSIGN_PERMISSION_TO_ROLES = 'assign permissions to roles';
    case ASSIGN_PERMISSION_TO_USERS = 'assign permissions to users';
    case VIEW_MANAGERS = 'view managers';
    case CREATE_MANAGER = 'create manager';
    case EDIT_MANAGER = 'edit manager';
    case DELETE_MANAGER = 'delete manager';




}
