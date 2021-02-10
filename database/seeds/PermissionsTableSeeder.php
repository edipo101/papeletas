<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        Permission::create([
        	'name' => 'Listado de usuarios',
        	'slug' => 'users.index',
        	'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name' => 'Creacion de usuario',
        	'slug' => 'users.create',
        	'description' => 'Crear un usuario al sistema',
        ]);
        Permission::create([
        	'name' => 'Edicion de usuario',
        	'slug' => 'users.edit',
        	'description' => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar usuario',
        	'slug' => 'users.destroy',
        	'description' => 'Eliminar cualquier usuario del sistema',
        ]);
        Permission::create([
        	'name' => 'Perfil de usuario',
        	'slug' => 'users.perfil',
        	'description' => 'Visualizar perfil de usuario del sistema y poder cambiar password',
        ]);

        //Roles
        Permission::create([
        	'name' => 'Listado de roles',
        	'slug' => 'roles.index',
        	'description' => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
        	'name' => 'Creacion de rol',
        	'slug' => 'roles.create',
        	'description' => 'Crear un rol al sistema',
        ]);
        Permission::create([
        	'name' => 'Edicion de rol',
        	'slug' => 'roles.edit',
        	'description' => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar rol',
        	'slug' => 'roles.destroy',
        	'description' => 'Eliminar cualquier rol del sistema',
        ]);

        //Empresa
		Permission::create([
			'name' => 'Configuracion Empresa',
			'slug' => 'empresas.index',
			'description' => 'Configurar Datos del perfil de la empresa',
		]);
		
		//Modalidades
        Permission::create([
        	'name' => 'Listado de modalidades',
        	'slug' => 'modalidads.index',
        	'description' => 'Lista y navega todos los modalidades del sistema',
        ]);
        Permission::create([
        	'name' => 'Creacion de modalidad',
        	'slug' => 'modalidads.create',
        	'description' => 'Crear un modalidad al sistema',
        ]);
        Permission::create([
        	'name' => 'Edicion de modalidad',
        	'slug' => 'modalidads.edit',
        	'description' => 'Editar cualquier dato de una modalidad del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar modalidad',
        	'slug' => 'modalidads.destroy',
        	'description' => 'Eliminar cualquier modalidad del sistema',
		]);
		
		//Funcionarios
        Permission::create([
        	'name' => 'Listado de funcionarios',
        	'slug' => 'funcionarios.index',
        	'description' => 'Lista y navega todos los funcionarios del sistema',
        ]);
        Permission::create([
        	'name' => 'Creacion de funcionario',
        	'slug' => 'funcionarios.create',
        	'description' => 'Crear un funcionario al sistema',
        ]);
        Permission::create([
        	'name' => 'Edicion de funcionario',
        	'slug' => 'funcionarios.edit',
        	'description' => 'Editar cualquier dato de un funcionario del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar funcionario',
        	'slug' => 'funcionarios.destroy',
        	'description' => 'Eliminar cualquier funcionario del sistema',
		]);

		//Planillas
        Permission::create([
        	'name' => 'Listado de planillas',
        	'slug' => 'planillas.index',
        	'description' => 'Lista y navega todos los planillas del sistema',
        ]);
        Permission::create([
        	'name' => 'Creacion de planilla',
        	'slug' => 'planillas.create',
        	'description' => 'Crear un planilla al sistema',
        ]);
        Permission::create([
        	'name' => 'Edicion de planilla',
        	'slug' => 'planillas.edit',
        	'description' => 'Editar cualquier dato de un planilla del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar planilla',
        	'slug' => 'planillas.destroy',
        	'description' => 'Eliminar cualquier planilla del sistema',
		]);
		Permission::create([
        	'name' => 'Generar papeletas',
        	'slug' => 'planillas.papeletas',
        	'description' => 'Generar las papeletas de una planilla del sistema',
		]);
		Permission::create([
        	'name' => 'Listado papeletas',
        	'slug' => 'planillas.listado',
        	'description' => 'Imprimir listado de las papeletas de una planilla del sistema',
		]);
		
		//Papeletas
        Permission::create([
        	'name' => 'Listado de papeletas',
        	'slug' => 'papeletas.index',
        	'description' => 'Lista y navega todos los papeletas del sistema',
        ]);
        Permission::create([
        	'name' => 'Imprimir papeleta',
        	'slug' => 'papeletas.imprimir',
        	'description' => 'Imprimir una o varias papeletas del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar papeleta',
        	'slug' => 'papeletas.destroy',
        	'description' => 'Eliminar cualquier papeleta del sistema',
		]);
		Permission::create([
        	'name' => 'Importar papeletas',
        	'slug' => 'papeletas.importar',
        	'description' => 'Importar papeletas de una planilla al sistema',
		]);
		Permission::create([
        	'name' => 'Entregar papeleta',
        	'slug' => 'papeletas.entregar',
        	'description' => 'Entregar cualquier papeleta del sistema',
		]);
		Permission::create([
        	'name' => 'Listar papeleta entregadas',
        	'slug' => 'papeletas.listar',
        	'description' => 'Listar e imprimir las papeletas entregadas del sistema',
        ]);
    }
}
