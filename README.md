<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Pharmacy Management System backend using Laravel

There is a pharmacy. With the owner, Manager and Cashier. So they need a system to 
reduce their workload and a more efficient system than manual processes. This pharmacy 
has the following operations. 
-  Maintain Inventory (medicines) 
-  Maintain Customer records (Including customer details) 
But there are some restrictions. For this system, 
-  “add Items/add customers” operations are only done by Owner. Others should not 
have privileges for adding Items or customers. 
-  Cashiers can ‘Remove Items” and “Edit items” but cannot do any other operations. 
-  Manager can Update and delete customer details, but cannot do any other operations. 
For the above system they need a proper user logging mechanism for managing above 
mentioned policies.

## User Details for first Login
- email => owner@gmail.com ,
- password => 123456


## User roles
- Owner
  <p>Login to System</p>
  <p>Register user for the System</p>
  <p>Add, View, Update and Delete Customers, Items and Orders</p>
 
- Manager
  <p>Login to System</p>
  <p>Update and Delete Customers</p>
  
- Cashier
  <p>Login to System</p>
  <p>Update and Delete Items</p>

## ER Diagram
<p align="center"><img src="/ER diagram original.jpg" width="600"></p>

## DB Diagram
<p align="center"><img src="/DB diagram original.png" width="600"></p>

## Routes
<a href="/Assessment org.pdf"><p>Document</p></a>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
