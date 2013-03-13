<?php
return array(
    
    'router' => array(
        'routes' => array(
            'authz-rest' => array(
                'type' => 'Literal', 
                'options' => array(
                    'route' => '/rest'
                ), 
                
                'child_routes' => array(
                    
                    'acl' => array(
                        'type' => 'Segment', 
                        'may_terminate' => true, 
                        'options' => array(
                            'route' => '/acl[/:id]', 
                            //'route' => '/acl[/:id][/:subresource][/:subresourceId]',
                            'constraints' => array(
                                'id' => '[\w-]+'
                            ), 
                            'defaults' => array(
                                'controller' => 'AclController'
                            )
                        )
                    )
                )
            )
        )
    ), 
    
    'db' => array(
        'driver' => 'Pdo_Mysql', 
        'host' => 'localhost', 
        'dbname' => 'authz_ws', 
        'username' => 'authzadmin', 
        'password' => ''
    ), 
    
    'acl_filter_definitions' => array(
        
        'user_id' => array(
            'name' => 'user_id', 
            'required' => true, 
            'validators' => array(
                'email' => array(
                    'name' => 'email_address'
                )
            )
        ), 
        
        'resource_id' => array(
            'name' => 'resource_id', 
            'required' => true, 
            'validators' => array(
                'regex' => array(
                    'name' => 'regex', 
                    'options' => array(
                        'pattern' => '/^\w+$/'
                    )
                )
            )
        ), 
        
        'role_id' => array(
            'name' => 'role_id', 
            'required' => true, 
            'validators' => array(
                'digits' => array(
                    'name' => 'digits'
                )
            )
        ), 
        
        'permission_id' => array(
            'name' => 'permission_id', 
            'required' => false, 
            'validators' => array(
                'digits' => array(
                    'name' => 'digits'
                )
            )
        )
    )
);