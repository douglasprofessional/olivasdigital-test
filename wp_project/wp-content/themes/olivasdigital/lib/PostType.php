<?php

/**
 * olivasdigital
 *
 * WARNING: This file is part of the olivasdigital theme. DO NOT edit this file
 * under any circumstances, as the changes will be lost in the case of a theme update.
 * Please do all modifications in the form of a child theme.
 *
 * @since   1.0.0
 * @package OD
 * @author  Nucleus
 * @license GPL-2.0+
 * @link    http://nucleus.eti.br/
 */

namespace OD\Theme;

/**
 * Theme post types.
 *
 * @since  1.0.0
 */
class PostType {

	public function __construct() {
		add_action( 'init', array( $this, 'register_post_types' ) );
	}

	public function register_post_types() {
		// CPT Projects
		$this->register(
			'projects',
			'Projetos',
			'Projeto',
			array(
				'title',
				'editor',
				'thumbnail', 
				'excerpt',
				'custom-fields',
			),
			17,
			'dashicons-portfolio'
		);
	}

	private function register( $name_cpt, $name_plural, $name_singular, $supports, $menu_position, $dashicons ) {
		$labels = array(
			'name'                  => _x( $name_plural, 'olivasdigital' ),
			'singular_name'         => _x( $name_singular, 'olivasdigital' ),
			'menu_name'             => __( $name_plural, 'olivasdigital' ),
			'name_admin_bar'        => __( $name_plural, 'olivasdigital' ),
			'archives'              => __( 'Arquivo do ' . $name_singular, 'olivasdigital' ),
			'attributes'            => __( 'Atributos do ' . $name_singular, 'olivasdigital' ),
			'parent_item_colon'     => __( $name_singular . ' principal:', 'olivasdigital' ),
			'all_items'             => __( 'Todos os ' . $name_plural, 'olivasdigital' ),
			'add_new_item'          => __( 'Adicionar novo ' . $name_singular, 'olivasdigital' ),
			'add_new'               => __( 'Adicionar novo', 'olivasdigital' ),
			'new_item'              => __( 'Novo ' . $name_singular, 'olivasdigital' ),
			'edit_item'             => __( 'Editar ' . $name_singular, 'olivasdigital' ),
			'update_item'           => __( 'Atualizar ' . $name_singular, 'olivasdigital' ),
			'view_item'             => __( 'Visualizar ' . $name_singular, 'olivasdigital' ),
			'view_items'            => __( 'Visualizar ' . $name_singular, 'olivasdigital' ),
			'search_items'          => __( 'Buscar ' . $name_singular, 'olivasdigital' ),
			'not_found'             => __( 'Não encontrado', 'olivasdigital' ),
			'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'olivasdigital' ),
			'featured_image'        => __( 'Imagem destacada', 'olivasdigital' ),
			'set_featured_image'    => __( 'Definir imagem do ' . $name_singular, 'olivasdigital' ),
			'remove_featured_image' => __( 'Remover imagem', 'olivasdigital' ),
			'use_featured_image'    => __( 'Usar imagem', 'olivasdigital' ),
			'insert_into_item'      => __( 'Inserir no ' . $name_singular, 'olivasdigital' ),
			'uploaded_to_this_item' => __( 'Atualizar este ' . $name_singular, 'olivasdigital' ),
			'items_list'            => __( 'Lista de ' . $name_singular, 'olivasdigital' ),
			'items_list_navigation' => __( 'Navegação na lista de ' . $name_singular, 'olivasdigital' ),
			'filter_items_list'     => __( 'Filtrar um $name_singular da lista', 'olivasdigital' ),
		);
		$args   = array(
			'label'               => __( $name_singular, 'olivasdigital' ),
			'description'         => __( $name_plural . ' Atlantic Alloys', 'olivasdigital' ),
			'labels'              => $labels,
			'taxonomies'          => array(),
			'supports'            => $supports,
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => $menu_position,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => true,
			'menu_icon'           => $dashicons,
		);
		register_post_type( $name_cpt, $args );
	}
}
